<?php

namespace jayay\CommonMarkGithub;

use \FFI;

class MarkdownParser {
    private FFI $ffi;
    
    public function __construct() {
        $this->ffi = FFI::scope("CMARKGFM");
    }

    public function parse_string(string $input, int $options = 0): string {
        $mem_allocator = $this->ffi->cmark_get_arena_mem_allocator();
        $c_int = FFI::new('int');
        $c_int->cdata = $options;
        $parser = $this->ffi->cmark_parser_new_with_mem($options, $mem_allocator);
        
        $this->ffi->cmark_parser_feed($parser, $input, strlen($input));

        $document = $this->ffi->cmark_parser_finish($parser);

        $result = $this->ffi->cmark_render_html_with_mem
            ($document, $options, NULL, $mem_allocator);
        $result_php = FFI::string($result);
    
        // $this->ffi->$mem_allocator->free($result);
        $this->ffi->cmark_arena_reset();
        // $this->ffi->cmark_release_plugins();
        return $result_php;
    }
}
<?php

namespace jayay\CommonMarkGithub;

use \FFI;

class MarkdownParser {
    private FFI $ffi;
    
    public function __construct() {
        $this->ffi = FFI::scope("CMARKGFM");
    }

    /**
     * @param string $input
     * @param int $options
     * @return string
     */
    public function parse_string(string $input, int $options = 0): string {
        $mem_allocator = $this->ffi->cmark_get_arena_mem_allocator();
        $parser = $this->ffi->cmark_parser_new_with_mem($options, $mem_allocator);
        $this->ffi->cmark_parser_feed($parser, $input, strlen($input));

        $document = $this->ffi->cmark_parser_finish($parser);

        $result = $this->ffi->cmark_render_html_with_mem
            ($document, $options, NULL, $mem_allocator);
        $result_php = FFI::string($result);
        $this->ffi->cmark_arena_reset();

        return $result_php;
    }
}
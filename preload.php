<?php

FFI::load(__DIR__ .'/lib/cmark-gfm-ffi.h');

opcache_compile_file(__DIR__.'/src/MarkdownParser.php');
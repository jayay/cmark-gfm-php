#!/bin/sh

echo '#define FFI_SCOPE "CMARKGFM"' > lib/cmark-gfm-ffi.h
echo "#define FFI_LIB \"${PWD}/lib/lib/libcmark-gfm.so\"" >> lib/cmark-gfm-ffi.h
cpp -P -C -D"__attribute__(ARGS)=" lib/include/cmark-gfm.h >> lib/cmark-gfm-ffi.h

# remove broken symbols
sed -i "s/extern cmark_node_type CMARK_NODE_LAST_BLOCK;//" lib/cmark-gfm-ffi.h
sed -i "s/extern cmark_node_type CMARK_NODE_LAST_INLINE;//" lib/cmark-gfm-ffi.h
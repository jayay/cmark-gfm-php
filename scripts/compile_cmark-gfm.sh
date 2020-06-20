#!/bin/sh

test -d lib || mkdir lib
test -d cmark-gfm/build || mkdir cmark-gfm/build
cd cmark-gfm/build
cmake .. -DCMAKE_INSTALL_PREFIX=../../lib/
make
make install
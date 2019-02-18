# Set expected paths
export PATH="/usr/local/opt/bison/bin:/usr/local/opt/ccache/libexec:$PATH"
export PKG_CONFIG_PATH="/usr/local/opt/openssl/lib/pkgconfig:/usr/local/opt/libedit/lib/pkgconfig:/usr/local/opt/zlib/lib/pkgconfig:$PKG_CONFIG_PATH"
export CFLAGS="-Wno-nullability-completeness -Wno-expansion-to-defined $CFLAGS"
export CXXFLAGS="-Wno-nullability-completeness -Wno-expansion-to-defined $CXXFLAGS"
# Force relinking
brew link icu4c gettext --force
# Start DB services
brew services start mysql
brew services start postgresql

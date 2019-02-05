#!/bin/bash
if [[ "$ENABLE_MAINTAINER_ZTS" == 1 ]]; then
	TS="--enable-maintainer-zts";
else
	TS="";
fi
if [[ "$ENABLE_DEBUG" == 1 ]]; then
	DEBUG="--enable-debug --without-pcre-valgrind";
else
	DEBUG="";
fi

if [[ -z "$CONFIG_LOG_FILE" ]]; then
	CONFIG_QUIET="--quiet"
	CONFIG_LOG_FILE="/dev/stdout"
else
	CONFIG_QUIET=""
fi
if [[ -z "$MAKE_LOG_FILE" ]]; then
	MAKE_QUIET="--quiet"
	MAKE_LOG_FILE="/dev/stdout"
else
	MAKE_QUIET=""
fi

if [[ "$TRAVIS_OS_NAME" == "osx" ]]; then
	WITH_GETTEXT="--with-gettext=/usr/local/opt/gettext"
	WITH_ENCHANT=""
	WITH_PSPELL=""
	WITH_READLINE="--with-libedit"
else
	WITH_GETTEXT="--with-gettext"
	WITH_ENCHANT="--with-enchant=/usr"
	WITH_PSPELL="--with-pspell=/usr"
	WITH_READLINE="--with-readline"
fi

MAKE_JOBS=${MAKE_JOBS:-2}

./buildconf --force
./configure \
--prefix="$HOME"/php-install \
$CONFIG_QUIET \
$DEBUG \
$TS \
--enable-phpdbg \
--enable-fpm \
--with-pdo-mysql=mysqlnd \
--with-mysqli=mysqlnd \
--with-pgsql \
--with-pdo-pgsql \
--with-pdo-sqlite \
--enable-intl \
--without-pear \
--with-gd \
--with-jpeg-dir=/usr \
--with-png-dir=/usr \
--enable-exif \
--enable-zip \
--with-zlib \
--with-zlib-dir=/usr \
--enable-soap \
--enable-xmlreader \
--with-xsl \
--with-curl=/usr \
--with-tidy \
--with-xmlrpc \
--enable-sysvsem \
--enable-sysvshm \
--enable-shmop \
--enable-pcntl \
$WITH_READLINE \
--enable-mbstring \
--with-curl \
$WITH_GETTEXT \
--enable-sockets \
--with-bz2 \
--with-openssl \
--with-gmp \
--enable-bcmath \
--enable-calendar \
--enable-ftp \
$WITH_PSPELL \
$WITH_ENCHANT \
--enable-wddx \
--with-freetype-dir=/usr \
--with-xpm-dir=/usr \
--with-kerberos \
--enable-sysvmsg \
--enable-zend-test \
> "$CONFIG_LOG_FILE"

make "-j${MAKE_JOBS}" $MAKE_QUIET > "$MAKE_LOG_FILE"
make install >> "$MAKE_LOG_FILE"

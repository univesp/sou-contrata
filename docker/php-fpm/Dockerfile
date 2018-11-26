FROM php:7.2-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
       curl \
       libmemcached-dev \
       libz-dev \
       libpq-dev \
       libjpeg-dev \
       libpng-dev \
       libfreetype6-dev \
       libssl-dev \
       libmcrypt-dev \
       libmagickwand-dev \
       imagemagick \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-configure gd \
       --enable-gd-native-ttf \
       --with-jpeg-dir=/usr/lib \
       --with-freetype-dir=/usr/include/freetype2 \
    && docker-php-ext-install gd \
    && apt-get install -y libmagickwand-dev imagemagick

RUN apt-get update -yqq \
    && apt-get install -y apt-utils \
    && pecl channel-update pecl.php.net

# DOCKER PHP EXTS
RUN docker-php-ext-install bcmath bz2 dom exif fileinfo hash iconv json mbstring mysqli opcache pcntl pdo pdo_mysql pdo_pgsql pgsql tokenizer xml zip

# PECL
RUN pecl install swoole mongodb imagick xdebug
RUN printf "\n" | pecl install -o -f redis

# ZIP ARCHIVE
RUN apt-get install libzip-dev -y \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install zip

# MEMCACHED
RUN curl -L -o /tmp/memcached.tar.gz "https://github.com/php-memcached-dev/php-memcached/archive/php7.tar.gz" \
    &&  mkdir -p memcached \
    && tar -C memcached -zxvf /tmp/memcached.tar.gz --strip 1 \
    && ( \
        cd memcached \
        && phpize \
        && ./configure \
        && make -j$(nproc) \
        && make install \
    ) \
    && rm -r memcached \
    && rm /tmp/memcached.tar.gz

# ENABLING EXTENSIONS
RUN docker-php-ext-enable swoole redis xdebug memcached imagick pcntl bcmath pgsql exif opcache mysqli tokenizer zip pgsql pdo_mysql pdo_pgsql mongodb

# COPYING CONFIGURATIONS
COPY ./opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY ./laravel.ini /usr/local/etc/php/conf.d
COPY ./xlaravel.pool.conf /usr/local/etc/php-fpm.d/
COPY ./php.ini /usr/local/etc/php/php.ini

RUN sed -i "s/xdebug.remote_autostart=0/xdebug.remote_autostart=1/" /usr/local/etc/php/conf.d/xdebug.ini \
    && sed -i "s/xdebug.remote_enable=0/xdebug.remote_enable=1/" /usr/local/etc/php/conf.d/xdebug.ini \
    && sed -i "s/xdebug.cli_color=0/xdebug.cli_color=1/" /usr/local/etc/php/conf.d/xdebug.ini

# CLEANUP
RUN rm -rf /tmp/pear \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && rm /var/log/lastlog /var/log/faillog

WORKDIR /var/www
CMD ["php-fpm"]

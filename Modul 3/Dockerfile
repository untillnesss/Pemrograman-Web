FROM php:8.2-fpm-alpine

WORKDIR /var/www/app

RUN apk update

# Install dev dependencies
RUN apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
    curl-dev \
    imagemagick-dev \
    libtool \
    libxml2-dev \
    postgresql-dev \
    sqlite-dev

# Install production dependencies
RUN apk add --no-cache \
    bash \
    curl \
    freetype-dev \
    g++ \
    gcc \
    git \
    icu-dev \
    icu-libs \
    imagemagick \
    libc-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    make \
    mysql-client \
    nodejs \
    npm \
    oniguruma-dev \
    yarn \
    openssh-client \
    postgresql-libs \
    rsync \
    zlib-dev

# Install PECL and PEAR extensions
RUN pecl install \
    imagick 

# Enable PECL and PEAR extensions
RUN docker-php-ext-enable \
    imagick 

# Configure php extensions
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg

RUN apk add --no-cache zip libzip-dev
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo pdo_mysql 
RUN docker-php-ext-install mysqli

# Install php extensions
RUN docker-php-ext-install \
    bcmath \
    calendar \
    curl \
    exif \
    gd \
    intl \
    mbstring \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    pdo_sqlite \
    pcntl \
    xml \
    zip

RUN pecl install --force redis && \
    rm -rf /tmp/pear && \
    docker-php-ext-enable redis

RUN apk add redis
RUN apk add supervisor

RUN apk --no-cache add nodejs npm

# Install composer
ENV COMPOSER_HOME /composer
ENV PATH ./vendor/bin:/composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

USER root

RUN chmod 777 -R /var/www/app

COPY start-container /etc/start-container
COPY supervisord.conf /etc/supervisord.conf
RUN chmod +x /etc/start-container

RUN mkdir /var/log/supervisor/
RUN touch /var/log/supervisor/supervisord.log

EXPOSE 9000
ENTRYPOINT ["supervisord", "--nodaemon", "--configuration", "/etc/supervisord.conf"]

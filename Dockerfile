FROM php:8.2.8-fpm-bookworm

# Install system deps.
RUN apt-get update; \
    apt-get install -y --no-install-recommends \
        ghostscript \
        gnupg \
        less \
        libpq-dev \
        libfreetype6-dev \
        libjpeg-dev \
        libmagickwand-dev \
        libpng-dev \
        libzip-dev \
        zlib1g-dev; \
    apt-get -y upgrade --no-install-recommends; \
    apt-get autoremove -y; \
    rm -rf /var/lib/apt/lists/*;

# Install PHP exts.
RUN docker-php-ext-install \
    bcmath \
    exif \
    gd \
    opcache \
    pcntl \
    pdo \
    pdo_pgsql \
    sockets \
    zip \
    intl;

# Set working directory
WORKDIR /var/www

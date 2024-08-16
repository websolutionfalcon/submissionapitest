FROM phpdockerio/php:8.3-fpm
WORKDIR "/application"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        default-mysql-client \
        git \
        supervisor \
        openssh-client \
        php8.3-gd \
        php8.3-mysql \
        php8.3-intl \
        php8.3-gmp \
        php8.3-bcmath; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

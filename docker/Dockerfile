# https://github.com/cr-lgl/laravel-exception-handle-example/blob/main/docker/workspace/Dockerfile
#
# PHP Setup
#

ARG PHP_VERSION=7.0

FROM php:${PHP_VERSION}-cli

#
# Install dependencies
#

RUN set -xe; \
    apt-get update && \
    apt-get install -y \
        curl \
        zip \
        zlib1g-dev \
        libzip-dev \
        libicu-dev && \
#    pecl install \
#        xdebug && \
# https://xdebug.org/docs/compat
# xdebug 버전을 낮춰야함
    docker-php-ext-install \
        zip \
        pdo \
        pdo_mysql \
        intl && \
#    docker-php-ext-enable \
#        xdebug && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* \
           /tmp/* \
           /var/tmp/* \
           /var/log/lastlog \
           /var/log/faillog

#
# Workspace User
#
RUN set -xe; \
    groupadd -f workspace && \
    groupmod -g 1000 workspace && \
    useradd workspace -g workspace && \
    mkdir -p /home/workspace && chmod 755 /home/workspace && chown workspace:workspace /home/workspace && \
    usermod -u 1000 -m -d /home/workspace workspace -s $(which bash)
#    && \
#    chown -R workspace:workspace /var/www/html
# php cli 버전 차이로 인해 오류 발생

#
# Set Timezone
#

ARG TIME_ZONE='Asia/Seoul'

RUN ln -snf /usr/share/zoneinfo/${TIME_ZONE} /etc/localtime && echo ${TIME_ZONE} > /etc/timezone

#
# Composer Setup
#

ARG COMPOSER_VERSION=2.1.9
ARG COMPOSER_REPO_PACKAGIST='https://packagist.jp'

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer --version=${COMPOSER_VERSION} && \
    composer config -g repos.packagist composer ${COMPOSER_REPO_PACKAGIST}

WORKDIR /var/www/html

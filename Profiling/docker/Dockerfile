FROM webdevops/php-nginx-dev:8.1-alpine

RUN apk --update upgrade \
    && apk add autoconf automake make gcc g++ \
            libtool pkgconfig libmcrypt-dev re2c git zlib-dev xdg-utils \
            libpng-dev freetype-dev libjpeg-turbo-dev \
            openssh-client libxslt-dev ca-certificates gmp-dev

RUN pecl install xhprof \
    && docker-php-ext-enable xhprof

RUN rm -rf /var/cache/apk && mkdir -p /var/cache/apk
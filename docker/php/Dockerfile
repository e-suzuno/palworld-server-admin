FROM php:8.3.2-apache-bullseye


# Node.jsのバージョン
ENV NODE_VERSION=20.x


# nodejs, npm install
RUN curl -fsSL https://deb.nodesource.com/setup_${NODE_VERSION} | bash \
  && apt-get install -y nodejs


# Apacheの a2enmod rewriteを有効
RUN a2enmod rewrite



# apt-get update && install
RUN apt-get update && apt-get install -y \
    automake autoconf pngquant libpng-dev libxrender1 libfontconfig libxext6 fonts-ipafont \
    zip unzip


# PDO  sqlite install
RUN apt-get install -y libsqlite3-dev \
  && docker-php-ext-install pdo pdo_sqlite


# usergroupの準備
RUN usermod -u 1000 www-data -s /bin/bash && groupmod -g 1000 www-data


# composer install
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer


RUN apt-get update && apt-get install -y sudo

EXPOSE 80

# install php version 7.2
FROM php:7.2-apache
RUN ["apt-get", "update"]
RUN apt-get install -y libzip-dev zip && docker-php-ext-install zip

# install vim
RUN ["apt-get", "install", "-y", "vim"]

# install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'baf1608c33254d00611ac1705c1d9958c817a1a33bce370c0595974b342601bd80b92a3f46067da89e3b06bff421f182') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# 環境変数設定
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# install Laravel
RUN composer global require "laravel/installer"

WORKDIR /var/www

# ポートを公開
EXPOSE 8000

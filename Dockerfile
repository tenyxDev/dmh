FROM php:7.2-fpm

RUN docker-php-ext-install pdo pdo_mysql

RUN apt autoremove

# Set timezone
RUN rm /etc/localtime \
    && ln -s /usr/share/zoneinfo/UTC /etc/localtime

# Tools
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    curl \
    libssl-dev \
    openssl

# Main User
ARG UID
RUN mkdir /home/www-data \
    && usermod -u ${UID} -d /home/www-data www-data \
    && groupmod -g ${UID} www-data \
    && echo 'alias ll="ls -la"' >> /home/www-data/.bashrc \
    && echo 'alias ..="cd .."' >> /home/www-data/.bashrc \
    && echo 'alias artisan="php artisan"' >> /home/www-data/.bashrc \
    && chown www-data:www-data /home/www-data -R

#####################################
# XML
#####################################
RUN apt-get update \
    && apt-get install -y \
	    libxml2-dev \
	    libxslt-dev \
	&& docker-php-ext-install \
		xmlrpc \
		xsl

#####################################
# Strings
#####################################
RUN docker-php-ext-install \
	    gettext \
	    mbstring

#####################################
# Compression
#####################################
RUN apt-get update \
	&& apt-get install -y \
	    libbz2-dev \
	    zlib1g-dev \
	&& docker-php-ext-install \
		zip \
		bz2

#####################################
# Other
#####################################
RUN docker-php-ext-install \
	    sockets \
	    calendar \
	    sysvmsg \
	    sysvsem \
	    sysvshm

#####################################
# GD
#####################################
RUN apt-get update \
    	&& apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd

# XDebug
RUN pecl install xdebug

# CodeSniffer
RUN curl -o /usr/bin/phpcs https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar \
    && chmod +x /usr/bin/phpcs \
    && curl -o /usr/bin/phpcbf https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar \
    && chmod +x /usr/bin/phpcbf

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clean
RUN apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /var/cache/*

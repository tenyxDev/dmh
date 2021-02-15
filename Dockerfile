FROM php:7.3-fpm

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
RUN chown -R www-data:www-data /var/www/html
#RUN chmod -R 777 /var/www/html/bootstrap/cache
#RUN chmod -R 777 /var/www/html/storage

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
#install some base extensions
RUN apt-get install -y zip libzip-dev \
  && docker-php-ext-configure zip --with-libzip \
  && docker-php-ext-install zip

#RUN apt-get update \
#	&& apt-get install -y \
#	    zlib1g-dev \
#	&& docker-php-ext-install \
#		zip \
#		bz2

#####################################
# Other
#####################################
RUN docker-php-ext-install \
	    pcntl \
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

FROM php:8.1-fpm

ENV COMPOSER_ALLOW_SUPERUSER=1

# Setup working directory
WORKDIR /var/www/moonnight-blog/

# Install system dependencies
RUN apt-get update && apt-get install -y \
	git \
	curl \
	libpng-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
	libonig-dev \
	libxml2-dev \
	zip \
	unzip \
	npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Postgre PDO
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copy data into the working directory
COPY . /var/www/moonnight-blog/

# Install nodejs dependencies
RUN npm install

# Install dependencies
RUN composer install \
	--ignore-platform-reqs \
	--no-interaction \
	--no-plugins \
	--no-scripts \
	--prefer-dist

# Setup permissions
RUN chmod -R 777 storage bootstrap/cache

CMD ["php-fpm"]

EXPOSE 9000

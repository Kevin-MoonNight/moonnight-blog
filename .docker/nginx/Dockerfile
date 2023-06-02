FROM nginx:alpine

# Setup working directory
WORKDIR /var/www/moonnight-blog/

COPY --from=php:8.1-fpm . /var/www/moonnight-blog/
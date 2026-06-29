FROM php:8.3-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN chmod +x start.sh

EXPOSE 10000

CMD ["bash", "start.sh"]

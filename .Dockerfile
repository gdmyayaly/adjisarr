# Utiliser l'image officielle de PHP 8.2 avec Apache
FROM php:8.2-apache

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier le code source de l'application Symfony dans le conteneur
COPY . /var/www/html

# Configurer les permissions
RUN chown -R www-data:www-data /var/www/html

# Activer le module Apache Rewrite
RUN a2enmod rewrite

# Configurer le virtual host d'Apache
COPY ./docker/vhost.conf /etc/apache2/symfonyApp/000-default.conf

# Exposer le port 80 pour l'application Symfony
EXPOSE 80

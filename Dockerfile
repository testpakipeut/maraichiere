# Utiliser l'image PHP officielle avec Apache
FROM php:8.1-apache

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    default-mysql-client \
    pkg-config \
    libssl-dev \
    && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql mysqli zip

# Activer les modules Apache nécessaires
RUN a2enmod rewrite headers

# Configurer PHP pour afficher les erreurs
RUN echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers de l'application (uniquement le contenu du dossier ferme-des-amandiers)
COPY ./ferme-des-amandiers/ /var/www/html/

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer les dépendances Composer (optionnel, si besoin)
# RUN cd /var/www/html && composer install

# Configurer les permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && mkdir -p /var/log/apache2 \
    && chown -R www-data:www-data /var/log/apache2 \
    && chmod -R 755 /var/log/apache2

# Exposer le port 80 (Apache par défaut)
EXPOSE 80

# Démarrer Apache en mode premier plan
CMD ["apache2-foreground"] 
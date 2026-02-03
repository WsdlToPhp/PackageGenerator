FROM debian:trixie-slim

# Prevent interactive prompts
ENV DEBIAN_FRONTEND=noninteractive

# Install dependencies
RUN apt-get update && apt-get install -y \
    apt-transport-https \
    ca-certificates \
    curl \
    git \
    lsb-release \
    unzip \
    zip \
    && curl -sSLo /usr/share/keyrings/deb.sury.org-php.gpg https://packages.sury.org/php/apt.gpg \
    && echo "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list \
    && apt-get update

# Supported PHP Versions
ENV PHP_VERSIONS="7.4 8.0 8.1 8.2 8.3 8.4 8.5"

# Install all PHP versions using a loop
RUN for ver in $PHP_VERSIONS; do \
        apt-get install -y \
        php${ver}-cli php${ver}-xml php${ver}-mbstring php${ver}-soap; \
    done \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Create symlinks (php-X.Y) using the same list
RUN for ver in $PHP_VERSIONS; do \
        ln -s /usr/bin/php${ver} /usr/bin/php-${ver}; \
    done

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . /var/www/

# Default command
CMD ["bash"]

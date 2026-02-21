PHP_VERSION ?= php-7.4
CONTAINER_NAME ?= package_generator
COMPOSER ?= /usr/bin/composer
DOCKER_COMPOSE ?= docker compose
DOCKER_EXEC_CONTAINER ?= docker exec -t $(CONTAINER_NAME)

.PHONY: bash build cs-fixer down install phpstan phpunit rector up update

bash:
	$(DOCKER_EXEC_CONTAINER) bash

build:
	$(DOCKER_COMPOSE) build

cs-fixer:
	$(DOCKER_EXEC_CONTAINER) $(PHP_VERSION) vendor/bin/php-cs-fixer fix --ansi --diff --verbose

down:
	$(DOCKER_COMPOSE) down

install:
	$(DOCKER_EXEC_CONTAINER) $(PHP_VERSION) $(COMPOSER) install

phpstan:
	$(DOCKER_EXEC_CONTAINER) $(PHP_VERSION) vendor/bin/phpstan analyze src --level=2

phpunit:
	$(DOCKER_EXEC_CONTAINER) $(PHP_VERSION) vendor/bin/phpunit --stop-on-failure --stop-on-error $(ARGS)

rector:
	$(DOCKER_EXEC_CONTAINER) $(PHP_VERSION) vendor/bin/rector process

up:
	$(DOCKER_COMPOSE) up -d

update:
	$(DOCKER_EXEC_CONTAINER) $(PHP_VERSION) $(COMPOSER) update

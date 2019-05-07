DOCKER_COMPOSE=docker-compose
PHP_EXEC=$(DOCKER_COMPOSE) exec -T php /entrypoint
JS_EXEC=$(DOCKER_COMPOSE) exec -T node /entrypoint
SYMFONY_CONSOLE=$(PHP_EXEC) bin/console
COMPOSER=$(PHP_EXEC) composer
YARN=$(JS_EXEC) yarn

.DEFAULT_GOAL := help build start stop
.PHONY: help build start stop cache-clear csfix db make-migrate migrate fixtures

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

build: ## Build docker stack
	$(DOCKER_COMPOSE) build

start: ## Start docker stack
	$(DOCKER_COMPOSE) up -d --remove-orphans --no-recreate

stop: ## Stop docker stack
	$(DOCKER_COMPOSE) stop

cache-clear: ## Symfony cache clear
	$(SYMFONY_CONSOLE) cache:clear

csfix: ## Format code
	$(PHP_EXEC) vendor/bin/php-cs-fixer fix src/

db: ## Create database
	$(SYMFONY_CONSOLE) doctrine:database:create

make-migrate: ## Prepare migration
	$(SYMFONY_CONSOLE) make:migration

migrate: ## Launch migration
	$(SYMFONY_CONSOLE) doctrine:migrations:migrate

fixtures: ## Load datas into database
	$(SYMFONY_CONSOLE) doctrine:fixtures:load

vendor: composer.lock
	$(COMPOSER) install

composer.lock: composer.json
	$(COMPOSER) update

assets: node_modules ## Run encore to compile assets
	$(YARN) dev

watch: node_modules ## Run encore to compile assets
	$(YARN) watch

node_modules: yarn.lock ## Install encore dependencies
	$(YARN) install

yarn.lock: package.json ## Generate yarn.lock
	$(YARN) upgrade

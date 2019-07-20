DOCKER_COMPOSE=docker-compose
PHP_EXEC=$(DOCKER_COMPOSE) exec -T php /entrypoint
JS_EXEC=$(DOCKER_COMPOSE) exec -T node /entrypoint
SYMFONY_CONSOLE=$(PHP_EXEC) bin/console
COMPOSER=$(PHP_EXEC) composer
YARN=$(JS_EXEC) yarn

.DEFAULT_GOAL := help
.PHONY: help build start stop db-create db-drop migration-generation migration-launch

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

###########
# General #
###########

build: ## Build the project
	$(DOCKER_COMPOSE) build

start: ## Start the project
	$(DOCKER_COMPOSE) up -d --remove-orphans --no-recreate

stop: ## Stop the project
	$(DOCKER_COMPOSE) down --remove-orphans --volumes

############
# Database #
############

db-create: ## Create the database
	$(SYMFONY_CONSOLE) doctrine:database:create

db-drop: ## Drop the database
	$(SYMFONY_CONSOLE) doctrine:database:drop --force

#######################
# Database migrations #
#######################

migration-generation: ## Prepare the migrations files
	$(SYMFONY_CONSOLE) make:migration

migration-launch: ## Launch the migration
	$(SYMFONY_CONSOLE) doctrine:migrations:migrate

############
# Fixtures #
############

fixture-load: ## Load the fixtures
	$(SYMFONY_CONSOLE) doctrine:fixture:load

#########
# Front #
#########

front-compile: ## Compile fronts assets
	$(YARN) dev

front-watch: ## Watch & compile fronts assets
	$(YARN) watch

front-compile-production: ## Compile fronts assets for production
	$(YARN) build

front-dependency-install: ## Install the front dependency
	$(YARN) install

front-dependency-upgrade: ## Upgrade the front dependency
	$(YARN) upgrade

####################
# Quality Analysis #
####################

phpstan: ## Launch PHPStan tool
	$(PHP_EXEC) vendor/bin/phpstan analyse src/ --level 7

phan: ## Launch Phan tool
	$(PHP_EXEC) vendor/bin/phan

cs-fix: ## Launch php-cs-fixer on src directory
	$(PHP_EXEC) vendor/bin/php-cs-fixer fix src/

phploc: ## Launch phploc tool
	$(PHP_EXEC) vendor/bin/phploc src/

phpa: ## Launch PHP assumptions tool
	$(PHP_EXEC) vendor/bin/phpa src/

phpcpd: ## Launch PHP Copy/Past Detector Tool
	$(PHP_EXEC) vendor/bin/phpcpd src/

phpmnd: ## Laucn PHP Magic Number Detector Tool
	$(PHP_EXEC) vendor/bin/phpmnd src/

phpmetrics: ## Generate a PHPMetrics report
	$(PHP_EXEC) vendor/bin/phpmetrics --report-html=build/metrics src/

psalm: ## Launch Psalm Tool
	$(PHP_EXEC) vendor/bin/psalm

dephpend-metrics: dephpend ## Launch metrics dephpend
	docker run --rm -v $(shell pwd)/src:/inspect mihaeu/dephpend:latest metrics /inspect

dephpend-dsm: dephpend ## Launch DSM dephpend
	docker run --rm -v $(shell pwd)/src:/inspect mihaeu/dephpend:latest dsm /inspect > build/dephpend/dsm.html

dephpend-uml: dephpend ## Laucn UML dephpend
	docker run --rm -v $(shell pwd)/build/dephpend/:/output/:rw -v $(shell pwd)/src:/inspect mihaeu/dephpend:latest uml /inspect > /output/uml.png

dephpend: ## Build dephpend output directory
	mkdir -p $(shell pwd)/build/dephpend

infection: ## Run mutation testing
	$(PHP_EXEC) phpdbg -qrr vendor/bin/infection

phpmd: ## Launch PHPMD
	$(PHP_EXEC) vendor/bin/phpmd src/ text phpmd.xml

pdepend: ## Launch PDepend
	$(PHP_EXEC) vendor/bin/pdepend --summary-xml=build/pdepend/summary.xml --jdepend-chart=build/pdepend/jdepend.svg --overview-pyramid=build/pdepend/pyramid.svg src/

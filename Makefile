# Define the PHP binary and PHPUnit comman# Define the PHP binary and PHPUnit command
PHP := php
ARTISAN := $(PHP) artisan
DOCKER_COMPOSE := docker compose
EXEC_APP := $(DOCKER_COMPOSE) exec app

.PHONY: update-db cache-clear build regenerate fx help

# Update database
db:
	$(EXEC_APP) $(ARTISAN) doctrine:schema:update --force --dump-sql --complete

# Clear cache
cache:
	$(EXEC_APP) $(ARTISAN) cache:clear

help:
	@echo "Makefile commands:"
	@echo "  make db       - Update the database schema"
	@echo "  make cache    - Clear the application cache"

# Define the PHP binary and PHPUnit comman# Define the PHP binary and PHPUnit command
PHP := php
ARTISAN := $(PHP) artisan
DOCKER_COMPOSE := docker compose
EXEC_APP := $(DOCKER_COMPOSE) exec app

.PHONY: migrate seed cache help

# Update the database schema
db:
	$(EXEC_APP) $(ARTISAN) migrate --force

# Run database seeders
sd:
	$(EXEC_APP) $(ARTISAN) db:seed --force

# Clear cache
cache:
	$(EXEC_APP) $(ARTISAN) cache:clear

help:
	@echo "Makefile commands:"
	@echo "  make help	- Show this help message"
	@echo "  make db	- Run database migrations"
	@echo "  make sd	- Run database seeders"
	@echo "  make cache	- Clear application cache"


SHELL ?= /bin/bash
ARGS = $(filter-out $@,$(MAKECMDGOALS))


.PHONY: build
build:
	docker-compose build
	cp .env.example .env
	docker-compose up -d
	docker-compose exec app composer install
	sleep 10
	docker-compose exec app php artisan migrate
SHELL ?= /bin/bash
ARGS = $(filter-out $@,$(MAKECMDGOALS))


.PHONY: install
install: up
	docker-compose exec app composer install
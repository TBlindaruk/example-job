### build
docker-compose build app

### up
docker-compose up -d --build

### install
docker-compose exec app composer install

docker-compose exec app bash

php artisan queue:work redis --daemon

php artisan migrate

php artisan migrate:rollback

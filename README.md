### build
docker-compose build app

### up
docker-compose up -d

### install
docker-compose exec app composer install

docker-compose exec app bash

php artisan queue:work redis --daemon

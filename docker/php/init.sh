#!/bin/sh
echo 'Waiting for the database...'
until nc -z db 3306; do
  echo 'Database is not ready yet, waiting...'
  sleep 2
done
echo 'Database is ready!'

php artisan migrate --force
php artisan db:seed --force

exec php-fpm

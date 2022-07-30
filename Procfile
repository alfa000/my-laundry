web: vendor/bin/heroku-php-apache2 public/
release: php artisan storage:link && php artisan migrate:fresh && php artisan db:seed && php artisan optimize

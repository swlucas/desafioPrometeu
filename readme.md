

php artisan key:generate
php artisan passport:client --personal
php artisan vendor:publish --tag=passport-migrations
php artisan migration:install
php artisan db:seed --class=AutomotiveParts

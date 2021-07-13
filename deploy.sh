#Run DB migrate
php artisan migrate

# Run Seeds
php artisan db:seed

#seup passport framework
php artisan config:clear

php artisan passport:keys

php artisan passport:purge

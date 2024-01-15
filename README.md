### Info
- Laravel: 8.21.0
- php: 7.4.30
- redis: 2.2

### Unit Test
Set up
- Create database, testdb_laravel
- These files were setup for Unit Test
  - .env.testing
  - phpunit.xml
- Ref: https://codelikes.com/laravel-tests/

### Mail
- Mailtrap: https://mailtrap.io/inboxes

### Install Memo
```
# Install Horizon
composer require laravel/horizon
php artisan horizon:install

# Create the table fot job batching
php artisan queue:batches-table
php artisan migrate

# Laravel Telescope
composer require laravel/telescope --dev
php artisan telescope:install
php artisan vendor:publish --tag=telescope-migrations
TELESCOPE_ENABLED=true // Add it to .env
php artisan optimize
php artisan migrate
```

### Command Memo
```
php artisan test --filter ExampleTest
php artisan queue:work
php artisan horizon // Start Horizon
php artisan horizon:snapshot // Metrics
php artisan db:seed
php artisan up
php artisan down

# Clear cache
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear
```

### Env Note
| Tool      | URL                             |
| --------- | ------------------------------- |
| system    | http://127.0.0.1:8080/          |
| adminer   | http://127.0.0.1:9001/          |
| horizon   | http://127.0.0.1:8080/horizon   |
| telescope | http://127.0.0.1:8080/telescope |


```
docker-compose exec php php artisan
docker-compose exec php composer
docker-compose exec redis bash
```

.env
```
QUEUE_CONNECTION=redis

```

### Doc memo
- Job batching
- https://readouble.com/laravel/8.x/ja/queues.html?header=%25E3%2583%2590%25E3%2583%2583%25E3%2583%2581%25E3%2581%25AE%25E3%2583%2587%25E3%2582%25A3%25E3%2582%25B9%25E3%2583%2591%25E3%2583%2583%25E3%2583%2581
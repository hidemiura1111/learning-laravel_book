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
composer require laravel/horizon
php artisan horizon:install
```

### Command Memo
```
php artisan test --filter ExampleTest
php artisan queue:work
php artisan horizon
```

### Env Note
| Tool    | URL                    |
| ------- | ---------------------- |
| system  | http://127.0.0.1:8080/ |
| adminer | http://127.0.0.1:9001/ |
| horizon | http://127.0.0.1:8080/horizon |

```
docker-compose exec php php artisan
docker-compose exec php composer
docker-compose exec redis bash
```

.env
```
QUEUE_CONNECTION=redis

```
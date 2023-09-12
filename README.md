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

### Command Memo
Unit Test
```
php artisan test --filter ExampleTest
```

### Env Note
| Tool    | URL                    |
| ------- | ---------------------- |
| system  | http://127.0.0.1:8080/ |
| adminer | http://127.0.0.1:9001/ |

```
docker compose php php aritisan
docker-compose exec php composer
docker-compose exec redis bash
```
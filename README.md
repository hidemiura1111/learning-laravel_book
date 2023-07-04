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
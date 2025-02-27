# Ivan Kuzmić - AlgebraBlog
## The Blogging Application

## Installation
**Install the Package Via Composer:**
```shell
$ composer install
```

**Create ENV file:**
Rename .env.example to .env

**Generate App Key:**
```shell
$ php artisan key:generate
```

**Setup ENV file:**
Add all relevant data like database name, etc

**Run migrations:**
```shell
$ php artisan migrate
```

**Run seedes:**
Run the Database Seeder. You may need to re-generate the autoloader before this will work:
```shell
$ composer dump-autoload
$ php artisan db:seed
```

**Start server:**
```shell
$ php artisan serve
```

After you start server type http://localhost:8000 to your browser

## License

Algebra Blog is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
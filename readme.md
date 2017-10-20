## Getting Started

Clone the repository and setup Laravel:

```
$ chmod -R a+rwX bootstrap/cache storage
$ cp .env.example .env

$ composer install
$ php artisan key:generate
$ php artisan migrate
```
Populate your database with pokemons

```
$ php artisan pokemons:fetch
$ php artisan pokemons:fetch-profiles
```

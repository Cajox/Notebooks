## Installation

* [Laravel 8.x](https://laravel.com/docs/8.x/installation)
* [Vue js 2.x](https://vuejs.org/v2/guide/)


Install Laravel packages
  ```
  $ composer install
  ```

Duplicate .env.example, rename duplicated file to .env and change credentials for DB.

Generate Application Key
  ```
  $ php artisan key:generate
  ```
Migrate Database Tables
  ```
  $ php artisan migrate
  ```
Import Notebooks to Database
  ```
  $ php artisan import:notebooks
  ```
Install Vue js packages
  ```
  $ npm install
  ```
Vue js development commands
  ```
  $ npm run dev
  
  or

  $ npm run watch
  ```

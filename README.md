## My Favorite Laravel Collections Methods

The following documentation is based on my [Laravel’s Collections]() tutorial where I’ll show the most used Laravel Collections methods. When working with Eloquent, your data will always result in a custom collection object, which is a class that is inherited from the Laravel Collections. It provides a lot of [awesome methods]( https://laravel.com/docs/8.x/collections#available-methods) that you can chain into your collection. <br> <br>
•	Author: Code With Dary <br>
•	Twitter: [@codewithdary](https://twitter.com/codewithdary) <br>
•	Instagram: [@codewithdary](https://www.instagram.com/codewithdary/) <br>

## Usage <br>
Clone the repository <br>
```
cd laravel-collections
Composer install
cp .env.example .env 
php artisan key:generate
php artisan cache:clear && php artisan config:clear 
php artisan serve 
```

## Database Setup <br>

Eloquent makes use of the database so make sure that your database credentials are correct
```
mysql;
create database laravel_collections;
exit;
```

The easiest way of adding dummy data is by interacting with the users table. Open the ```/database/seeders/DatabaseSeeder.php``` file and add replace the ```run()``` method with:

```ruby
public function run()
{
     \App\Models\User::factory(50)->create();
}
```
This command will create 50 new users inside your users table

Before we can use our users table, we need to make sure that we migrate our migrations and seeder
```
php artisan migrate --seed
```

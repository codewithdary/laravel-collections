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

## Custom Artisan Command & Routes
Instead of constantly navigating to the browser, we are going to use a custom artisan command that will run the ```index()``` method from our controller inside the CLI. 

Let’s perform the following two lines of code to create our custom Artisan command and our Controller
```
php artisan make:command ShowMethod --command=show:method
php artisan make:controller CollectionsController
```

Add the following method inside the  ```/app/Http/Controllers/CollectionsController.php``` file:
```ruby
public function index()
{
     $collection = collect([1, 2, 3, 4, 5]);
}
```

We need to make sure that we call this method inside the ```handle()``` method of our ```/app/Console/Commands/ShowMethod.php``` file:

```ruby
public function handle()
{
    $collectionsController = new CollectionsController();
    print_r($collectionsController->index());
}
```

This will create a new instance of the CollectionsController```($collectionsController)```, which will then print out the available ```index()``` method 

From now on, whenever we do something inside the ```index()``` method, we can easily run the following command to get output inside the CLI
```
php artisan show:method
```

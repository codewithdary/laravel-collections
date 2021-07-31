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
Instead of constantly navigating to the browser, we are going to use a custom artisan command that will run the ```index()``` method from our controller inside the CLI

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

## 1. avg()
The avg() method returns the average value of a given **key**

```ruby
public function index()
{
    return collect([1, 2, 3, 4, 5])->avg();
}

Output: 3
```

Wondering what the difference will be with PHP?
To achieve the same exact thing, your PHP code will look like this:
```ruby
public function index()
{
    $collection = collect([1, 2, 3, 4, 5]);
    $average = array_sum($collection)/count($collection);
    echo $average;
}

Output: 3
```

## 2. chunk()

The chunk method will break or split a large group of data into smaller groups. The ```chunk()``` method accepts one parameter, which will be the amount you want to split your array/collection with, in the example down below, it will be 2

```ruby
public function index()
{
    return collect([1, 2, 3, 4, 5])->chunk(2);
}

Output
(
     [items:protected] => Array
          (
               [0] => 1
               [1] => 2
          )
),
(
     [items:protected] => Array
          (
               [2] => 3
               [3] => 4
          )
),
(
          [items:protected] => Array
              (
                    [4] => 5
              )
)
```

## 3. combine()
The combine method is a pretty useful once since it will combine the values of the collection as keys, with the value of another array or collection

```ruby
public function index()
{
    $collection = collect(['name', 'language']);

    return $collection->combine((['Laravel', 'PHP']));
}


Output
(
     [name] => Laravel
     [language] => PHP
)
```

## 4. contains()
The contains() method will find out whether a collection contains a given item that you pass in as a closure


```ruby
public function index()
{
    $collection = collect([1, 2, 3, 4, 5]);

    dd($collection->contains(5));
}

Output
'True'
```

The dd() method shows ```true``` and if you return the ```$collection->contains(5));``` you will receive a ```1```

## 5. count()
The count() method will count the values of an array


```ruby
public function index()
{
    $collection = collect([1, 2, 3, 4, 5]);

    return $collection->count();
}

Output
5
```

## 6. diff()
The diff() method compares two collections/arrays. It will then return the values in the original collection that are not present in the given collection


```ruby
public function index()
{
    $collection = collect([1, 2, 3, 4, 5]);

    return $collection->diff([2, 5, 6, 8]);
}

Output
(
     [0] => 1
     [2] => 3
     [3] => 4
)
```
The original collection is ```$collection``` so therefore value 1, 3 and 4 are printed out in the output


## 7. dd()
We have all used the dd() method inside the browser once in our lifes. The dd() method on a collection does exactly the same thing


```ruby
public function index()
{
    $collection = collect([1, 2, 3, 4, 5]);

    return $collection->dd();
}

array:5 [
  0 => 1
  1 => 2
  2 => 3
  3 => 4
  4 => 5
]

```
The output will be in the same exact way as you usually see inside the browser

## 8. flip()
I find flip a pretty interesting and funny method because it will flip all the item’s keys in a collection with their given values


```ruby
public function index()
{
    $collection = collect([
        'name' => 'Dary',
        'job' => 'Web Developer',
        'country' => 'the Netherlands'
    ]);

    return $collection->flip();
}

Output
(
     [Dary] => name
     [Web Developer] => job
     [the Netherlands] => country
)
```
The output tells us that ``` [Dary], [Web Developer] and [the Netherlands]``` are not our values anymore, but the keys, and ```name, job and country``` are not our keys anymore but the values


## 9. forget()
The forget() method removes an item from the collection by the given key


```ruby
public function index()
{
    $collection = collect([
        'name' => 'Dary',
        'job' => 'Web Developer',
        'country' => 'the Netherlands'
    ]);

    return $collection->forget('name');
}

Output
(
     [job] => Web Developer
     [country] => the Netherlands
)
```


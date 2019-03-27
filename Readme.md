# Laravel test project

A simple test project for testing some Laravel functionality. Commit your code to a new/existing branch with your username. Committed code in review will be downloaded by Census and deleted from Github.

## Development

**Requirements:**
 - Vagrant
 - Composer
 - Gasmask (Mac, optional)

This project comes with a Homestead 'Per project' configuration. 

````bash
composer install
vagrant up
````

This process could take a few minutes.

Connect to the vagrant box via:

````bash
vagrant ssh
cd code
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
````

Update your hostfile:
````txt
192.168.10.22	laravel-test.test
````

And access the Laravel installation via:

http://laravel-test.test

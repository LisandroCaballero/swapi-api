<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Setup

##### Docker
<p>Clone repository</p>

Set up .env file
> cp .env.example .env

**Important! Change the DB parameters in the .env file before build the containers**
Then, build all containers
> docker-compose build

Finally, start the app
> docker-compose up -d

Install composer
>  docker exec -it [name container] composer install

Migrations
>docker exec -it [name container] php artisan migrate

>docker exec -it [name container] chmod -R 777 storage
> 
>
>docker exec -it [name container] chmod -R 777 bootstrap/cache

Obtain Starship/Vehicles resources.
> In postman make a get a starship request
http://localhost/api/v1/starship/fetch_api

> In postman make a get a starship request
http://localhost/api/v1/vehicle/fetch_api

Links Documentation:
>https://documenter.getpostman.com/view/8498470/2s8Yt1rUxo


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

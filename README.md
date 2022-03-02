<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## API VERIFARMA

Api para la creación de farmacias y obtención de las mismas. Se pueden obtener consultando por el id, o se puede enviar un punto geográfico y se devolverá la mas cercana a ese punto.

## ¿CÓMO LEVANTAR EL PROYECTO?

Se requiere: 

- PHP 7.4.28 o superior
- Composer version 1.10.10
- Xampp para levantar base de datos MySql

Pasos a seguir: 

- Crear base de datos de manera local con nombre apiverifarma (en mi caso utilice xampp).
- Ejecutar los siguientes comandos en la carpeta del proyecto desde una terminal para instalar y levantar el proyecto.
- npm install
- composer install
- php artisan migrate(con la base de datos ya creada e inicializada)
- php artisan serve


## TEST UNITARIOS

php artisan test

## DOCUMENTACIÓN

Documentación hecha en postman:
- **[Documentación](https://web.postman.co/workspace/My-Workspace~279f24ab-5544-4981-88ca-3d3b3c0f212b/request/8834881-0669c3ef-d69b-4540-91bd-b5c96cb556e1)**

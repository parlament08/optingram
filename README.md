# Laravel Boilerplate
> This is a lite boilerplate site with backend based on Laravel 5.4.

[![Build Status](https://travis-ci.org/adr1enbe4udou1n/laravel-boilerplate.svg)](https://travis-ci.org/adr1enbe4udou1n/laravel-boilerplate)
[![Total Downloads](https://poser.pugx.org/adr1enbe4udou1n/laravel-boilerplate/downloads)](https://packagist.org/packages/adr1enbe4udou1n/laravel-boilerplate)
[![Latest Stable Version](https://poser.pugx.org/adr1enbe4udou1n/laravel-boilerplate/v/stable)](https://packagist.org/packages/adr1enbe4udou1n/laravel-boilerplate)
[![License](https://poser.pugx.org/adr1enbe4udou1n/laravel-boilerplate/license)](https://packagist.org/packages/adr1enbe4udou1n/laravel-boilerplate)

This boilerplate is heavily inspired by the most popular [Laravel 5 Boilerplate](https://github.com/rappasoft/laravel-5-boilerplate).

![showcase](https://cloud.githubusercontent.com/assets/3679080/21204210/8443454c-c256-11e6-9d53-b95a6b19aae4.gif)

## Features

### Frontend

* Bootstrap Frontend with basic home-about-contact and legal mentions pages
* [Slick carousel](http://kenwheeler.github.io/slick/) and [Cookie Consent](https://cookieconsent.insites.com/) integrated, intervention image cache for dynamic optimized images, login throttle by recaptcha, etc.
* Frontend user space and profile management. Registration can be disabled by environment parameter

### Backend

* Backend with AdminLTE theme and some plugins (datatables, SweetAlert2, Select2, etc.)
* User and permissions management (classic users <-> roles <-> permissions)
* Impersonation feature for quick specific user context testing

### Localization & SEO

* Multilingual ready thanks to [Laravel Localization](https://github.com/mcamara/laravel-localization) package. Each routes are prefixed by locale in URL for best SEO support. For this boilerplate, EN & FR locales are entirely installed
* Robots and Sitemap integrated, multilangual include
* Seo Metatags manageable in backend (title & description link to specific localized route)

## Install

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

1. Launch command `composer create-project adr1enbe4udou1n/laravel-boilerplate my-project`
2. Set database and environment variables from **.env.example**
3. Set Web write permission if needed to `bootstrap/cache` and `storage` folders.
4. Launch follow commands :

### For Production :

```shell
composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan storage:link
php artisan migrate --force
```

### For Local/Development :

```shell
composer install
php artisan key:generate
php artisan storage:link
php artisan migrate
```

### Backend access

The first user to register will be automatically super admin with no restriction and will cannot be deleted.
Both frontend and backend have dedicated login pages. 

## Development notes

### Permissions definitions

Unlike other known project as [ENTRUST](https://github.com/Zizaco/entrust) or [laravel-permission](https://github.com/spatie/laravel-permission), which are well suited for generic roles/permissions, i preferred a more lite and integrated custom solution.

You will especially note that relations between roles and permissions are a bit different, while links between users and roles stay a classic many-to-many relationship. Instead of store all permissions into specific SQL table and link them with roles by a many-to-many relationship, these latter must be directly defined in a specific config file permissions. Roles just own only a list of permissions key names.

Indeed i feel this approach even more logical for maintainability simply because permissions are hardly tied to the application with Laravel Authorization. This is anyway the standard way in CMS as Drupal where each module have specific config permission file. Permissions should be only owned by developers.

### Compiling assets with Webpack

1. If not yet done, get Yarn globally with `npm -g i yarn` and launch `yarn`
2. Launch `yarn dev` or `yarn watch` for compiling assets with webpack

> Note : If assets modified, don't forget to launch `yarn production` before deploy for each production environment.

## Note on Laravel Mix

You will observe that this boilerplate does not use [Laravel Mix](https://github.com/JeffreyWay/laravel-mix) which is shipped in Laravel for all assets management.

Laravel Mix still stay awesome for newcomers thanks to his laravel-like webpack fluent API, but, even if Laravel Mix can be easily overridden, for this project i preferred use my custom framework-free webpack setup in order to have total control of assets workflow.

For instance, with this custom setup HMR work natively with configurable port and productions assets are correctly cleanup after each compilation in specific "dist" directory.

For your info, this webpack setup is a direct recovery from my other little side-project [Express Boilerplate](https://github.com/adr1enbe4udou1n/express-boilerplate) which is optimized for quick prototype frontend development based on express Node framework.

## License

This project is open-sourced software licensed under the [MIT license](https://adr1enbe4udou1n.mit-license.org).

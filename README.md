# we-movies
An amazing app, this is a cinema website, which looks like Allocine.


Prerequisites
------------
- PHP 7.4
- Composer
- Nodejs

Installation
------------

install project:

```
composer install
```
Run npm:

```
npm install @symfony/webpack-encore --save-dev
npm run build
```

Access application
------------

1- Set your themoviedb API Read Access Token:
```
.env

...
JWT=your_token
```
2- Launch server:

```
php -S localhost:8000 -t public/
```
3- access:

```
http://127.0.0.1:8000
```

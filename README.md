README
===
## Start enviroment
```bash
$ docker-compose build
$ docker-compose up -d
```

## Run composer install
```bash
$ docker-compose exec app composer install
```

## Run composer require
```bash
$ docker-compose exec app composer require phpunit/phpunit
```
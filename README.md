README
===
## SonarQube

Dockerfiles and enviroment for sonarqube are working only for SonarServer, still working on scaner-script

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
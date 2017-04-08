README
===
## SonarQube

* SonarQube Server included in the docker-compose.yml

* SonarQube Scanner not included but you can get it here: https://docs.sonarqube.org/display/SCAN/Analyzing+with+SonarQube+Scanner

To execute sonar-scanner cd to this project root and:

* Linux & Windows

```bash 
# with sonar-scanner added into your path
$ sonar-scanner

# without sonar-scanner added into your path

$ /<dir to sonar-scanner download>/bin/sonar-scanner
```

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
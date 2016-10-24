## Setup local environment

`docker run --name mysql -e MYSQL_ROOT_PASSWORD=123123 -e MYSQL_USER=dev -e MYSQL_PASSWORD=123123 -e MYSQL_DATABASE=app_90zone -p 3306:3306 -d mysql`


## Dev environment:
https://bella41981.herokuapp.com

Users:
sadmin/123123
admin/123123
user/123123


## Testing:

### Setup Behat and Mink

curl -sS https://getcomposer.org/installer | php
php composer.phar update

### Running

1. start_local_server.sh to start Local webserver
2. start_selenium.sh to start selenium
3. run_test.sh to execute tests
# Technology used:

- php7.4-fpm
- MySQL
- Symfony Flex 4.4 + API Platform

#Project setup:

  1. composer install
  2. make sure php7.4-fpm and MySQl 5.5 is running
  3. adjust database credentials in .env file
  4. create database and run migrations with common commands:
  
    - php bin/console doctrine:database:create
    - php bin/console doctrine:migrations:migrate
  5. run fixtures:
  
    - php bin/console doctrine:fixtures:load
    
  6. run built in php server with:
  
    - php -S 127.0.0.1:8000 -t public
    
    or use desired webserver with your own configuration
    
  7.use Postman collection Cars which is located in shared folder of the project to test available endpoints
  
  
Additional info:
  
  - Swagger documentation is available on {hostname}/api route
  - if you want to test endpoints from swagger ui, please create jwt token with command under and paste it in Authorize modal
  
    - php bin/console lexik:jwt:generate-token admin@admin.com

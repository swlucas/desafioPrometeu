---É NECESSÁRIO

        - OpenSSL PHP Extension
        - PDO PHP Extension
        - Mbstring PHP Extension
        - Tokenizer PHP Extension
        - XML PHP Extension
        - Ctype PHP Extension
        - JSON PHP Extension
        - BCMath PHP Extension
 


Apos fazer o clone do projeto 

    $composer install
    $php artisan key:generate

Apos isso, irá gerar um arquivo .env, você deverá alterar esses dados de acordo com seu banco de dados

    DB_CONNECTION=mysql/pgsql
    DB_HOST=127.0.0.1
    DB_PORT=3306/5432
    DB_DATABASE=db_name 
    DB_USERNAME=user
    DB_PASSWORD=password


    $php artisan migrate
    $php artisan passport:client --personal
    $php artisan db:seed --class=AutomotiveParts

caso o passport dê algum tipo de error

    $php artisan vendor:publish --tag=passport-migrations




###########LINK COM AS ROTAS E O HEDER NECESSARIO#######################
https://documenter.getpostman.com/view/4757386/S11RMGcG

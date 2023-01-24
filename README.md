
#### requisitos: 
- [Composer](https://getcomposer.org "Composer")
- [PHP 8+](https://www.php.net/downloads.php "PHP 8+")
- [MySQL (Xampp, Wampp server entre outros)](https://www.apachefriends.org/pt_br/index.html "MySQL")

#### Instalação
```bash
git clone https://github.com/Icarobernard/sisval.git
cd sisval
composer install --ignore-platform-req=ext-fileinfo
```

```bash
php artisan migrate
php artisan serve
```

Lembre-se de conferir se na pasta do php, no arquivo php.ini se a extensão **extension=pdo_mysql** está habilitada, caso não esteja, remova o ";" para descomentar.
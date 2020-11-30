<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center" style="color:red">Doubletapp</h1>
    <h3 align="center">Тестовое задание - RESTfull API</h3>
    <br>
</p>

Демо версия [doubletapp.kadastrcard.ru](http://doubletapp.kadastrcard.ru/site/login)

```
Логин:  admin
Пароль: admin

или

Логин:  demo
Пароль: demo
```

Развернуть сайт
```
git clone https://github.com/SlavKoVrn/Doubletapp
```
перейти в каталог Doubletapp
```
cd Doubletapp
```
Установить библиотеки
```
conposer update
```
Настроить доступ к базе данных
```
/config/db.php
<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```
Создание таблиц базы данных
```
yii migrate/up
```
Установить корень сайта в каталог /web


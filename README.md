<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center" style="color:red">Doubletapp</h1>
    <h3 align="center">Тестовое задание - RESTfull API</h3>
    <br>
</p>

<strong>Демо версия</strong> [doubletapp.kadastrcard.ru](http://doubletapp.kadastrcard.ru/site/login)

```
Логин:  admin
Пароль: admin

или

Логин:  demo
Пароль: demo
```

<h2>Развернуть сайт</h2>
```
git clone https://github.com/SlavKoVrn/Doubletapp
```
<strong>перейти в каталог Doubletapp</strong>
```
cd Doubletapp
```
<strong>Установить библиотеки</strong>
```
conposer update
```
<strong>Настроить доступ к базе данных</strong>
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
<strong>Создание таблиц базы данных</strong>
```
yii migrate/up
```
<strong>Установить корень сайта в каталог /web</strong>


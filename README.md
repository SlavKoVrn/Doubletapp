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

<h3>перейти в каталог Doubletapp</h3>

```
cd Doubletapp
```

<h3>Установить библиотеки</h3>

```
conposer update
```

<h3>Настроить доступ к базе данных</h3>

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

<h3>Создание таблиц базы данных</h3>

```
yii migrate/up
```

<h3>Установить корень сайта в каталог /web</h3>

<h2>Тестирование работы</h2>

<h3>Установить константу API_SECRET</h3>

```
/config/params.php
<?php
return [
    ...
    'API_SECRET' => '95bf06e345d394ba88873c7de11a7d9d',
];
```

<h3>Реализованы следующие endpoint'ы</h3>
запрос к RESTfull API должен содержать заголовок
Secret: 95bf06e345d394ba88873c7de11a7d9d
иначе будет ответ

```
{
    "name": "Forbidden",
    "message": "У Вас нет доступа",
    "code": 0,
    "status": 403,
    "type": "yii\\web\\ForbiddenHttpException"
}
```

GET http://doubletapp.kadastrcard.ru/categories
Secret: 95bf06e345d394ba88873c7de11a7d9d

```
[
    {
        "id": 1,
        "name": "People and things",
        "icon": "http://kadastrcard.ru/images/yii2.png"
    },
    {
        "id": 2,
        "name": "Appearance and character",
        "icon": null
    },
    {
        "id": 3,
        "name": "Time and dates",
        "icon": null
    },
    {
        "id": 4,
        "name": "Фразовые глаголы",
        "icon": null
    }
]
```

GET http://doubletapp.kadastrcard.ru/levels
Secret: 95bf06e345d394ba88873c7de11a7d9d

```
[
    {
        "id": 1,
        "name": "Elementary",
        "code": "A1"
    },
    {
        "id": 2,
        "name": "pre-intermediate",
        "code": ""
    },
    {
        "id": 3,
        "name": "intermediate",
        "code": ""
    },
    {
        "id": 4,
        "name": "upper_intermediate",
        "code": ""
    }
]
```

GET http://doubletapp.kadastrcard.ru/themes?s[category]=1&s[level]=1
Secret: 95bf06e345d394ba88873c7de11a7d9d

```
[
    {
        "id": 1,
        "category": 1,
        "level": 1,
        "name": "Relationship",
        "photo": "http://kadastrcard.ru/images/yii2.png"
    }
]
```

GET http://doubletapp.kadastrcard.ru/themes/1?expand=words
Secret: 95bf06e345d394ba88873c7de11a7d9d

```
{
    "id": 1,
    "category": 1,
    "level": 1,
    "name": "Relationship",
    "photo": "http://kadastrcard.ru/images/yii2.png",
    "words": [
        {
            "id": 1,
            "name": "to ask out",
            "translation": "Пригласить на свидание",
            "transcription": "tuː ɑːsk aʊt",
            "example": "John has asked Mary out several times.",
            "sound": "http://kadastrcard.ru/images/ring.wav"
        }
    ]
}
```

GET http://doubletapp.kadastrcard.ru/words/1
Secret: 95bf06e345d394ba88873c7de11a7d9d

```
{
    "id": 1,
    "name": "to ask out",
    "translation": "Пригласить на свидание",
    "transcription": "tuː ɑːsk aʊt",
    "example": "John has asked Mary out several times.",
    "sound": "http://kadastrcard.ru/images/ring.wav"
}
```

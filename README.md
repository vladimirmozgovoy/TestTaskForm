# Выполнение тестового задания 

## Задача 

Написать набор классов для валидации форм. Код должен быть только вашим (не скопированным).
Набор должен содержать не менее 2х абстрактных классов/интерфейсов (AbstractValidator и AbstractForm) Реализовать несколько разных валидаторов, и несколько форм (форма должна уметь валидировать себя). Рендеринг формы делать не надо, только бизнес логику. Код должен быть гибкий и простой в использовании.

## Выполнение задания 

Для того чтобы добавить новый класс валидатора данных нужно добавить в файле Core/Validators/ValidatorNames.php значение класса и название класса 

Core/Validators/ValidatorNames.php

```php
<?php


namespace Validators;

class ValidatorNames
{
    /**
     * Подключение валидаторов
     */
    const MAP = [
        'email' => EmailValidator::class,
        'integer' => IntegerValidator::class,
    ];

}
```

В данном примере у нас работает проверка формы на примере файла App/Forms/UserForm.php

```php
<?php


namespace Forms;

class UserForm extends  AbstractForm
{
    protected  $data;

    protected  $pattern;

    public function __construct()
    {
        $this->data = [
            'code' => 200,
            'name' => 'test',
            'email' => 'sdfsf@sdf',
        ];
        $this->pattern = [
            'code' => ['integer'],
             'email' => ['email']
        ];

    }

}
```

## Routes

/get-user-form - получение пользовательской формы

/get-new-form - получение новой формы

Core/Routes/ApiRoutes.php

```php
<?php

namespace Routes;

use Controllers\FormController;
use Forms\NewForm;


abstract class ApiRoutes
{
    /**
     * Установка Routes
     * $map [method][url]
     * method - имя метода
     * url -  url передаваемый в строку пользователя
     * @return array
     */
    public static function getAllRoutes(): array
    {
        $map['get']["/get-user-form"] = ['class' => FormController::class, 'action' => "getUserForm"];
        $map['get']["/get-new-form"] = ['class' => FormController::class, 'action' => "getNewForm",];
        return $map;
    }
}
```


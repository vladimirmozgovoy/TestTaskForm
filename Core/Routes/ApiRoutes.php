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
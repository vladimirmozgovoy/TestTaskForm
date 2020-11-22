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
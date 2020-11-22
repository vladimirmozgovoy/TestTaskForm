<?php


namespace Validators;


use ValidatorInterfaces\ValidatorInterface;

class EmailValidator implements ValidatorInterface
{
    const ENTITY = "email";

    /** Валидация email
     * @param $data
     * @return bool
     */
    public static function validate($data): bool
    {
        return filter_var($data, FILTER_VALIDATE_EMAIL);
    }
}
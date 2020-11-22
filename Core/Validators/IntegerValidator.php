<?php


namespace Validators;


use ValidatorInterfaces\ValidatorInterface;

class IntegerValidator implements ValidatorInterface
{
    const ENTITY = "integer";

    /** Проверка значения (integer)
     * @param $data
     * @return bool
     */
    public static function validate($data): bool
    {
        return (is_int($data));
    }
}
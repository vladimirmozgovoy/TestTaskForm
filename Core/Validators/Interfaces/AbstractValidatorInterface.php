<?php


namespace ValidatorInterfaces;


interface AbstractValidatorInterface
{
    public static function validate(array $data, array $pattern):array ;
}
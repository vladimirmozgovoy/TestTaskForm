<?php


namespace ValidatorInterfaces;


interface ValidatorInterface
{
    public static function validate($data):bool;
}
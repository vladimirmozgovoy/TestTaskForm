<?php


namespace Validators;

use ValidatorInterfaces\AbstractValidatorInterface;

abstract class AbstractValidator implements AbstractValidatorInterface
{
    /** Получение валидатора
     * @param string $type
     * @return bool|string
     */
    public static function getValidator(string $type)
    {
        if(!isset (ValidatorNames::MAP[$type])){
            return false;
        }
        return ValidatorNames::MAP[$type];
    }

    /** Метод который перебирает методы для валидации
     * @param $value
     * @param $listValidators
     * @return array
     */
    private static function validateItem($value,$listValidators):array
    {
        foreach ($listValidators as $items){

            $validator = AbstractValidator::getValidator($items);
            if(!$validator){
                $response['result'] = false;
                $response['message'] = 'not exist validator';
                return  $response;
            }
            if(!$validator::validate($value)){

                $response['result'] = false;
                $response['message'] = 'is not '.$validator::ENTITY;
                return $response;
            }

        }
        $response['result'] = true;
        return $response;
    }

    /** Валидация
     * @param array $data
     * @param array $pattern
     * @return array
     */
    public static function validate(array $data, array $pattern):array
    {
        foreach ($data as $key => $value){
            if(isset($pattern[$key])) {
                $resultValidate = self::validateItem($value, $pattern[$key]);

                if (!$resultValidate['result']) {
                    $response['result'] = false;
                    $response['data'] = $value." ".$resultValidate['message'];
                    return  $response;
                }
            }
        }
        $response['result'] = true;
        return $response;
    }
}
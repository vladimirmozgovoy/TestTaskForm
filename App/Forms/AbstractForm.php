<?php

namespace Forms;

use Core\Response;
use FormInterfaces\FormInterface;
use Validators\AbstractValidator;

abstract class AbstractForm implements FormInterface
{
    protected  $data;
    protected  $pattern;

    /** Получение формы
     * @param $message
     * @param bool $validate
     * @return false|string
     */
    public  function getForm($message,$validate = false){
       if(!$validate){
           return  Response::setResponse(200,$message,$this->data);
       }
      $validationResult = AbstractValidator::validate($this->data,$this->pattern);

       if($validationResult['result']){
          return  Response::setResponse(200,$message,$this->data);
      }
      else{
          return  Response::setResponse(500,$validationResult['data']);
      }
    }


}
<?php

namespace Controllers;
use Forms\NewForm;
use Forms\UserForm;

class FormController
{
    /** Получение пользовательской формы
     * @return false|string
     */
    public  function getUserForm()
    {
        $userForm = new UserForm();
       return $userForm->getForm('Пользовательская форма',true);
    }
    public  function getNewForm()
    {
        $newForm = new NewForm();
        return $newForm->getForm('Новая форма',true);
    }
}
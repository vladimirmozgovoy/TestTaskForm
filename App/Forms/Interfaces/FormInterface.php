<?php
namespace FormInterfaces;

use Validators\AbstractValidator;

interface FormInterface
{

    public function getForm($message,$validate = false);

}

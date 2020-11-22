<?php

namespace Forms;

class NewForm extends  AbstractForm
{
    protected  $data;

    protected  $pattern;

    public function __construct()
    {
        $this->data = [
            'number' => 200,
            'name' => 'test',
            'email' => 'sdfsf@sdf.ru',
        ];
        $this->pattern = [
            'number' => ['integer'],
             'email' => ['email']
        ];

    }

}

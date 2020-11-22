<?php


namespace Forms;

class UserForm extends  AbstractForm
{
    protected  $data;

    protected  $pattern;

    public function __construct()
    {
        $this->data = [
            'code' => 200,
            'name' => 'test',
            'email' => 'sdfsf@sdf',
        ];
        $this->pattern = [
            'code' => ['integer'],
             'email' => ['email']
        ];

    }

}

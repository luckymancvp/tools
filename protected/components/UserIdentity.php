<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function authenticate()
    {
        $this->errorCode = self::ERROR_NONE;
        return $this->errorCode;
    }

    public function getId(){
        return $this->model->id;
    }
}
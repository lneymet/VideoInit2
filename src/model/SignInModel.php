<?php

namespace VideoInit\model;

class SignInModel
{

    private $aliasUser;
    private $pwdUser;

    public function __construct($aliasUser, $pwdUser){
        $this->aliasUser = $aliasUser;
        $this->pwdUser = $pwdUser;
    }


    public function getAliasUser(){
        return $this->aliasUser;
    }

    public function getPwdUser(){
        return $this->pwdUser;
    }

}

/**
 * Created by PhpStorm.
 * User: DL02
 * Date: 03/06/2015
 * Time: 14:48
 */ 
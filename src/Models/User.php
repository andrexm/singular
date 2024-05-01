<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct('user', ['first_name', 'last_name', 'email']);
    }

    /**
    * @return User|bool
    */
    public function findByEmail(string $email = ''): User|bool
    {
        if($email == '' && request()->input("email")) $email = request()->input("email"); // use the email inside the request data
        
        if(!validate_email($email)) {
            return false;
        }

		return (new User())->find("email = :email", "email=" . $email)->fetch() ?? false;
    }
}

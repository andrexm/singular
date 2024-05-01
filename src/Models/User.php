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
}

<?php

namespace Src\Models;

use Src\Core\Database;

class User extends Database
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct('user', ['first_name', 'last_name', 'email']);
    }
}

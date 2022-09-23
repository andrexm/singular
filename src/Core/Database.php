<?php

namespace Src\Core;

use CoffeeCode\DataLayer\DataLayer;

class Database extends DataLayer
{
    /**
     * Constructor
     *
     * @param string $entity
     * @param array $required
     * @param string $primary
     * @param boolean $timestamps
     * @param array|null $database
     */
    public function __construct(
        string $entity,
        array $required,
        string $primary = 'id',
        bool $timestamps = true,
        array $database = null
    )
    {
        parent::__construct($entity, $required, $primary, $timestamps, $database);
    }
}

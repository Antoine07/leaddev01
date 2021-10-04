<?php

namespace User;

use SplObjectStorage;

class UserRepository{
    
    public function __construct( private Connect $conn )
    {}

    public function add(User $user):void{

        $this->conn->add( $user );
    }

    public function all():SplObjectStorage{

        return $this->conn->all(); 
    }

}
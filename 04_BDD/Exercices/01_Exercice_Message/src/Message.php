<?php

namespace App;

class Message{
 
    public function __construct(private array $message = [])
    {}

    /**
     * Get the value of message
     */ 
    public function get():string
    {
        return implode(" ", $this->message);
    }

    /**
     * Set the value of message
     *
     * @return null
     */ 
    public function set(string $message):void
    {
        if( is_numeric($message) === true ) throw new \TypeError("Erreur de  type pour votre valeur");

        $this->message[] = strtoupper( $message );
    }
}
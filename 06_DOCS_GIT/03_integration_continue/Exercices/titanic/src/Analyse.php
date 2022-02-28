<?php

namespace App;

class Analyse{

    private $handle;
    private $file;
    
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function loadData(string $file){
        $this->handle = fopen($file, "r"); 
    }

    public function __toString()
    {
        return "Analyse Data Titanic";
    }
}
<?php

namespace App;

class Message
{
    protected $array = [];
    public function __construct(
        private string $lang = 'fr',
        private array $translates = [
            'fr' => 'Bonjour tout le monde!',
            'en' => 'Hello World!'
        ]
    ) {

    }

    public function get(): string
    {
        return $this->translates[$this->lang];
    }

    public function setLang(string $lang): void
    {

        $this->lang = $lang;
    }

    public function getArray():array{
        return $this->array;
    }

    public function add(int $number):void{

        $this->array[] = $number;
    }
}

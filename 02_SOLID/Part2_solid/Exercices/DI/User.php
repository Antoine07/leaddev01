<?php

class User
{

    public function __construct(protected SplObjectStorage $storage )
    {
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    // Interest(s) User


    public function getInterests():void{

        foreach($this->storage as $storage){
            echo "Interest: {$storage->getName()} " .PHP_EOL;
        }
    }

    public function setInterest(Interest $interest){
        $this->storage->attach( $interest );

        return $this;
    }
}

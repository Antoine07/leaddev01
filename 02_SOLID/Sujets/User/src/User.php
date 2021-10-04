<?php

namespace User;

class User
{

    public function __construct(
        private string $name,
        private float $age
    ) {
    }

    /**
     * Get the value of name
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name):self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of age
     */
    public function getAge():float
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */
    public function setAge($age):self
    {
        $this->age = $age;

        return $this;
    }
}

<?php

class Container
{

    public function __construct(
        protected SplObjectStorage $storage
    ) {
    }

    /**
     * Get the value of storage
     */
    public function getStorage(string $name)
    {
        // Remet l'itérateur au début
       $this->storage->rewind();
       // valid indique qu'il y a encore un élément à dépiler et si plus rien ça retourne false
       while($this->storage->valid()){
        // var_dump($this->storage->getInfo());
        // var_dump($this->storage->current()); // objet enregistrer à cette position dans le SplObjectStorage
        if($name === $this->storage->getInfo()){

            return $this->storage->current(); // Objet interest
        }
        // avancer à l'itération suivante
        $this->storage->next();
       }

    //    $this->storage->rewind();

    //    foreach($this->storage as $k => $v){
        
    //     var_dump($k, $v->getInfo());

    //    }
    }

    /**
     * Set the $interest Service and $name name of service
     *
     * @param Interest $interest
     * @param string $name
     * 
     * @return  self
     */
    public function setStorage(Interest $interest, string $name)
    {
        // On ajoute l'objet $interest (service) + sa clé pour accéder à ce service $name
        $this->storage->attach($interest, $name);

        return $this;
    }
}
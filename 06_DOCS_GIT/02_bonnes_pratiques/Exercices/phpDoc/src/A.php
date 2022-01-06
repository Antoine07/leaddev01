<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Antoine Lucsko <antoine@antoine.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\A;

/**
 * A pour afficher un super message
 *
 * @author Antoine Lucsko <antoine@antoine.com>
 */
class A
{
    /**
     * Petite fonction qui affiche un message
     *
     * Cette fonction est une fonction d'exemple *simple* 
     * # Une introduction à PHPDoc
     * ## Definition
     * PHPDoc permet de documenter vos fonctions simplement
     *
     * @param string $message définir le message à retourner
     *
     * @return string
     */
    public function show(string $message): string
    {

        return $message;
    }
}

<?php

namespace User;

use SplObjectStorage;

class Connect
{

    private $isConnect = false;

    public function __construct(
        private string $host,
        private string $login,
        private string $password,
        private SplObjectStorage $storage
    ) {
        $this->isConnect = true;
    }

    public function getConnect()
    {

        return $this->isConnect;
    }

    public function add(User $user): void
    {

        if (!$this->storage->contains($user)) {
            $this->storage->attach($user);
        }
    }

    public function all(): SplObjectStorage
    {

        return $this->storage;
    }
}

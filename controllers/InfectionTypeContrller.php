<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace controllers;

use models\Infection;
use repositories\InfectionRepository;

class InfectionController
{
    public $repository;
    public function __construct()
    {
        $this->repository = new InfectionRepository();
    }

    public function add(Infection $infection)
    {
        return $this->repository->add($infection);
    }

    public function edit(Infection $infection)
    {
        $this->repository->update($infection);
    }

    public function getById($medicare)
    {
        return $this->repository->get($medicare);
    }

    public function delete($medicare)
    {
        $this->repository->delete($medicare);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
}

<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace controllers;

use models\InfectionType;
use repositories\InfectionTypeRepository;

class InfectionTypeController
{
    public $repository;
    public function __construct()
    {
        $this->repository = new InfectionTypeRepository();
    }

    public function add(InfectionType $infectionType)
    {
        return $this->repository->add($infectionType);
    }

    public function edit(InfectionType $infectionType)
    {
        $this->repository->update($infectionType);
    }

    public function getById($typeId)
    {
        return $this->repository->get($typeId);
    }

    public function delete($typeId)
    {
        $this->repository->delete($typeId);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
}

<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace controllers;

use models\Residence;
use repositories\ResidenceRepository;

class residenceController
{
    public $repository;
    public function __construct()
    {
        $this->repository = new ResidenceRepository();
    }

    public function add(Residence $residence)
    {
        return $this->repository->add($residence);
    }

    public function edit(Residence $residence)
    {
        $this->repository->update($residence);
    }

    public function getById($resId)
    {
        return $this->repository->get($resId);
    }

    public function delete($resId)
    {
        $this->repository->delete($resId);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
}

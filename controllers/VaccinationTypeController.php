<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace controllers;

use models\VaccinationType;
use repositories\VaccinationTypeRepository;

class VaccinationTypeController
{
    public $repository;
    public function __construct()
    {
        $this->repository = new VaccinationTypeRepository();
    }

    public function add(VaccinationType $vaccinationType)
    {
        return $this->repository->add($vaccinationType);
    }

    public function edit(VaccinationType $vaccinationType)
    {
        $this->repository->update($vaccinationType);
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

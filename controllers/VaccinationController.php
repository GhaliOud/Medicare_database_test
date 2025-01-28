<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace controllers;

use models\Vaccination;
use repositories\VaccinationRepository;
use repositories\VaccinationTypeRepository;
use repositories\PersonRepository;


class vaccinationController
{
    public $repository;
    public $vaccinationTypeRepository;
    public $personRepository;
    public function __construct()
    {
        $this->repository = new VaccinationRepository();
        $this->vaccinationTypeRepository = new VaccinationTypeRepository();
        $this->personRepository = new PersonRepository();
    }

    public function add(Vaccination $vaccination)
    {
        return $this->repository->add($vaccination);
    }

    public function edit(Vaccination $vaccination)
    {
        $this->repository->update($vaccination);
    }

    public function delete($medicare)
    {
        $this->repository->delete($medicare);
    }

    public function getById($medicare)
    {
        return $this->repository->getAllByMedicare($medicare);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getAllName()
    {
        return $this->personRepository->getAll();
    }

    public function getName($medicare) {
        return $this->personRepository->get($medicare);
    }

    public function getAllType() {
        return $this->vaccinationTypeRepository->getAll();
    }
}

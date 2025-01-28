<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace controllers;

use models\Infection;
use repositories\InfectionRepository;
use repositories\InfectionTypeRepository;
use repositories\PersonRepository;


class infectionController
{
    public $repository;
    public $infectionTypeRepository;
    public $personRepository;
    public function __construct()
    {
        $this->repository = new InfectionRepository();
        $this->infectionTypeRepository = new InfectionTypeRepository();
        $this->personRepository = new PersonRepository();
    }

    public function add(Infection $infection)
    {
        return $this->repository->add($infection);
    }

    public function edit(Infection $infection)
    {
        $this->repository->update($infection);
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
        return $this->infectionTypeRepository->getAll();
    }
}

<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace controllers;

use models\Person;
use repositories\PersonRepository;

class PersonController
{
    public $repository;
    public function __construct()
    {
        $this->repository = new PersonRepository();
    }

    public function add(Person $person)
    {
        return $this->repository->add($person);
    }

    public function edit(Person $person)
    {
        $this->repository->update($person);
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

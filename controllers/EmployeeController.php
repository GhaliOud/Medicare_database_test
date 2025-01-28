<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace controllers;

use models\Employee;
use repositories\EmployeeRepository;
use repositories\PersonRepository;

class EmployeeController
{
    public $repository;
    public $personRepository;
    public function __construct()
    {
        $this->repository = new EmployeeRepository();
        $this->personRepository = new PersonRepository();
    }

    public function add(Employee $employee)
    {
        return $this->repository->add($employee);
    }

    public function edit(Employee $employee)
    {
        $this->repository->update($employee);
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

    public function getAllUnemployed()
    {
        return $this->repository->getAllName();
    }

    public function getName($medicare) {
        return $this->personRepository->get($medicare);
    }
}

<?php
// COMP 353 Database X 2234 Nematolllaah Shiri (Winter 2024)
// Authors: Bayazeed Rahman, Ghali Oudghiri, Henri Stephane Carbon, Jutipong Puntuleng

namespace controllers;

use models\Facility;
use repositories\FacilityRepository;
use repositories\EmployeeRepository;

class FacilityController
{
    public $repository;
    public $employeeRepository;
    public function __construct()
    {
        $this->repository = new FacilityRepository();
        $this->employeeRepository = new EmployeeRepository();
    }

    public function add(Facility $facility)
    {
        return $this->repository->add($facility);
    }

    public function edit(Facility $facility)
    {
        $this->repository->update($facility);
    }

    public function getById($fid)
    {
        return $this->repository->get($fid);
    }

    public function delete($fid)
    {
        $this->repository->delete($fid);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getAllManagers() {
        // will need to fix this later to filter out only eligible people
        return $this->employeeRepository->getAll();
    }

    public function getManager($gmMedicare) {
        return $this->employeeRepository->get($gmMedicare);
    }
}

<?php

namespace App\Services;

use App\Repository\SalesOpportunityRepository;

class SalesOpportunityService
{
    protected $repository;

    public function __construct(SalesOpportunityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($data, $user)
    {
        return $this->repository->create($data, $user);
    }

    public function list()
    {
        return $this->repository->list();
    }

    public function approve($id)
    {
        return $this->repository->approve($id);
    }

    public function refuse($id)
    {
        return $this->repository->refuse($id);
    }
}

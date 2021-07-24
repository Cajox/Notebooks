<?php

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface SpecificationRepositoryInterface
{
    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data) : Model;
}

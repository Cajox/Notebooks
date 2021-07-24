<?php

namespace App\Repository;

use App\Models\Specification;
use App\Repository\Interfaces\SpecificationRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class SpecificationRepository implements SpecificationRepositoryInterface
{
    /**
     * @var Specification
     */
    private $specificationModel;

    /**
     * SpecificationRepository constructor.
     * @param Specification $specificationModel
     */
    public function __construct(Specification $specificationModel)
    {
        $this->specificationModel = $specificationModel;
    }

    /**
     * Store Notebook specifications to database and returns instance
     *
     * @param array $data
     * @return Model
     */
    public function store(array $data) : Model
    {
        return $this->specificationModel->create($data);
    }
}

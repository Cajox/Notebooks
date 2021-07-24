<?php

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface NotebookRepositoryInterface
{
    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data) : Model;

    /**
     * @param string $productId
     * @return mixed
     */
    public function existsProductId(string $productId);
}

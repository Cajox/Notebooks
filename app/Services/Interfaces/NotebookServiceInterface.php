<?php

namespace App\Services\Interfaces;

interface NotebookServiceInterface
{
    /**
     * Import notebooks
     *
     * @param array $notebooks
     * @return mixed
     */
    public function importNotebooks(array $notebooks);
}

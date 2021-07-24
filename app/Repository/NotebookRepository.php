<?php


namespace App\Repository;

use App\Models\Notebook;
use App\Repository\Interfaces\NotebookRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class NotebookRepository implements NotebookRepositoryInterface
{
    /**
     * @var Notebook
     */
    private $notebookModel;

    /**
     * NotebookRepository constructor.
     * @param Notebook $notebookModel
     */
    public function __construct(Notebook $notebookModel)
    {
        $this->notebookModel = $notebookModel;
    }

    /**
     * Store Notebooks to database and returns instance
     *
     * @param array $data
     * @return Model
     */
    public function store(array $data) : Model
    {
        return $this->notebookModel->create($data);
    }

    /**
     * Returns notebook with given product id if exists
     *
     * @param string $productId
     * @return mixed
     */
    public function existsProductId(string $productId)
    {
        return $this->notebookModel->where('product_id', $productId)->first();
    }
}

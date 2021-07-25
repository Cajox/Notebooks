<?php


namespace App\Repository;

use App\Models\Notebook;
use App\Repository\Interfaces\NotebookRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;


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
     * Get all notebooks - pagination 20 per page
     *
     * @return LengthAwarePaginator
     */
    public function getAll()
    {
        return $this->notebookModel
            ->with('specifications')
            ->paginate(20);
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

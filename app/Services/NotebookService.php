<?php


namespace App\Services;


use App\Repository\NotebookRepository;
use App\Repository\SpecificationRepository;
use App\Services\Interfaces\NotebookServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class NotebookService implements NotebookServiceInterface
{
    /**
     * @var NotebookRepository
     */
    private $notebookRepository;

    /**
     * @var SpecificationRepository
     */
    private $specificationRepository;

    /**
     * NotebookService constructor.
     * @param NotebookRepository $notebookRepository
     * @param SpecificationRepository $specificationRepository
     */
    public function __construct(NotebookRepository $notebookRepository, SpecificationRepository $specificationRepository)
    {
        $this->notebookRepository = $notebookRepository;
        $this->specificationRepository = $specificationRepository;
    }

    /**
     * Get all notebooks - pagination 20 per page
     *
     * @return LengthAwarePaginator
     */
    public function getAllNotebooks()
    {
        return $this->notebookRepository->getAll();
    }

    /**
     * Store notebooks
     *
     * @param array $notebooks
     */
    public function importNotebooks(array $notebooks)
    {
        if (isset($notebooks)){
            foreach ($notebooks as $notebook){
                $notebook = $notebook['_source'];

                if (!$this->notebookRepository->existsProductId($notebook['search_result_data']['product_id'])){
                    $notebookModel = $this->notebookRepository->store([
                        'product_id' => $notebook['search_result_data']['product_id'],
                        'ean' => $notebook['search_result_data']['ean'],
                        'name' => $notebook['search_result_data']['name'],
                        'title' => $notebook['search_result_data']['title'],
                        'brand' => $notebook['search_result_data']['brand'],
                        'brand_image' => $notebook['search_result_data']['brand_image'],
                        'product_image' => $notebook['search_result_data']['image'],
                        'gift' => $notebook['search_result_data']['gift_url'],
                        'search_data' => $notebook['search_data']['full_text'],
                        'price' => $notebook['search_result_data']['price']
                    ]);

                    $specifications = $notebook['search_result_data']['specification_summary'];

                    if (isset($specifications)){
                        foreach ($specifications as $specification){
                            $this->specificationRepository->store([
                                'notebook_id' => $notebookModel->id,
                                'name' => $specification['name'],
                                'value' => $specification['value']
                            ]);
                        }
                    }
                }
            }
        }
    }
}

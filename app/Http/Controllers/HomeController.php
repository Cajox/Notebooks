<?php

namespace App\Http\Controllers;

use App\Services\NotebookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var NotebookService
     */
    private $notebookService;

    /**
     * HomeController constructor.
     * @param NotebookService $notebookService
     */
    public function __construct(NotebookService $notebookService)
    {
        $this->notebookService = $notebookService;
    }

    /**
     * Get all notebooks with pagination 20 per page
     *
     * @return JsonResponse
     */
    public function getNotebooks() : JsonResponse
    {
        $notebooks = $this->notebookService->getAllNotebooks();
        return response()->json($notebooks, 202);
    }
}

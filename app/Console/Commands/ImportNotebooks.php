<?php

namespace App\Console\Commands;

use App\Services\NotebookService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ImportNotebooks extends Command
{
    /**\
     * Api for Gigatron notebooks
     */
    const NOTEBOOKS_URL = 'https://search.gigatron.rs/v1/catalog/get/prenosni-racunari/laptop-racunari';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:notebooks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will store all notebooks from defined api';
    /**
     * @var NotebookService
     */
    private $notebookService;
    
    /**
     * ImportNotebooks constructor.
     * @param NotebookService $notebookService
     */
    public function __construct(NotebookService $notebookService)
    {
        parent::__construct();
        $this->notebookService = $notebookService;
    }


    /**
     * @param int $i
     */
    public function handle($i = 1)
    {
        $notebooksResponse = Http::get(self::NOTEBOOKS_URL . '?strana=' . $i);
        $notebooksData = $notebooksResponse->json();
        $notebooks = $notebooksData['hits']['hits'];

        DB::beginTransaction();

        try {
            $this->notebookService->importNotebooks($notebooks);

            DB::commit();
            $this->info('Notebooks - page:' . $i .' imported!');

            if ($notebooksData['currentPage'] == $notebooksData['totalPages']){
                $this->line('All imported!');
            } else{
                $i++;
                $this->handle($i);
            }
        } catch (\Exception $e) {
            DB::rollback();
            $this->error($e->getMessage());
        }
    }
}

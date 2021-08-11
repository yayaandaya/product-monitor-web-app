<?php
/**
 * Created by IntelliJ IDEA.
 * User: yayaandaya
 * Date: 11/08/21
 * Time: 19.40
 */

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetProductPriceCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Worker for scrapping website to get product price';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        Log::info('Running crawler for getting updated price '.date('Y-m-d H:i:s').' ');
        $result = app('App\Http\Controllers\ProductPriceHistoryController')->create();
        Log::info(json_encode($result));

    }
}

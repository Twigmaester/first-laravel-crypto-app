<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CoinMarketCapWrapper;

class GetCrypto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:crypto {coin1=btc} {coin2=usd}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the price and volume of a coin that you choose in the currency you choose.';

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
     * Get coin pair data.
     * 
     * If succesfull.
     * @return array
     * 
     * Else.
     * @return int 
     */
    private function getCoinData()
    {
        $coin1 = strtoupper($this->argument('coin1'));
        $coin2 = strtoupper($this->argument('coin2'));
        $data = CoinMarketCapWrapper::getData($coin1, $coin2);

        return $data;
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = $this->getCoinData();

        $lines = [
            'You need to use at least one valid slug as a parameter.',
            'Valid slugs are slugs of all of the cryptocurrencies supported by the Coinmarketcap API.',
            'You can also call get:crypto without arguments and it will default to btc/usd pair.',
            'The second paramater can be the slug of fiat currency, but you can also use another cryptocurrency',
            'You can also only use the first argument and the second will default to usd',
            'Examples of valid calls: "php artisan get:crypto", "php artisan get:crypto btc eur" and "php artisan get:crypto ada"',
            'The first example will default to btc/usd, the second will be btc/eur and the third ada/usd',
          ];

        if(!is_array($data))
        {
            foreach($lines as $line)
            {
            $this->error($line);
            }
            return;
        }

        $coin1 = $data['first_coin'];
        $coin2 = $data['second_coin'];
        $price = $data['price'];
        $volume = $data['volume'];

        $this->info("The price of $coin1 is $price $coin2");
        $this->info("The volume is $volume $coin2");

        return;
    }
}
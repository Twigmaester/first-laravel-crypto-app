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
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $coin1 = strtoupper($this->argument('coin1'));
        $coin2 = strtoupper($this->argument('coin2'));

        $data = CoinMarketCapWrapper::getData($coin1, $coin2);

        $lines = [
            'You need to use at least one valid slug as a parameter.',
            'Valid slugs are slugs of all of the cryptocurrencies supported by the Coinmarketcap API.',
            'You can also call get:crypto without arguments and it will default to btc/usd pair.',
            'The second paramater can be the slug of fiat currency, but you can also use another cryptocurrency',
            'You can also only use the first argument and the second will default to usd',
            'Examples of valid calls: "php artisan get:crypto", "php artisan get:crypto btc eur" and "php artisan get:crypto ada"',
            'The first example will default to btc/usd, the second will be btc/eur and the third ada/usd'
          ];

        function printLines($msgs) {
            foreach($msgs as $msg) {
            echo $msg . PHP_EOL;
            }
            }

        if ($data["status"]["error_code"] !== 0) {

            printLines($lines);

            return;
        }

        $price = number_format($data["data"][$coin1]["quote"][$coin2]["price"], $decimals = 2, $decimal_separator = "," , $thousands_separator = ".");
        $volume = number_format($data["data"][$coin1]["quote"][$coin2]["volume_24h"], $decimals = 2, $decimal_separator = "," , $thousands_separator = ".");

        function displayCoinData($coin1, $coin2, $price, $volume) {

            $line = '%s currently priced at %s %s.';
            $line .= PHP_EOL;
            $line .= 'Todays volume is %s %s';
            $line .= PHP_EOL;
            echo sprintf($line, $coin1, $price, $coin2, $volume, $coin2);
            }

            displayCoinData($coin1, $coin2, $price, $volume);

    }
}
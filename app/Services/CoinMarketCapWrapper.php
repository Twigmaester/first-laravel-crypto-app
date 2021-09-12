<?php

namespace App\Services;
use Illuminate\Support\Facades\Cache;

class CoinMarketCapWrapper
{


    public static function getData($coin1, $coin2) {


        if (Cache::has('coin_pair')) {
            $cacheData = cache('coin_pair');
            if ($cacheData['first_coin'] === $coin1 && $cacheData['second_coin'] === $coin2) {
                return $cacheData;
            }
        }

        $curl = curl_init();

        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
        $apiKey = config('services.coinMarketCap.key');
        $parameters = [
            'symbol' => $coin1,
            'convert' => $coin2
        ];

        $headers = [
            'Accepts: application/json',
            'api-key' => 'X-CMC_PRO_API_KEY: ' . $apiKey,
        ];

        $qs = http_build_query($parameters);

        $request = "{$url}?{$qs}";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => 1
        ));

        $curlData = curl_exec($curl);
        $responseData = json_decode($curlData, true);

        $price = number_format($responseData["data"][$coin1]["quote"][$coin2]["price"], $decimals = 2, $decimal_separator = "," , $thousands_separator = ".");
        $volume = number_format($responseData["data"][$coin1]["quote"][$coin2]["volume_24h"], $decimals = 2, $decimal_separator = "," , $thousands_separator = ".");

        $pairData = [
            'first_coin' => $coin1,
            'second_coin' => $coin2,
            'price' => $price,
            'volume' => $volume,
        ];

        Cache::add('coin_pair', $pairData, 60);

        curl_close($curl);

        return $pairData;


    }
}
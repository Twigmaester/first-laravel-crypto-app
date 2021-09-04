<?php
namespace App\Http\Controllers;

use App\Services\CoinMarketCapWrapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CryptoController extends Controller
{

    public function store(Request $request) {


        $coin1 = strtoupper($request->input('coin1'));
        $coin2 = strtoupper($request->input('coin2'));

        $data = CoinMarketCapWrapper::getData($coin1, $coin2);

        return view('getPrice', ['coin1' => $data['first_coin'], 'coin2' => $data['second_coin'], 'price' => $data['price'], 'volume' => $data['volume'],]);

    }

}
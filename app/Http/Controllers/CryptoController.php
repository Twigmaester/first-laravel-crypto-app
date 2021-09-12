<?php
namespace App\Http\Controllers;

use App\Services\CoinMarketCapWrapper;
use Illuminate\Http\Request;
use App\Models\CoinPair;
use Illuminate\Support\Facades\DB;


class CryptoController extends Controller
{

    public function viewPair(Request $request) {

        if($_POST['action'] === 'Favorite') {
            $this->validate(request(), [
                'coin1' => 'required',
                'coin2' => 'required',
            ]);
    
            $coinPair = CoinPair::create(request(['coin1', 'coin2']));
            
            
            return redirect()->to('crypto');
        };

        $coin1 = strtoupper($request->input('coin1'));
        $coin2 = strtoupper($request->input('coin2'));

        $data = CoinMarketCapWrapper::getData($coin1, $coin2);

        return view('getPrice', ['coin1' => $data['first_coin'], 'coin2' => $data['second_coin'], 'price' => $data['price'], 'volume' => $data['volume'],]);

    }

}
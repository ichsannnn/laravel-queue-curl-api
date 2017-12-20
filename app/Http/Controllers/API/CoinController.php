<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Jobs\GetCoin;

class CoinController extends Controller
{
    public function get_coin()
    {
      $client = new Client();
      $coin = $client->request('GET', 'https://www.cryptocompare.com/api/data/coinlist');
      $coin_list = json_decode($coin->getBody(), TRUE);

      foreach ($coin_list['Data'] as $key => $value) {

        $long_name = array_key_exists('CoinName', $value) ? $value['CoinName'] : '';
        $symbol = array_key_exists('Symbol', $value) ? $value['Symbol'] : '';
        $endpoint = $coin_list['BaseImageUrl'];
        $image_url = array_key_exists('ImageUrl', $value) ? $value['ImageUrl'] : '';
        $algorithm = array_key_exists('Algorithm', $value) ? $value['Algorithm'] : '';

        $data[] = [
          'long_name' => $long_name,
          'symbol' => $symbol,
          'endpoint' => $endpoint,
          'image_url' => $image_url,
          'algorithm' => $algorithm
        ];
      }

      $data_chunk = array_chunk($data, 100);
      foreach ($data_chunk as $key => $chunk_value) {
        dispatch(new GetCoin($chunk_value));
      }

      echo "Queue added.";
    }
}

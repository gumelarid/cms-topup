<?php

namespace App\Repository\Api;


use App\Models\Price;
use App\Models\GameList;
use App\Repository\Api\ApiRepository;

class ApiImplement implements ApiRepository
{
    public function getGameList()
    {
        $data =  GameList::get();

        return $data;
    }

    public function gameDetail($id)
    {
        $game = GameList::where('game_id', $id)->first();

        return $game;
    }



    public function priceList($payment, $gameId)
    {

        $result = [];
        foreach ($payment as $pay) {
            $price = Price::where('payment_id', $pay->payment_id)->where('game_id', $gameId)->orderBy('price', 'asc')->get();
            $data = [
                'Payment' => $pay,
                'Price' => $price
            ];

            array_push($result, $data);
        };

        return $result;
    }
}

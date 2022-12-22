<?php

namespace App\Repository\Frontend\Invoice;

use App\Models\Code_payment;
use App\Models\GameList;
use App\Models\Price;
use App\Models\Transaction;

class InvoiceRepositoryImplement implements InvoiceRepository
{
  public function getTransactionById(string $id)
  {
    // $data = Transaction::join('prices', 'transactions.price_id', '=', 'prices.price_id')
    // ->select(
    //   'invoice',
    //   'transactions.game_id',
    //   'id_player',
    //   'method_payment',
    //   'transactions.price_id',
    //   'price',
    //   'email',
    //   'total_price')
    // ->where('invoice', $id)->first();
    $data = Transaction::select(
      'invoice',
      'game_id',
      'id_player',
      'method_payment',
      'price_id',
      'email',
      'total_price')
    ->where('invoice', $id)->first();
    return $data;
  }

  public function getGameInfo(string $id)
  {
    $data = GameList::select('id', 'game_id', 'game_title')->where('id', $id)->first()->toArray();
    return $data;
  }

  public function getDetailPrice($id)
  {
    $data = Price::join('payments', 'prices.payment_id', '=', 'payments.payment_id')
    ->select(
      'channel_id',
      'name_channel',
      'price',
      'name',
      'amount',
      'code_payment',
      'category_id',
      'url')
    ->where('price_id', $id)->first();
    return $data;
  }

  public function getNameCodePayment(string $id)
  {
    $data = Code_payment::select('code_payment')->where('id', $id)->first()->toArray();
    return $data['code_payment'];
  }
} 
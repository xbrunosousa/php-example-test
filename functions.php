<?php

namespace MonetizzeTest;

class Application
{
  private $quantity;
  private $result;
  private $totalGames;
  private $games;
  private $quantityAcceptableValues = [6, 7, 8, 9, 10];

  public function __construct($quantity, $totalGames)
  {
    $this->quantity = $quantity;
    $this->totalGames = $totalGames;
  }

  public function get($item)
  {
    return $this->{$item};
  }

  public function set($item, $value)
  {
    if ($item == 'quantity' && !in_array($value, $this->quantityAcceptableValues)) {
      throw new Exception("Invalid quantity", 1);
    }

    $this->{$item} = $value;
  }

  private function generateArr($quantity = null)
  {
    $numbers = range(1, 60); # possibilites
    shuffle($numbers);
    $randoms = array_slice($numbers, 0, $quantity ?? $this->quantity);
    sort($randoms); # order
    return $randoms;
  }

  public function generateGames()
  {
    $count = 1;
    $games = [];

    while ($count <= $this->get('totalGames')) {
      $games[] = $this->generateArr();
      $count++;
    }
    $this->set('games', $games);
  }

  public function randomSix()
  {
    $this->set('result', $this->generateArr(6));
  }

  public function result()
  {
    $html = implode(', ', $this->result);
    return $html;
  }

  private function countHits($game)
  {
    ##
    $hits = 0;
    foreach ($game as $item) {
      if (in_array($item, $this->result)) $hits++;
    }
    return $hits;
  }

  public function renderResult()
  {
    $this->randomSix();
    $this->generateGames();
    $tbody = '';
    foreach ($this->games as $key) {
      $tbody .= "<tr>
      <td>{$this->quantity}</td>
      <td>" . implode(', ', $key) . "</td>
      <td>{$this->countHits($key)}</td>
      </tr>";
    }
    return $tbody;
  }
}

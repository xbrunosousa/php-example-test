<?php
require('./functions.php');
$app = new MonetizzeTest\Application(6, 10);
$app->generateGames();
// $app->generateGames();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Monetizze</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>jogos</th>
          <th>dezenas</th>
          <th>acertos</th>
        </tr>
      </thead>
      <tbody>
        <?= $app->renderResult() ?>
        <div class="alert alert-primary" style="margin-top: 50px;" role="alert">
          <p>Resultado: <?= $app->result() ?></p>
        </div>
      </tbody>
    </table>
  </div>
</body>

</html>
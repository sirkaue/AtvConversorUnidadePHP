<?php

require_once(__DIR__ . '/../services/unidadeService.php');
require_once(__DIR__ . '/../controllers/unidadeController.php');

$unidadeService = new unidadeService();
$unidadeController = new UnidadeController($unidadeService);

$response = $unidadeController->processarConversaoDeUnidade();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Conversor de Unidades</title>
</head>

<body>

  <h1>Conversor de Unidades</h1>

  <form action="conversor.php" method="post">

    <div class="form-group">
      <label for="valorDigitado">Digite a quantidade:</label>
      <input type="number" class="form-control" name="valorDigitado" placeholder="Insira um valor numérico">
    </div>

    <div class="form-group">
      <label for="unidadeEscolhida">De:</label>
      <select name="unidadeEscolhida" class="form-control">
        <option value="m">Metro(s)</option>
        <option value="km">Quilômetro(s)</option>
        <option value="cm">Centímetro(s)</option>
        <option value="mm">Milímetro(s)</option>
      </select>
    </div>

    <div class="form-group">
      <label for="unidadeParaConverter">Para:</label>
      <select name="unidadeParaConverter" class="form-control">
        <option value="m">Metro(s)</option>
        <option value="km">Quilômetro(s)</option>
        <option value="cm">Centímetro(s)</option>
        <option value="mm">Milímetro(s)</option>
      </select>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg btn-block">Converter</button>
    </div>
  </form>

  <div class="form-group">
    <label>Resultado:</label>
    <span><?php echo $response; ?></span>
  </div>
</body>

</html>
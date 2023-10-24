<?php

require_once(__DIR__ . '/../services/unidadeService.php');

class UnidadeController
{
  private $unidadeService;
  public function __construct(UnidadeService $unidadeService)
  {
    $this->unidadeService = $unidadeService;
  }

  public function processarConversaoDeUnidade()
  {
    $unidadeConvertida = null;
    $message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      try {
        $unidadeModel = new Unidade(
          $_POST['valorDigitado'], // 1000
          $_POST['unidadeEscolhida'], // m
          $_POST['unidadeParaConverter'] // km
        );

        // Obtém a unidade convertida (Ex.: m, km, cm, mm).
        $unidadeConvertida = $this->unidadeService->converterUnidade($unidadeModel);

        // Obtém o nome completo da unidade através do modelo.
        $nomeUnidade = $this->unidadeService->nomeUnidade(
          $unidadeModel->getUnidadeParaConverter()
        );
      } catch (Exception $e) {
        throw new Exception('Erro:' . $e->getMessage());
      }
      $message = $unidadeModel->getValorDigitado() .
        $unidadeModel->getUnidadeEscolhida() .
        " convertido em $nomeUnidade é/são " . $unidadeConvertida .
        $unidadeModel->getUnidadeParaConverter() . ".";
    }
    return $message;
  }
}

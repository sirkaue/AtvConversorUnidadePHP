<?php

require_once(__DIR__ . '/../models/unidade.php');

class UnidadeService
{
  public function __construct()
  {
  }

  public function converterUnidade(Unidade $unidadeModel)
  {
    $valorDigitado = $unidadeModel->getValorDigitado();
    $unidadeEscolhida = $unidadeModel->getUnidadeEscolhida();
    $unidadeParaConverter = $unidadeModel->getUnidadeParaConverter();

    $unidadeConvertida = null;

    if ($valorDigitado && $unidadeEscolhida === $unidadeParaConverter) {
      // Conversão da unidade para mesma unidade de origem.
      $unidadeConvertida = $valorDigitado;
    } elseif ($valorDigitado && $unidadeEscolhida === 'm') {
      if ($unidadeParaConverter === 'km') {
        $unidadeConvertida = $valorDigitado / 1000; // Metros para Quilômetros
      } elseif ($unidadeParaConverter === 'cm') {
        $unidadeConvertida = $valorDigitado * 100; // Metros para Centímetros
      } elseif ($unidadeParaConverter === 'mm') {
        $unidadeConvertida = $valorDigitado * 1000; // Metros para Milímetros
      }
    } elseif ($valorDigitado && $unidadeEscolhida === 'km') {
      if ($unidadeParaConverter === 'm') {
        $unidadeConvertida = $valorDigitado * 1000; // Quilômetros para Metros
      } elseif ($unidadeParaConverter === 'cm') {
        $unidadeConvertida = $valorDigitado * 100000; // Quilômetros para Centímetros
      } elseif ($unidadeParaConverter === 'mm') {
        $unidadeConvertida = $valorDigitado * 1000000; // Quilômetros para Milímetros
      }
    } elseif ($valorDigitado && $unidadeEscolhida === 'cm') {
      if ($unidadeParaConverter === 'm') {
        $unidadeConvertida = $valorDigitado / 100; // Centímetros para Metros
      } elseif ($unidadeParaConverter === 'km') {
        $unidadeConvertida = $valorDigitado / 100000; // Centímetros para Quilômetros
      } elseif ($unidadeParaConverter === 'mm') {
        $unidadeConvertida = $valorDigitado * 10; // Centímetros para Milímetros
      }
    } elseif ($valorDigitado && $unidadeEscolhida === 'mm') {
      if ($unidadeParaConverter === 'm') {
        $unidadeConvertida = $valorDigitado / 1000; // Milímetros para Metros
      } elseif ($unidadeParaConverter === 'km') {
        $unidadeConvertida = $valorDigitado / 1000000; // Milímetros para Quilômetros
      } elseif ($unidadeParaConverter === 'cm') {
        $unidadeConvertida = $valorDigitado / 10; // Milímetros para Centímetros
      }
    }

    return $unidadeConvertida;
  }

  public function nomeUnidade($siglaUnidade)
  {
    $unidadesNomes = [
      'm' => 'metro(s)',
      'km' => 'quilômetro(s)',
      'cm' => 'centímetro(s)',
      'mm' => 'milímetro(s)'
    ];

    if (isset($unidadesNomes[$siglaUnidade])) {
      return $unidadesNomes[$siglaUnidade];
    } else {
      return 'Unidade Desconhecida';
    }
  }
}

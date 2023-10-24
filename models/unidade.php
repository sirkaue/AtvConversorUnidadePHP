<?php

class Unidade
{

  private $valorDigitado;
  private $unidadeEscolhida;
  private $unidadeParaConverter;

  public function __construct(
    $valorDigitado,
    $unidadeEscolhida,
    $unidadeParaConverter
  ) {
    $this->valorDigitado = $valorDigitado;
    $this->unidadeEscolhida = $unidadeEscolhida;
    $this->unidadeParaConverter = $unidadeParaConverter;
  }

  public function getValorDigitado()
  {
    return $this->valorDigitado;
  }
  public function getUnidadeEscolhida()
  {
    return $this->unidadeEscolhida;
  }

  public function getUnidadeParaConverter()
  {
    return $this->unidadeParaConverter;
  }
}

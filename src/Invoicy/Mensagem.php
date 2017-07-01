<?php

namespace Invoicy;


class Mensagem
{

    /**
     * @var Retorno\InvoiCyRetornoMensagemItem $MensagemItem
     */
    protected $MensagemItem = null;

    /**
     * @param Retorno\InvoiCyRetornoMensagemItem $MensagemItem
     */
    public function __construct($MensagemItem)
    {
      $this->MensagemItem = $MensagemItem;
    }

    /**
     * @return Retorno\InvoiCyRetornoMensagemItem
     */
    public function getMensagemItem()
    {
      return $this->MensagemItem;
    }

    /**
     * @param Retorno\InvoiCyRetornoMensagemItem $MensagemItem
     * @return Mensagem
     */
    public function setMensagemItem($MensagemItem)
    {
      $this->MensagemItem = $MensagemItem;
      return $this;
    }
}
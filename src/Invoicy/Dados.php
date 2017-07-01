<?php

namespace Invoicy;


class Dados
{

    /**
     * @var Recepcao\InvoiCyRecepcaoDadosItem $DadosItem
     */
    protected $DadosItem = null;

    /**
     * @param Recepcao\InvoiCyRecepcaoDadosItem $DadosItem
     */
    public function __construct($DadosItem)
    {
      $this->DadosItem = $DadosItem;
    }

    /**
     * @return Recepcao\InvoiCyRecepcaoDadosItem
     */
    public function getDadosItem()
    {
      return $this->DadosItem;
    }

    /**
     * @param Recepcao\InvoiCyRecepcaoDadosItem $DadosItem
     * @return Dados
     */
    public function setDadosItem($DadosItem)
    {
      $this->DadosItem = $DadosItem;
      return $this;
    }
}
<?php

namespace Invoicy;


class Documentos
{

    /**
     * @var Retorno\InvoiCyRetornoMensagemItemDocumentosItem $DocumentosItem
     */
    protected $DocumentosItem = null;

    /**
     * @param Retorno\InvoiCyRetornoMensagemItemDocumentosItem $DocumentosItem
     */
    public function __construct($DocumentosItem)
    {
      $this->DocumentosItem = $DocumentosItem;
    }

    /**
     * @return Retorno\InvoiCyRetornoMensagemItemDocumentosItem
     */
    public function getDocumentosItem()
    {
      return $this->DocumentosItem;
    }

    /**
     * @param Retorno\InvoiCyRetornoMensagemItemDocumentosItem $DocumentosItem
     * @return Documentos
     */
    public function setDocumentosItem($DocumentosItem)
    {
      $this->DocumentosItem = $DocumentosItem;
      return $this;
    }
}
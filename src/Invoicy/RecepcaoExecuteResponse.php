<?php

namespace InvoiCy;


class RecepcaoExecuteResponse
{

    /**
     * @var Retorno\Invoicyretorno $Invoicyretorno
     */
    protected $Invoicyretorno = null;

    /**
     * @param Retorno\Invoicyretorno $Invoicyretorno
     */
    public function __construct($Invoicyretorno)
    {
      $this->Invoicyretorno = $Invoicyretorno;
    }

    /**
     * @return Retorno\Invoicyretorno
     */
    public function getInvoicyretorno()
    {
      return $this->Invoicyretorno;
    }

    /**
     * @param Retorno\Invoicyretorno $Invoicyretorno
     * @return recepcaoExecuteResponse
     */
    public function setInvoicyretorno($Invoicyretorno)
    {
      $this->Invoicyretorno = $Invoicyretorno;
      return $this;
    }
}
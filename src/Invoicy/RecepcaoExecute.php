<?php

namespace Invoicy;


class RecepcaoExecute
{

    /**
     * @var InvoiCy $Invoicyrecepcao
     */
    protected $Invoicyrecepcao = null;

    /**
     * @param InvoiCy $Invoicyrecepcao
     */
    public function __construct(InvoiCy $Invoicyrecepcao)
    {
      $this->Invoicyrecepcao = $Invoicyrecepcao;
    }

    /**
     * @return InvoiCy
     */
    public function getInvoicyrecepcao()
    {
      return $this->Invoicyrecepcao;
    }

    /**
     * @param InvoiCy $Invoicyrecepcao
     * @return RecepcaoExecute
     */
    public function setInvoicyrecepcao($Invoicyrecepcao)
    {
      $this->Invoicyrecepcao = $Invoicyrecepcao;
      return $this;
    }
}
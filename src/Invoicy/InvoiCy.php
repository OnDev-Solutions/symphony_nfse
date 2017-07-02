<?php

namespace Invoicy;


use Invoicy\Recepcao\InvoiCyRecepcaoCabecalho;
use Invoicy\Recepcao\InvoiCyRecepcaoInformacoes;

class InvoiCy
{

    /**
     * @var Recepcao\InvoiCyRecepcaoCabecalho $Cabecalho
     */
    protected $Cabecalho = null;

    /**
     * @var Recepcao\InvoiCyRecepcaoInformacoes $Informacoes
     */
    protected $Informacoes = null;

    /**
     * @var Dados $Dados
     */
    protected $Dados = null;

    /**
     * @param Recepcao\InvoiCyRecepcaoCabecalho $Cabecalho
     * @param Recepcao\InvoiCyRecepcaoInformacoes $Informacoes
     * @param Dados $Dados
     */
    public function __construct(InvoiCyRecepcaoCabecalho $Cabecalho, InvoiCyRecepcaoInformacoes $Informacoes, Dados $Dados)
    {
      $this->Cabecalho = $Cabecalho;
      $this->Informacoes = $Informacoes;
      $this->Dados = $Dados;
    }

    /**
     * @return Recepcao\InvoiCyRecepcaoCabecalho
     */
    public function getCabecalho()
    {
      return $this->Cabecalho;
    }

    /**
     * @param Recepcao\InvoiCyRecepcaoCabecalho $Cabecalho
     * @return InvoiCy
     */
    public function setCabecalho($Cabecalho)
    {
      $this->Cabecalho = $Cabecalho;
      return $this;
    }

    /**
     * @return Recepcao\InvoiCyRecepcaoInformacoes
     */
    public function getInformacoes()
    {
      return $this->Informacoes;
    }

    /**
     * @param Recepcao\InvoiCyRecepcaoInformacoes $Informacoes
     * @return InvoiCy
     */
    public function setInformacoes($Informacoes)
    {
      $this->Informacoes = $Informacoes;
      return $this;
    }

    /**
     * @return Dados
     */
    public function getDados()
    {
      return $this->Dados;
    }

    /**
     * @param Dados $Dados
     * @return InvoiCy
     */
    public function setDados($Dados)
    {
      $this->Dados = $Dados;
      return $this;
    }
}
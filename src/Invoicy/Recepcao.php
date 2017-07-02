<?php

namespace Invoicy;


class Recepcao extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array(
        'InvoiCy' => '\\Invoicy\\InvoiCy',
        'Dados' => '\\Invoicy\\Dados',
        'InvoiCyRecepcaoCabecalho' => '\\Invoicy\\Recepcao\\InvoiCyRecepcaoCabecalho',
        'InvoiCyRecepcaoInformacoes' => '\\Invoicy\\Recepcao\\InvoiCyRecepcaoInformacoes',
        'ArrayOfInvoiCyRecepcaoDadosItem' => '\\Invoicy\\Recepcao\\ArrayOfInvoiCyRecepcaoDadosItem',
        'InvoiCyRecepcaoDadosItem' => '\\Invoicy\\Recepcao\\InvoiCyRecepcaoDadosItem',
        'InvoicyRetorno' => '\\Invoicy\\Retorno\\InvoicyRetorno',
        'Mensagem' => '\\Invoicy\\Mensagem',
        'ArrayOfInvoiCyRetornoMensagemItem' => '\\Invoicy\\Retorno\\ArrayOfInvoiCyRetornoMensagemItem',
        'InvoiCyRetornoMensagemItem' => '\\Invoicy\\Retorno\\InvoiCyRetornoMensagemItem',
        'Documentos' => '\\Invoicy\\Documentos',
        'ArrayOfInvoiCyRetornoMensagemItemDocumentosItem' => '\\Invoicy\\Retorno\\ArrayOfInvoiCyRetornoMensagemItemDocumentosItem',
        'InvoiCyRetornoMensagemItemDocumentosItem' => '\\Invoicy\\Retorno\\InvoiCyRetornoMensagemItemDocumentosItem',
        'RecepcaoExecute' => '\\Invoicy\\RecepcaoExecute',
        'RecepcaoExecuteResponse' => '\\Invoicy\\RecepcaoExecuteResponse',
    );

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = null)
    {
        foreach (self::$classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = $value;
            }
        }
        $options = array_merge(array(
            'features' => 1,
        ), $options);
        if (!$wsdl) {
            $wsdl = 'https://homolog.invoicy.com.br/arecepcao.aspx?wsdl';
        }
        parent::__construct($wsdl, $options);
    }

    /**
     * @param RecepcaoExecute $parameters
     * @return RecepcaoExecuteResponse
     */
    public function Execute(RecepcaoExecute $parameters)
    {
        return $this->__soapCall('Execute', array($parameters));
    }
}
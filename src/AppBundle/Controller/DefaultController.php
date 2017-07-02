<?php

namespace AppBundle\Controller;

use Invoicy\Dados;
use Invoicy\InvoiCy;
use Invoicy\Recepcao;
use Invoicy\Recepcao\InvoiCyRecepcaoCabecalho;
use Invoicy\Recepcao\InvoiCyRecepcaoDadosItem;
use Invoicy\Recepcao\InvoiCyRecepcaoInformacoes;
use Invoicy\RecepcaoExecute;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $response = $this->generateSchema();

        return $this->json($response);
    }

    private function generateSchema()
    {
        // Chave de acesso da empresa
        $chaveAcesso = 'eKda2fcZg9ZMt3DrfF/KSIVoH59Ca6nN';
        $chaveParceiro = 'Xhq+Kb5uGKlbrhSCuzFbYQ==';

        $chaveComunicacao = md5($chaveAcesso . $this->getFakeXml());

        $cabecalho = new InvoiCyRecepcaoCabecalho($chaveParceiro, $chaveComunicacao, "");
        $informacoes = new InvoiCyRecepcaoInformacoes();
        $dados = new InvoiCyRecepcaoDadosItem($this->getFakeXml(), "");
        $itens = new Dados($dados);

        $invoicy = new InvoiCy($cabecalho, $informacoes, $itens);
        $execute = new RecepcaoExecute($invoicy);

        $recepcao = new Recepcao([]);

        $response = $recepcao->Execute($execute);

        //var_dump($response);
        return $response;
    }

    private function getFakeXml()
    {
        $nfse = '<Envio>
	<ModeloDocumento>aaaaaaaaaa</ModeloDocumento>
	<Versao>12.12</Versao>
	<RPS>
		<RPSNumero>123456789123456</RPSNumero>
		<RPSSerie>aaaaa</RPSSerie>
		<RPSTipo>1</RPSTipo>
		<dEmis>2001-12-17T09:30:47Z</dEmis>
		<dCompetencia>1967-08-13</dCompetencia>
		<LocalPrestServ>5</LocalPrestServ>
		<natOp>1234</natOp>
		<Operacao>aa</Operacao>
		<NumProcesso>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</NumProcesso>
		<RegEspTrib>1</RegEspTrib>
		<OptSN>1</OptSN>
		<IncCult>0</IncCult>
		<Status>1</Status>
		<cVerificaRPS>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</cVerificaRPS>
		<EmpreitadaGlobal>1</EmpreitadaGlobal>
		<tpAmb>1</tpAmb>
		<RPSSubs>
			<SubsNumero>123456789123456</SubsNumero>
			<SubsSerie>aaaaa</SubsSerie>
			<SubsTipo>1</SubsTipo>
			<SubsNFSeNumero>123456789123456</SubsNFSeNumero>
			<SubsDEmisNFSe>2001-12-17T09:30:47Z</SubsDEmisNFSe>
		</RPSSubs>
		<Prestador>
			<CNPJ_prest>aaaaaaaaaaaaaa</CNPJ_prest>
			<CPF_prest>aaaaaaaaaaa</CPF_prest>
			<xNome>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</xNome>
			<xFant>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</xFant>
			<IM>aaaaaaaaaaaaaaa</IM>
			<IE>aaaaaaaaaaaaaa</IE>
			<CMC>123456789123456</CMC>
			<enderPrest>
				<TPEnd>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</TPEnd>
				<xLgr>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</xLgr>
				<nro>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</nro>
				<xCpl>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</xCpl>
				<xBairro>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</xBairro>
				<cMun>1234567</cMun>
				<UF>aa</UF>
				<CEP>12345678</CEP>
				<fone>12345678912345</fone>
				<Email>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</Email>
			</enderPrest>
		</Prestador>
		<ListaItens>
			<Item>
				<ItemSeq>1234</ItemSeq>
				<ItemCod>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</ItemCod>
				<ItemDesc>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</ItemDesc>
				<ItemQtde>1234567891234.12</ItemQtde>
				<ItemvUnit>1234567891234.12</ItemvUnit>
				<ItemuMed>aaaaaaaaaa</ItemuMed>
				<ItemvlDed>1234567891234.12</ItemvlDed>
				<ItemTributavel>aa</ItemTributavel>
				<ItemcCnae>1234567</ItemcCnae>
				<ItemTributMunicipio>aaaaaaaaaaaaaaaaaaaa</ItemTributMunicipio>
				<ItemnAlvara>aaaaaaaaaaaaaaa</ItemnAlvara>
				<ItemvIss>12345678912345.12</ItemvIss>
				<ItemvDesconto>12345678912345.12</ItemvDesconto>
				<ItemAliquota>12.1234</ItemAliquota>
				<ItemVlrTotal>12345678912.1234</ItemVlrTotal>
				<ItemBaseCalculo>12345678912345.12</ItemBaseCalculo>
				<ItemvlrISSRetido>12345678912345.12</ItemvlrISSRetido>
				<ItemIssRetido>1</ItemIssRetido>
				<ItemRespRetencao>1</ItemRespRetencao>
				<ItemIteListServico>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</ItemIteListServico>
				<ItemExigibilidadeISS>12</ItemExigibilidadeISS>
				<ItemcMunIncidencia>1234567</ItemcMunIncidencia>
				<ItemNumProcesso>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</ItemNumProcesso>
				<ItemDedTipo>a</ItemDedTipo>
				<ItemDedCPFRef>aaaaaaaaaaa</ItemDedCPFRef>
				<ItemDedCNPJRef>aaaaaaaaaaaaaa</ItemDedCNPJRef>
				<ItemDedNFRef>123456789123456</ItemDedNFRef>
				<ItemDedvlTotRef>12345678912345.12</ItemDedvlTotRef>
				<ItemDedPer>12345678912345.12</ItemDedPer>
				<ItemVlrLiquido>12345678912345.12</ItemVlrLiquido>
				<ItemValAliqINSS>12.1234</ItemValAliqINSS>
				<ItemValINSS>12345678912345.12</ItemValINSS>
				<ItemValAliqIR>12.1234</ItemValAliqIR>
				<ItemValIR>12345678912345.12</ItemValIR>
				<ItemValAliqCOFINS>12.1234</ItemValAliqCOFINS>
				<ItemValCOFINS>12345678912345.12</ItemValCOFINS>
				<ItemValAliqCSLL>12.1234</ItemValAliqCSLL>
				<ItemValCSLL>12345678912345.12</ItemValCSLL>
				<ItemValAliqPIS>12.1234</ItemValAliqPIS>
				<ItemValPIS>12345678912345.12</ItemValPIS>
				<ItemRedBCRetido>12345678912345.12</ItemRedBCRetido>
				<ItemBCRetido>12345678912345.12</ItemBCRetido>
				<ItemPaisImpDevido>BR</ItemPaisImpDevido>
				<ItemValAliqISSRetido>12345678912345.12</ItemValAliqISSRetido>
				<ItemJustDed>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</ItemJustDed>
			</Item>
		</ListaItens>
		<ListaParcelas>
			<Parcela>
				<PrcSequencial>12345678</PrcSequencial>
				<PrcValor>12345678912345.12</PrcValor>
				<PrcDtaVencimento>1967-08-13</PrcDtaVencimento>
				<PrcNroFatura>123456789123456</PrcNroFatura>
				<PrcTipVenc>1</PrcTipVenc>
				<PrcDscTipVenc>aaaaaaaaaaaaaaa</PrcDscTipVenc>
			</Parcela>
		</ListaParcelas>
		<Servico>
			<Valores>
				<ValServicos>12345678912345.12</ValServicos>
				<ValDeducoes>12345678912345.12</ValDeducoes>
				<ValPIS>12345678912345.12</ValPIS>
				<ValCOFINS>12345678912345.12</ValCOFINS>
				<ValINSS>12345678912345.12</ValINSS>
				<ValIR>12345678912345.12</ValIR>
				<ValCSLL>12345678912345.12</ValCSLL>
				<ISSRetido>0</ISSRetido>
				<RespRetencao>1</RespRetencao>
				<Tributavel>aa</Tributavel>
				<ValISS>12345678912345.12</ValISS>
				<ValISSRetido>12345678912345.12</ValISSRetido>
				<ValOutrasRetencoes>12345678912345.12</ValOutrasRetencoes>
				<ValBaseCalculo>12345678912345.12</ValBaseCalculo>
				<ValAliqISS>12.1234</ValAliqISS>
				<ValAliqPIS>12.1234</ValAliqPIS>
				<ValAliqCOFINS>12.1234</ValAliqCOFINS>
				<ValAliqIR>12.1234</ValAliqIR>
				<ValAliqCSLL>12.1234</ValAliqCSLL>
				<ValAliqINSS>12.1234</ValAliqINSS>
				<ValLiquido>12345678912345.12</ValLiquido>
				<ValDescIncond>12345678912345.12</ValDescIncond>
				<ValDescCond>12345678912345.12</ValDescCond>
				<ValAliqISSoMunic>12.1234</ValAliqISSoMunic>
				<InfValPIS>12345678912345.12</InfValPIS>
				<InfValCOFINS>12345678912345.12</InfValCOFINS>
				<ValLiqFatura>12345678912345.12</ValLiqFatura>
				<ValBCISSRetido>12345678912345.12</ValBCISSRetido>
				<NroFatura>123456789123456</NroFatura>
				<CargaTribValor>12345678912345.12</CargaTribValor>
				<CargaTribPercentual>1234.1234</CargaTribPercentual>
				<CargaTribFonte>aaaaaaaaaa</CargaTribFonte>
				<JustDed>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</JustDed>
			</Valores>
			<LocalPrestacao>
				<SerEndTpLgr>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</SerEndTpLgr>
				<SerEndLgr>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</SerEndLgr>
				<SerEndNumero>aaaaaaaaaa</SerEndNumero>
				<SerEndComplemento>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</SerEndComplemento>
				<SerEndBairro>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</SerEndBairro>
				<SerEndxMun>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</SerEndxMun>
				<SerEndcMun>1234567</SerEndcMun>
				<SerEndCep>12345678</SerEndCep>
				<SerEndSiglaUF>aa</SerEndSiglaUF>
			</LocalPrestacao>
			<IteListServico>aaaaaaaaaaaaaaa</IteListServico>
			<Cnae>1234567</Cnae>
			<fPagamento>aa</fPagamento>
			<TributMunicipio>aaaaaaaaaaaaaaaaaaaa</TributMunicipio>
			<TributMunicDesc>aaaaaaaaaaaaaaaaaaaa</TributMunicDesc>
			<Discriminacao>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</Discriminacao>
			<cMun>1234567</cMun>
			<SerQuantidade>12345678912345.12</SerQuantidade>
			<SerUnidade>aaaaaaaaaa</SerUnidade>
			<SerNumAlva>aaaaaaaaaaaaaaa</SerNumAlva>
			<PaiPreServico>aa</PaiPreServico>
			<cMunIncidencia>1234567</cMunIncidencia>
			<dVencimento>1967-08-13</dVencimento>
			<ObsInsPagamento>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</ObsInsPagamento>
			<ObrigoMunic>12</ObrigoMunic>
			<TributacaoISS>12</TributacaoISS>
			<CodigoAtividadeEconomica>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</CodigoAtividadeEconomica>
			<ServicoViasPublicas>1234</ServicoViasPublicas>
			<NumeroParcelas>2</NumeroParcelas>
			<NroOrcamento>12</NroOrcamento>
		</Servico>
		<Tomador>
			<TomaCNPJ>aaaaaaaaaaaaaa</TomaCNPJ>
			<TomaCPF>aaaaaaaaaaa</TomaCPF>
			<TomaIM>aaaaaaaaaaaaaaa</TomaIM>
			<TomaRazaoSocial>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</TomaRazaoSocial>
			<TomatpLgr>aaaaaaaaaa</TomatpLgr>
			<TomaEndereco>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</TomaEndereco>
			<TomaNumero>aaaaaaaaaa</TomaNumero>
			<TomaComplemento>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</TomaComplemento>
			<TomaBairro>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</TomaBairro>
			<TomacMun>1234567</TomacMun>
			<TomaxMun>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</TomaxMun>
			<TomaUF>aa</TomaUF>
			<TomaPais>aa</TomaPais>
			<TomaCEP>aaaaaaaaaa</TomaCEP>
			<TomaTelefone>aaaaaaaaaaa</TomaTelefone>
			<TomaTipoTelefone>aa</TomaTipoTelefone>
			<TomaEmail>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</TomaEmail>
			<TomaSite>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</TomaSite>
			<TomaIE>aaaaaaaaaaaaaaa</TomaIE>
			<TomaIME>aaaaaaaaaaaaaaa</TomaIME>
			<TomaSituacaoEspecial>a</TomaSituacaoEspecial>
			<DocTomadorEstrangeiro>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</DocTomadorEstrangeiro>
		</Tomador>
		<IntermServico>
			<IntermRazaoSocial>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</IntermRazaoSocial>
			<IntermCNPJ>aaaaaaaaaaaaaa</IntermCNPJ>
			<IntermCPF>aaaaaaaaaaa</IntermCPF>
			<IntermIM>aaaaaaaaaaaaaaa</IntermIM>
			<IntermEmail>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</IntermEmail>
			<IntermEndereco>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</IntermEndereco>
			<IntermNumero>aaaaaaaaaa</IntermNumero>
			<IntermComplemento>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</IntermComplemento>
			<IntermBairro>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</IntermBairro>
			<IntermCep>aaaaaaaaaa</IntermCep>
			<IntermCmun>1234567</IntermCmun>
			<IntermXmun>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</IntermXmun>
			<IntermFone>aaaaaaaaaaa</IntermFone>
			<ItermIE>aaaaaaaaaaaaaaa</ItermIE>
		</IntermServico>
		<ConstCivil>
			<CodObra>aaaaaaaaaaaaaaa</CodObra>
			<Art>aaaaaaaaaaaaaaa</Art>
			<ObraLog>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</ObraLog>
			<ObraCompl>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</ObraCompl>
			<ObraNumero>aaaaaaaaaa</ObraNumero>
			<ObraBairro>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</ObraBairro>
			<ObraCEP>12345678</ObraCEP>
			<ObraMun>1234567</ObraMun>
			<ObraUF>aa</ObraUF>
			<ObraPais>aa</ObraPais>
			<ObraCEI>aaaaaaaaaaaaaaa</ObraCEI>
			<ObraMatricula>aaaaaaaaaaaaaaa</ObraMatricula>
			<ObraValRedBC>12345678912345.12</ObraValRedBC>
			<ObraTipo>1</ObraTipo>
			<ListaMaterial>
				<Material>
					<MatCodigo>aaaaaaaaaaaaaaaaaaaa</MatCodigo>
					<MatDescricao>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</MatDescricao>
					<MatUndMedCodigo>aaaaaaaaaaaaaaaaaaaa</MatUndMedCodigo>
					<MatUndMedSigla>aaaaaaa</MatUndMedSigla>
					<MatQuantidade>1234</MatQuantidade>
					<MatVlrTotal>12345678912345.12</MatVlrTotal>
				</Material>
			</ListaMaterial>
		</ConstCivil>
		<ListaDed>
			<Ded>
				<DedSeq>123456789123456789</DedSeq>
				<DedValPer>aaa</DedValPer>
				<DedTipo>aaa</DedTipo>
				<DedCNPJRef>aaaaaaaaaaaaaa</DedCNPJRef>
				<DedCPFRef>aaaaaaaaaaa</DedCPFRef>
				<DednNFRef>1234567891</DednNFRef>
				<DedvlTotRef>12345678912345.12</DedvlTotRef>
				<DedPer>12345678912345.12</DedPer>
				<DedValor>12345678912345.12</DedValor>
				<DedQtde>12345678912345.12</DedQtde>
				<DedValUnit>12345678912345.12</DedValUnit>
				<DedDescricao>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</DedDescricao>
			</Ded>
		</ListaDed>
		<Transportadora>
			<TraNome>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</TraNome>
			<TraCPFCNPJ>aaaaaaaaaaaaaa</TraCPFCNPJ>
			<TraIE>aaaaaaaaaaaaaaa</TraIE>
			<TraPlaca>aaaaaaaaaa</TraPlaca>
			<TraEnd>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</TraEnd>
			<TraMun>1234567</TraMun>
			<TraUF>aa</TraUF>
			<TraPais>aa</TraPais>
			<TraTipoFrete>1</TraTipoFrete>
		</Transportadora>
		<NFSOutrasinformacoes>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</NFSOutrasinformacoes>
		<RPSCanhoto>0</RPSCanhoto>
		<Arquivo>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</Arquivo>
		<ExtensaoArquivo>aaaaa</ExtensaoArquivo>
	</RPS>
</Envio>
';
        // Lineariza o XML.
        return preg_replace('/>\s+</', '><', $nfse);
    }
}

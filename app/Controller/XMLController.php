<?php 

namespace ImportarXML\Controller;

use Psr\Container\ContainerInterface;

use \ImportarXML\Model\NotaFiscal;
use \ImportarXML\PageSite;

use Datetime;

class XMLController
{

	public function index($request, $response)
	{

		$notas = NotaFiscal::all();

		$page = new PageSite();
		$page->setTpl("index", [
			'notas' => $notas
		]);
	}

	public function enviar_nota_fiscal($request, $response)
	{
		$dados_nota = $this->validar_xml($_FILES['fileUpload']);

		$xml = simplexml_load_file($_FILES['fileUpload']["tmp_name"]);

		$nota_fiscal = new NotaFiscal();
		$nota_fiscal->ide_n_nf = $xml->NFe->infNFe->ide->nNF;
		$nota_fiscal->ide_dh_emi = $xml->NFe->infNFe->ide->dhEmi;
		$nota_fiscal->dest_cnpj = $xml->NFe->infNFe->dest->CNPJ;
		$nota_fiscal->dest_cpf = $xml->NFe->infNFe->dest->CPF;
		$nota_fiscal->dest_x_nome = $xml->NFe->infNFe->dest->xNome;
		$nota_fiscal->dest_ender_dest_xlgr = $xml->NFe->infNFe->dest->enderDest->xLgr;
		$nota_fiscal->dest_ender_dest_nro = $xml->NFe->infNFe->dest->enderDest->nro;
		$nota_fiscal->dest_ender_dest_x_bairro = $xml->NFe->infNFe->dest->enderDest->xBairro;
		$nota_fiscal->dest_ender_dest_c_mun = $xml->NFe->infNFe->dest->enderDest->cMun;
		$nota_fiscal->dest_ender_dest_x_mun = $xml->NFe->infNFe->dest->enderDest->xMun;
		$nota_fiscal->dest_ender_dest_uf = $xml->NFe->infNFe->dest->enderDest->UF;
		$nota_fiscal->dest_ender_dest_cep = $xml->NFe->infNFe->dest->enderDest->CEP;
		$nota_fiscal->dest_ender_dest_c_pais = $xml->NFe->infNFe->dest->enderDest->cPais;
		$nota_fiscal->dest_ind_i_e_dest = $xml->NFe->infNFe->dest->indIEDest;
		$nota_fiscal->dest_email = $xml->NFe->infNFe->dest->email;
		$nota_fiscal->v_pag = $xml->NFe->infNFe->pag->detPag->vPag;

        if($nota_fiscal->save()) {
	        echo json_encode ([
	            'sucesso' => true,
	            'msg' => 'Nota fiscal importada com sucesso!'
	        ]);
	    } else {
	    	echo json_encode ([
	            'sucesso' => false,
	            'msg' => 'Erro ao importar nota fiscal. Entre em contato com o suporte.'
	        ]);
	    }
	}

	function ver_nota_fiscal($request, $response, $args) {

		$nf = new NotaFiscal();
        $nf->get((int)$args['id']);
        $nf->setide_dh_emi(date_format(new DateTime($nf->getValues()['ide_dh_emi']), 'd/m/Y H:i'));
        $nf->setv_pag('R$ '. number_format($nf->getValues()['v_pag'] ,2,",","."));
		
		$page = new PageSite();
		$page->setTpl("nota_fiscal", [
			'nf' => $nf->getValues()
		]);
	}



	function validar_xml($fileNota) {
	
		$fileName  = $fileNota['name'];
		$fileType  = $fileNota['type'];
		$fileError = $fileNota['error'];
		$fileSize  = $fileNota['size'];
		$fileTmp   = $fileNota['tmp_name'];
		$xml       = null;

		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		if ($ext != "xml") {
		    echo json_encode(
				[
					'sucesso' => false,
					'msg' => 'Envie um arquivo no formato XML',
				]
			);
			exit;
		}

		if ($fileSize > 0 && $fileError == 0) {
			$xml = simplexml_load_file($fileTmp);

			// CNPJ do emitente
			$cnpj = $xml->NFe->infNFe->emit->CNPJ;

			// Encerra o processo se não for o CNPJ permitido: 09066241000884
			if ( $cnpj != '09066241000884' ) {
				echo json_encode(
					[
						'sucesso' => false,
						'msg' => 'CNPJ da nota não confere com o CNPJ da empresa!',
					]
				);
				exit;
			}

		} else {
			echo json_encode(
				[
					'status' => 'error',
					'message' => 'Selecione uma nota fiscal!'				
				]
			);
		}
		return $xml;
	}

}
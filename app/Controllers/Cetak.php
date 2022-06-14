<?php namespace App\Controllers;

// use App\Models\UserModel;
use App\Models\PersonalModel;
use App\Models\NilaiModel;
use App\Models\PendaftaranModel;
use TCPDF;


class Cetak extends BaseController
{

	public function pendaftaran($no)
	{
		$db=new PersonalModel;
		$data=$this->session->get();

		$no="'".$no."'";

		$query = $db->query('SELECT * FROM pendaftar
											JOIN nilai ON nilai.no_pendaftaran = pendaftar.no_pendaftaran
											JOIN pendaftaran ON pendaftaran.no_pendaftaran = nilai.no_pendaftaran
											WHERE pendaftar.no_pendaftaran='.$no);

		if (is_array($query->getRow()) || is_object($query->getRow()))
		{
			foreach ($query->getRow() as $key => $value) {
				$data[$key]=$value;
			}
		}
		else {
			 echo "Data Tidak Ada";
		}

		$html=view('cetakpendaftaran',$data);

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->setCreator(PDF_CREATOR);
		$pdf->setAuthor('Endang Suhendar');
		$pdf->setTitle('Bukti Pendaftaran');
		$pdf->setSubject('PPDB SMKN 2 Pandeglang');
		// $pdf->setKeywords('TCPDF, PDF, example, test, guide');
		$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		// set default monospaced font
		$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		// set margins
		$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->setFooterMargin(PDF_MARGIN_FOOTER);
		// set auto page breaks
		$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}
		$pdf->setFont('dejavusans', '', 10);
		$pdf->AddPage();



		$pdf->writeHTML($html, true, false, true, false, '');
		$this->response->setContentType('application/pdf');
		$pdf->Output('ppdb'.$data['no_pendaftaran'].'.pdf', 'I');
	}


	public function kartu($no)
	{
		$db=new PersonalModel;
		$data=$this->session->get();

		$no="'".$no."'";

		$query = $db->query('SELECT * FROM pendaftar
											JOIN nilai ON nilai.no_pendaftaran = pendaftar.no_pendaftaran
											JOIN pendaftaran ON pendaftaran.no_pendaftaran = nilai.no_pendaftaran
											WHERE pendaftar.no_pendaftaran='.$no);

		if (is_array($query->getRow()) || is_object($query->getRow()))
		{
			foreach ($query->getRow() as $key => $value) {
				$data[$key]=$value;
			}
		}
		else {
			 echo "Data Tidak Ada";
		}

		$html=view('cetakkartu',$data);

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->setCreator(PDF_CREATOR);
		$pdf->setAuthor('Endang Suhendar');
		$pdf->setTitle('Bukti Pendaftaran');
		$pdf->setSubject('PPDB SMKN 2 Pandeglang');
		// $pdf->setKeywords('TCPDF, PDF, example, test, guide');
		$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		// set default monospaced font
		$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		// set margins
		$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->setFooterMargin(PDF_MARGIN_FOOTER);
		// set auto page breaks
		$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}
		$pdf->setFont('dejavusans', '', 10);
		$pdf->AddPage();


		$pdf->writeHTML($html, true, false, true, false, '');
		$this->response->setContentType('application/pdf');
		$pdf->Output('ppdb'.$data['no_pendaftaran'].'.pdf', 'I');
	}





}

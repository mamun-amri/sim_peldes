<?php
        $isi=' <h2>Tbl_pengajuan List</h2>
        <table width="100%" border="1">
            <tr>
                <th>No</th>
		 <th>Nama</th>
		 <th>Email</th>
		 <th>Nik</th>
		 <th>No Kk</th>
		 <th>Jenis Kelamin</th>
		 <th>Tempat Lahir</th>
		 <th>Tanggal Lahir</th>
		 <th>Status Menikah</th>
		 <th>Pekerjaan</th>
		 <th>Agama</th>
		 <th>No Telp</th>
		 <th>Negara</th>
		 <th>Alamat</th>
		 <th>Rt</th>
		 <th>Rw</th>
		 <th>Desa</th>
		 <th>Kec</th>
		 <th>Kab</th>
		 <th>Prov</th>
		 <th>Kd Post</th>
		 <th>Lampiran</th>
		 <th>Acc Rt</th>
		 <th>Acc Rw</th>
		 <th>Acc Kepdes</th>
		
            </tr>';
            foreach ($pengajuan_data as $pengajuan)
            {
                $isi .='<tr>
		      <td>'.++$start.'</td>
		      <td>'.$pengajuan->nama .'</td>
		      <td>'.$pengajuan->email .'</td>
		      <td>'.$pengajuan->nik .'</td>
		      <td>'.$pengajuan->no_kk .'</td>
		      <td>'.$pengajuan->jenis_kelamin .'</td>
		      <td>'.$pengajuan->tempat_lahir .'</td>
		      <td>'.$pengajuan->tanggal_lahir .'</td>
		      <td>'.$pengajuan->status_menikah .'</td>
		      <td>'.$pengajuan->pekerjaan .'</td>
		      <td>'.$pengajuan->agama .'</td>
		      <td>'.$pengajuan->no_telp .'</td>
		      <td>'.$pengajuan->negara .'</td>
		      <td>'.$pengajuan->alamat .'</td>
		      <td>'.$pengajuan->rt .'</td>
		      <td>'.$pengajuan->rw .'</td>
		      <td>'.$pengajuan->desa .'</td>
		      <td>'.$pengajuan->kec .'</td>
		      <td>'.$pengajuan->kab .'</td>
		      <td>'.$pengajuan->prov .'</td>
		      <td>'.$pengajuan->kd_post .'</td>
		      <td>'.$pengajuan->lampiran .'</td>
		      <td>'.$pengajuan->acc_rt .'</td>
		      <td>'.$pengajuan->acc_rw .'</td>
		      <td>'.$pengajuan->acc_kepdes .'</td>	
                </tr>';
            }
        $isi .='</table>';
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
		// Logo
        // $image_file = K_PATH_IMAGES.'logo.png';
        // $this->Image($image_file, 20, 20, 45, '', 'png', '', 'T', false, 280, '', false, false, 0, false, false, false);
        // Set font
        // $this->SetFont('helvetica', 'B', 20);
        // Title
       // $this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	   
	   // global $header1,$header2;
	   // $this->SetFont('helvetica','B',9);
	   // $this->writeHTML(($this->getPage()==2?$header1:''), true, false, true, false, '');
	   // $this->SetFont('helvetica','B',9);
	   // $this->writeHTML($header2, true, false, true, false, '');
	}

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        // $this->SetY(-5);
        // Set font
        // $this->SetFont('helvetica', 'I', 5);
        // Page number
        // $this->Cell(0, 10, ''.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
							}
						}

// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
// $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Cetak Tbl_pengajuan');
$pdf->SetSubject('TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_RIGHT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetMargins(PDF_MARGIN_RIGHT, 7, PDF_MARGIN_RIGHT);
// $pdf->SetMargins(5, PDF_MARGIN_TOP, 5);
// $pdf->SetMargins(5, 5, 5);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// $pdf->SetLeftMargin(14);
// $pdf->SetTopMargin(9);
// $pdf->SetFont($fontname, '', '9');
// $pdf->setPrintHeader(false);
// $pdf->SetFooterMargin(0);
// $pdf->setPrintFooter(false)


//set auto page breaks
// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->SetAutoPageBreak(TRUE, 5);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
// ();

// --------------------Blok Text-------------------------------//
// set font
$pdf->SetFont('times', '', 8);


    // courier : Courier
    // courierb : Courier Bold
    // courierbi : Courier Bold Italic
    // courieri : Courier Italic
    // helvetica : Helvetica
    // helveticab : Helvetica Bold
    // helveticabi : Helvetica Bold Italic
    // helveticai : Helvetica Italic
    // symbol : Symbol
    // times : Times New Roman
    // timesb : Times New Roman Bold
    // timesbi : Times New Roman Bold Italic
    // timesi : Times New Roman Italic
    // zapfdingbats : Zapf Dingbats

//============================block kode meminta scrip php hasil===========================================/
// add a page 1
// $desolution= array(180, 130);
// $pdf->AddPage('P', $\desolution);
$pdf->AddPage();
$pdf->writeHTML($isi, true, false, true, false, '');
// add a page 1
// $pdf->AddPage();
// $pdf->writeHTML($isi2, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Cetak Tbl_pengajuan.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+	
?>		
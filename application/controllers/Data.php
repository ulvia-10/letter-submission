<?php
class Data extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->model('M_surat');
    }
 
    public function pdf($id)
    {
        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
            $pdf->setPrintFooter(true);
            $pdf->setPrintHeader(true);
            $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
            $pdf->AddPage('');

            
            $judul = '
                   
            
            <div style="text-align:center;font-family: Times; font-size: 14px; font-weight: black;"> <br>LEMBAR DISPOSISI</div>
                     <hr style="border=0;border-top:1px dashed #8c8c8c";>
            ';
            $pdf->writeHTML($judul,true, true, true, true, '');
            // $pdf->Write(0, 'LEMBAR DISPOSISI ', '', 0, 'C', true, 0, false, false, 0);
            $pdf->SetFont('Times', '', 14);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Cabang Dinas Jombang ');
            $pdf->SetTitle('Cetak Disposisi');
            $pdf->SetSubject('TCPDF Tutorial');
            $pdf->SetKeywords('TCPDF, PDF, example, test, guide');


        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default header data
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    
            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }
    
            // ---------------------------------------------------------
    
            // set default font subsetting mode
            $pdf->setFontSubsetting(true);
       
            // header table

                 
            $key = array(

                'id_lapor'  => $id
            );

            $dataLapor = $this->M_surat->getsuratbyId($id);
            $row = $dataLapor;
            $pdf->setPrintHeader(true);

            $pdf->Ln(5);

            $pdf->SetFont('times', '', 12);
                
            // create columns content
            $left_column = 'Surat Dari        : '.$row['surat_dari'].''."\n" ."\n" .'Tanggal Surat  : '.date('d-m-Y',strtotime($row['tgl_surat'])).''."\n" ."\n" .'Nomor Surat    : '.$row['no_surat'].''."\n" ."\n" ."\n"."\n" ."\n" ;

            $right_column = 'Diterima Tanggal   : '.date('d-m-Y',strtotime($row['tgl_diterima'])).' '."\n"."\n" . 'Nomor Agenda      : '."\n" ."\n" . 'Sifat'."\n" ."\n" ."\n" ."\n"."\n" ;

            // set color for background
            $pdf->SetFillColor(255, 255, 255);

            // set color for text
            $pdf->SetTextColor(0, 0, 0);

            // write the first column
            $pdf->MultiCell(80, 0, $left_column, 1, 'L', 1, 0, '', '', true, 0, false, true, 0);

            // set color for background
            $pdf->SetFillColor(255, 255, 255);

            // set color for text
            $pdf->SetTextColor(0, 0, 0);

            // write the second column
            $pdf->MultiCell(80, 0, $right_column, 1, 'L', 1, 1, '', '', true, 0, false, true, 0);
            // Drink
        

            $tabel = '
                    
                    <br> <br>
                    Perihal  : '.$row['perihal'].' <br> 
                    <hr>
                    <div style="column-count: 5;">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.        
                    </div>
                    <br> <br>
                    
                    <div style="font-size: 14px; text-align:center; font-weight:bold; text-decoration:underline;  font-family: Times;"> ISI DISPOSISI </div> 
                    <div> '.$row['isi_disposisi'].' </div>
                    ';

            $pdf->writeHTML($tabel,true, true, true, true, '');
            $pdf->Output('Laporan Disposisi.pdf', 'I');
    }
 
}

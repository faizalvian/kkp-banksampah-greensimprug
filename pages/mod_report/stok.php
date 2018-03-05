<?php	
	ob_start();
	include('../../connection/connection.php');
	$notransaksi = $_GET['no_transaksi'];
	$today = date("d-m-Y");

	//$id = $_GET['id'];

	require ("../../html2pdf/html2pdf.class.php");
	$content = ob_get_clean();
	$sql = $db->prepare("SELECT * from tb_sampah");
	$sql->execute();
	$row = $sql->fetch(PDO::FETCH_ASSOC);
	$content = "<img src='../../images/kop.jpg' height='150' width='780'>
				<hr width='100%'>
				<p align='center'>
				<b style='font-size: 20'>Laporan Stok</b><br>
				</p>
				<p style='margin-left:150px;'>
				Tanggal : $today<br><br>
				<table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
					<tr bgcolor='#CCCCCC'>
						<th style='width: 20px;' align='center'>NO</th>
						<th style='width: 180px;' align='center'>Jenis Sampah</th>
						<th style='width: 180px;' align='center'>Stok</th>
					</tr>";
	$sql->execute();
	$i=1;
	while($row = $sql->fetch(PDO::FETCH_ASSOC))
		{
			$content.="<tr bgcolor='#FFFFFF'>
						<td align='center'>".$i."</td>
						<td style='text-transform:capitalize'>".$row['jenis_sampah']."</td>
						<td align='center'>".$row['stok']."</td>
					   </tr>";	
			$i++;		
		}							
    $content.="</table></p>";
	/*
	$sql2 = "SELECT id_pegawai, nm_pegawai from pegawai where id_pegawai = '$id'";
	$hasil = mysql_query($sql2);
	$row = mysql_fetch_array($hasil);
	$content.='	<p align="right" style="margin-left: 50px; margin-right: 50px; font: Tahoma; font-size: 16;">
					Tangerang,'.date("d-m-Y").'<br><br><br><br><br>
					<b style="text-transform: capitalize">'.$row["nm_pegawai"].'</b>
				</p>';
	*/
	ob_end_clean();
	// conversion HTML => PDF
	try
	{
		$html2pdf = new HTML2PDF('P', 'A4','fr', false, 'ISO-8859-15'); 
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content);
		$html2pdf->Output('kwitansijual.pdf');
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>
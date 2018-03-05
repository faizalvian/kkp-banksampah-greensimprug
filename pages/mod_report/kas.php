<?php	
	ob_start();
	include('../../connection/connection.php');
	$notransaksi = $_GET['no_transaksi'];
	$today = date("d-m-Y");

	//$id = $_GET['id'];

	require ("../../html2pdf/html2pdf.class.php");
	$content = ob_get_clean();
	$sql = $db->query("SELECT tb_detiltabungan.*, tb_nasabah.nm_nasabah AS nasabahs, tgl_transaksi, jenis_sampah, jumlah, hargabeli, total, SUM(jumlah) as totalbrg, tb_nasabah.id_nasabah as nasabahid FROM tb_detiltabungan, tb_nasabah, tb_sampah, tb_tabungan WHERE tb_nasabah.id_nasabah = tb_detiltabungan.id_nasabah AND tb_sampah.id_sampah = tb_detiltabungan.id_sampah AND tb_tabungan.no_transaksi = tb_detiltabungan.no_transaksi AND (((tgl_transaksi) BETWEEN '".$_POST['dari']."' AND '".$_POST['sampai']."')) group by no_transaksi ORDER BY tb_tabungan.tgl_transaksi ASC");
	$sql->execute();
	$row = $sql->fetch(PDO::FETCH_ASSOC);
	$content = "<img src='../../images/kop.jpg' height='150' width='780'>
				<hr width='100%'>
				<p align='center'>
				<b style='font-size: 20'>Laporan Tabungan </b><br>
				</p>
				<p>
				Tanggal : $today<br><br>
				<table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
					<tr bgcolor='#CCCCCC'>
						<th style='width: 20px;' align='center'>NO</th>
						<th style='width: 100px;' align='center'>Tgl. Transaksi</th>
						<th style='width: 100px;' align='center'>ID Nasabah</th>
						<th style='width: 100px;' align='center'>Nama Nasabah</th>
						<th style='width: 100px;' align='center'>Barang Masuk</th>
						<th style='width: 100px;' align='center'>Penambahan</th>
						<th style='width: 100px;' align='center'>Pengurangan</th>
						<th style='width: 100px;' align='center'>Total Saldo</th>
					</tr>";
	$sql->execute();
	$i=1;
	while($row = $sql->fetch(PDO::FETCH_ASSOC))
		{
			$content.="<tr bgcolor='#FFFFFF'>
						<td align='center'>".$i."</td>
						<td style='text-transform:capitalize; text-align:center;'>".$row['tgl_transaksi']."</td>
						<td align='center'>".$row['nasabahid']."</td>
						<td style='text-transform:capitalize; text-align:center;'>".$row['nasabahs']."</td>
						<td align='center'>".$row['totalbrg']."</td>
						<td align='center'>".$row['total']."</td>
						<td align='center'></td>
						<td align='center'>".$row['total']."</td>
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
		$html2pdf->Output('laporankas.pdf');
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>
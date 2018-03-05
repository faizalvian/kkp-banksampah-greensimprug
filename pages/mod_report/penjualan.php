<?php	
	ob_start();
	include('../../connection/connection.php');
	$notransaksi = $_GET['no_transaksi'];
	$today = date("d-m-Y");

	//$id = $_GET['id'];

	require ("../../html2pdf/html2pdf.class.php");
	$content = ob_get_clean();
	$sql = $db->query("SELECT tb_detilpenjualan.*, tb_customer.nm_customer AS customers, tgl_transaksi, jenis_sampah, jumlah, hargajual, total  FROM tb_detilpenjualan, tb_customer, tb_sampah, tb_penjualan WHERE tb_customer.id_customer = tb_penjualan.id_customer AND tb_sampah.id_sampah = tb_detilpenjualan.id_sampah AND tb_penjualan.no_transaksi = tb_detilpenjualan.no_transaksi AND (((tgl_transaksi) BETWEEN '".$_POST['dari']."' AND '".$_POST['sampai']."')) ORDER BY tgl_transaksi ASC");
	$sql->execute();
	$row = $sql->fetch(PDO::FETCH_ASSOC);
	$content = "<img src='../../images/kop.jpg' height='150' width='780'>
				<hr width='100%'>
				<p align='center'>
				<b style='font-size: 20'>Laporan Penjualan Sampah</b><br>
				</p>
				<p style='margin-left:50px;'>
				Tanggal : $today<br><br>
				<table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
					<tr bgcolor='#CCCCCC'>
						<th style='width: 20px;' align='center'>NO</th>
						<th style='width: 100px;' align='center'>Tgl. Transaksi</th>
						<th style='width: 100px;' align='center'>Nama Pengepul</th>
						<th style='width: 100px;' align='center'>Jenis Sampah</th>
						<th style='width: 100px;' align='center'>Qty (kg)</th>
						<th style='width: 100px;' align='center'>Harga</th>
						<th style='width: 100px;' align='center'>Total</th>
					</tr>";
	$sql->execute();
	$i=1;
	while($row = $sql->fetch(PDO::FETCH_ASSOC))
		{
			$content.="<tr bgcolor='#FFFFFF'>
						<td align='center'>".$i."</td>
						<td style='text-transform:capitalize'>".$row['tgl_transaksi']."</td>
						<td style='text-transform:capitalize'>".$row['customers']."</td>
						<td align='center'>".$row['jenis_sampah']."</td>
						<td align='center'>".$row['jumlah']."</td>
						<td align='center'>".$row['hargajual']."</td>
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
		$html2pdf->Output('kwitansijual.pdf');
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>
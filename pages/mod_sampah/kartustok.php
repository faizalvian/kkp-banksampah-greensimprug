<?php	
	ob_start();
	include('../../connection/connection.php');
	$idsampah = $_GET['id_sampah'];
	$today = date("d-m-Y");

	//$id = $_GET['id'];

	require ("../../html2pdf/html2pdf.class.php");
	$content = ob_get_clean();
	$sql = $db->query("SELECT tb_detiltabungan.*, tb_sampah.jenis_sampah AS sampahs, tgl_transaksi, no_transaksi, jumlah, jumlah, stok FROM tb_detiltabungan, tb_nasabah, tb_sampah, tb_tabungan WHERE tb_nasabah.id_nasabah = tb_detiltabungan.id_nasabah AND tb_sampah.id_sampah = tb_detiltabungan.id_sampah AND tb_tabungan.no_transaksi = tb_detiltabungan.no_transaksi AND tb_sampah.id_sampah='$idsampah' ORDER BY tb_tabungan.tgl_transaksi ASC");
	$sql->execute();
	$row = $sql->fetch(PDO::FETCH_ASSOC);
	$content = "<img src='../../images/kop.jpg' height='150' width='780'>
				<hr width='100%'>
				<p align='center'>
				<b style='font-size: 20'>KARTU STOK SAMPAH</b><br>
				</p>
				<p style='margin-left:30px;'>
				Kode Barang : $row[id_sampah]<br>
				Nama Barang: <label style='text-transform:capitalize'>$row[sampahs]<br><br>
				<table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
					<tr bgcolor='#CCCCCC'>
						<th style='width: 20px;' align='center'>NO</th>
						<th style='width: 130px;' align='center'>Tgl. Transaksi</th>
						<th style='width: 130px;' align='center'>ID Transaksi</th>
						<th style='width: 130px;' align='center'>Masuk</th>
						<th style='width: 130px;' align='center'>Keluar</th>
						<th style='width: 130px;' align='center'>Sisa Stok</th>
						<th style='width: 130px;' align='center'>Keterangan</th>
					</tr>";
	$sql->execute();
	$i=1;
	while($row = $sql->fetch(PDO::FETCH_ASSOC))
		{
			$content.="<tr bgcolor='#FFFFFF'>
						<td align='center'>".$i."</td>
						<td style='text-transform:capitalize; text-align:center'>".$row['tgl_transaksi']."</td>
						<td align='center'>".$row['no_transaksi']."</td>
						<td align='center'>".$row['jumlah']."</td>
						<td align='center'>".$row['jumlah']."</td>
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
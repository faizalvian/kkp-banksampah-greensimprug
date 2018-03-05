<?php	
	ob_start();
	include('../../connection/connection.php');
	$idnasabah = $_GET['id_nasabah'];
	$today = date("d-m-Y");

	//$id = $_GET['id'];

	require ("../../html2pdf/html2pdf.class.php");
	$content = ob_get_clean();
	$sql = $db->query("SELECT tb_tabungan.no_transaksi, tb_pencairantab.no_transaksi, jumlah_tarik, total, tabungan
					   FROM tb_tabungan, tb_detiltabungan, tb_pencairantab, tb_nasabah ");
	$sql->execute();
	$row = $sql->fetch(PDO::FETCH_ASSOC);
	$content = "<img src='../../images/kop.jpg' height='150' width='780'>
				<hr width='100%'>
				<p align='center'>
				<b style='font-size: 20'>KARTU TABUNGAN</b><br>
				</p>
				<p style='margin-left:30px;'>
				ID : $row[id_nasabah]<br>
				Nama : <label style='text-transform:capitalize'>$row[nasabahs]<br>
				Alamat : $row[alamat]</label> RT $row[rt] RW $row[rw]<br><br>
				<table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
					<tr bgcolor='#CCCCCC'>
						<th style='width: 20px;' align='center'>No</th>
						<th style='width: 130px;' align='center'>Tgl. Transaksi</th>
						<th style='width: 130px;' align='center'>Debit</th>
						<th style='width: 130px;' align='center'>Kredit</th>
						<th style='width: 130px;' align='center'>Saldo</th>
					</tr>";
	$sql->execute();
	$i=1;
	while($row = $sql->fetch(PDO::FETCH_ASSOC))
		{
			$content.="<tr bgcolor='#FFFFFF'>
						<td align='center'>".$i."</td>
						<td style='text-transform:capitalize; text-align:center'>".$row['tgl_transaksi']."</td>
						<td align='center'>".$row['jumlah_tarik']."</td>
						<td align='center'>".$row['total']."</td>
						<td align='center'>".$row['tabungan']."</td>
					   </tr>";	
			$i++;		
		}
	/*$query3 = $db->query("SELECT SUM(total) from tb_detiltabungan where id_nasabah='$idnasabah'");
    $row3 = $query3->fetch(PDO::FETCH_ASSOC);						
    $content.="<tr bgcolor='#CCCCCC'>
                 <td colspan='4' align='center'>TOTAL SALDO</td>
                 <td align='center'>Rp.".$row3['total']."</td>
               </tr>
               </table></p>";*/ 
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
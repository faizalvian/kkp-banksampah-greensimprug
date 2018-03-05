<?php	
	ob_start();
	include('../../connection/connection.php');
	$notransaksi = $_GET['no_transaksi'];
	$today = date("d-m-Y");

	require ("../../html2pdf/html2pdf.class.php");
	$content = ob_get_clean();
	$sql = $db->prepare("SELECT a.*, b.*, c.*, d.nm_customer 
					     from tb_penjualan a, tb_detilpenjualan b, tb_sampah c, tb_customer d
		  			     where a.no_transaksi = b.no_transaksi and b.id_sampah = c.id_sampah and
		  			     a.id_customer = d.id_customer and a.no_transaksi= '$notransaksi' and b.jumlah>'0'
		  			     GROUP BY c.id_sampah ORDER BY c.jenis_sampah asc");
	$sql->execute();
	$row = $sql->fetch(PDO::FETCH_ASSOC);
	$content = "<img src='../../images/kop.jpg' height='150' width='780'>
				<hr width='100%'>
				<p align='center'>
				<b style='font-size: 20'>Kwitansi Penjualan</b><br>
				</p>
				<p style='text-transform: uppercase;'>
					No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $notransaksi<br>
					Customer : ".$row['nm_customer']."<br>
					Tanggal &nbsp;&nbsp;&nbsp;&nbsp;: ".$today."
				</p>
				Atas penjualan sampah dengan rincian:
				<p align='center'>
				<table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
					<tr bgcolor='#CCCCCC'>
						<th style='width: 20px;'>NO</th>
						<th style='width: 180px;'>Jenis Sampah</th>
						<th style='width: 180px;'>Qty (kg)</th>
						<th style='width: 180px;'>Harga</th>
						<th style='width: 180px;'>Jumlah</th>
					</tr>";
	$sql->execute();
	$i=1;
	while($row = $sql->fetch(PDO::FETCH_ASSOC))
		{
			$content.="<tr bgcolor='#FFFFFF'>
						<td>".$i."</td>
						<td style='text-transform:capitalize'>".$row['jenis_sampah']."</td>
						<td>".$row['jumlah']."</td>
						<td>".$row['hargajual']."</td>
						<td>".$row['total']."</td>
					   </tr>";	
			$i++;		
		}							
	$query2 = $db->query("SELECT SUM(total) as totalsaldo from tb_detilpenjualan where no_transaksi='$_GET[no_transaksi]'");
                $row2 = $query2->fetch(PDO::FETCH_ASSOC);
                $content.="<tr bgcolor='#CCCCCC'>
							<td colspan='4'>TOTAL</td>
							<td>Rp".$row2['totalsaldo']."</td>
						   </tr>";
    $content.="</table></p>";
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
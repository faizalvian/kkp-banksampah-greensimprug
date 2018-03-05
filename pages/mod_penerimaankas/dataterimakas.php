<h3><i class="fa fa-trash fa-fw"></i>Data Penerimaan Kas </h3><br>
<?php
include('../connection/connection.php');
$record = $db->query("SELECT no_transaksi, tgl_transaksi, nominal, tb_ketkas.keterangan as ket, dest
                      FROM tb_kas, tb_ketkas where tb_kas.ket_transaksi=tb_ketkas.id_ket and tb_kas.status='masuk'");

echo'<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
    echo '<thead>';
        echo '<tr>';
            echo '<th>No Transaksi</th>';
            echo '<th>Tanggal</th>';
            echo '<th>Jumlah Terima</th>';
            echo '<th>Keterangan Transaksi</th>';
            echo '<th>Diterima dari</th>';
            echo '<th>Aksi</th>';
        echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $record->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr'>";                 
                echo "<td style=' width:150px;  text-align:left; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['no_transaksi'];echo"</td>";
                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['tgl_transaksi'];"</td>";
                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nominal'];"</td>";
                echo "<td style='width:120px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['ket'];"</td>";
                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['dest'];"</td>";
                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'><button title='Lihat Detil' id='detiltb_penerimaankas' class='btn btn-primary' data-toggle='modal' href='#' data-target='#detiltkModal".$row['no_transaksi']."'> Lihat Detil <i class='fa fa-eye'></i></button></td>";
            echo '</tr>';
    }
    echo '</tbody>';
echo '</table>';
?>
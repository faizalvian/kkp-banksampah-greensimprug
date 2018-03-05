<h3><i class="fa fa-trash fa-fw"></i>Data Penarikan Saldo Tabungan </h3><br>
<?php
include('../connection/connection.php');
$record = $db->query("SELECT no_transaksi, tgl_transaksi, tb_nasabah.id_nasabah ,nm_nasabah, jumlah_tarik
                      FROM tb_pencairantab, tb_nasabah where tb_nasabah.id_nasabah=tb_pencairantab.id_nasabah group by id_nasabah order by tgl_transaksi, no_transaksi asc ");

echo'<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
    echo '<thead>';
        echo '<tr>';
            echo '<th>Tanggal Transaksi</th>';
            echo '<th>No Transaksi</th>';
            echo '<th>ID Nasabah</th>';
            echo '<th>Nama Nasabah</th>';
            echo '<th>Jumlah Tarik</th>';
            echo '<th>Aksi</th>';
        echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $record->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr'>";                 
                echo "<td style=' width:150px;  text-align:left; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['tgl_transaksi'];echo"</td>";
                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['no_transaksi'];"</td>";
                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['id_nasabah'];"</td>";
                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nm_nasabah'];"</td>";
                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['jumlah_tarik'];"</td>";
                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'><button title='Lihat Detil' id='detiltb_tabungan' class='btn btn-primary' data-toggle='modal' href='#' data-target='#detilptModal".$row['no_transaksi']."'> Lihat Detil <i class='fa fa-eye'></i></button></td>";
            echo '</tr>';
    }
    echo '</tbody>';
echo '</table>';
?>
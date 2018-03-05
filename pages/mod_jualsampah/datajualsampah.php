<h3><i class="fa fa-trash fa-fw"></i>Data Penjualan Sampah </h3><br>
<?php
include('../connection/connection.php');
$record = $db->query("SELECT no_transaksi, tgl_transaksi, tb_customer.id_customer as customers, nm_customer from tb_penjualan, tb_customer
                       where tb_penjualan.id_customer = tb_customer.id_customer
                       ORDER BY tb_penjualan.tgl_transaksi desc");

echo'<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
    echo '<thead>';
        echo '<tr>';
            echo '<th>No Transaksi</th>';
            echo '<th>Customer</th>';
            echo '<th>Tanggal Transaksi</th>';
            echo '<th>Aksi</th>';
        echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $record->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr'>";                 
                echo "<td style=' width:150px;  text-align:left; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['no_transaksi'];echo"</td>";
                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nm_customer'];"</td>";
                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['tgl_transaksi'];"</td>";
                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'><button title='Lihat Detil' id='detiltb_penjualan' class='btn btn-primary' data-toggle='modal' href='#' data-target='#detiljsModal".$row['no_transaksi']."'> Lihat Detil <i class='fa fa-eye'></i></button></td>";
            echo '</tr>';
    }
    echo '</tbody>';
echo '</table>';
?>
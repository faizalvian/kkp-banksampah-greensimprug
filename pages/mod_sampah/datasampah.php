            <h3><i class="fa fa-trash-o fa-fw"></i>Data Sampah</h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
                                include('../connection/connection.php');
                                $stmt = $db->query("SELECT * FROM tb_sampah ORDER by id_sampah asc");
                                echo'<table style="table-layout:fixed;" class="table table-striped table-bordered table-hover" id="dataTables-example">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th><center>ID Sampah</th>';
                                            echo '<th><center>Jenis Sampah</th>';
                                            echo '<th><center>Stok/kg</th>';
                                            echo '<th><center>Harga Beli/kg</th>';
                                            echo '<th><center>Aksi</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr'>";       
                                                          
                                                echo "<td style=' width:150px;  text-align:center; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['id_sampah'];echo"</td>";
                                                echo "<td style='width:110px;  text-align:center; vertical-align: middle;' class='text-capitalize'>";echo $row['jenis_sampah'];"</td>";
                                                echo "<td style='width:110px;  text-align:center; vertical-align: middle;'>";echo $row['stok'];"</td>";
                                                echo "<td style='width:110px;  text-align:center; vertical-align: middle;' class='text-capitalize'>";echo $row['hargabeli'];"</td>";

                                                //Tombol aksi
                                                echo "<td style='width:110px;  text-align:center; vertical-align: middle;' class='text-capitalize'><button id='updatesampah' class='btn btn-primary' data-toggle='modal' href='#' data-target='#updatesampahModal".$row['id_sampah']."' title='Edit'>Ubah Harga Beli <i class='fa fa-dollar'></i></button>&nbsp;<a target='_blank' title='Cetak Kartu Stok' class='btn btn-default' href='mod_sampah/kartustok.php?id_sampah=$row[id_sampah]&&id_petugas=$_SESSION[admin]' ><i class='fa fa-file'></i></a>
                                                </td>";
                                                //End tombol aksi

                                            echo '</tr>';
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                            ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
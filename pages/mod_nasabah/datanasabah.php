            <h3><i class="fa fa-user fa-fw"></i>Data Nasabah</h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button class="btn btn-default" data-toggle="modal" href="#" data-target="#entrynasabahModal"><i class="fa fa-user-plus"></i></button> Tambah Nasabah Baru
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
                                include('../connection/connection.php');
                                $stmt = $db->query("SELECT id_nasabah, nm_nasabah, alamat, rt, rw, no_telp, tabungan FROM tb_nasabah ORDER by id_nasabah asc");
                                echo'<table style="table-layout:fixed;" class="table table-striped table-bordered table-hover" id="dataTables-example">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th><center>ID Nasabah</th>';
                                            echo '<th><center>Nama Nasabah</th>';
                                            echo '<th><center>Alamat</th>';
                                            echo '<th><center>No. Telp</th>';
                                            echo '<th><center>Saldo Tabungan</th>';
                                            echo '<th><center>Aksi</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr'>";  
                                                echo "<form method='POST' action='mod_nasabah/proses.php'>";         
                                                echo "<td style=' width:150px;  text-align:center; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['id_nasabah'];echo"</td>";
                                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nm_nasabah'];"</td>";
                                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['alamat']."&nbsp;"."RT"."&nbsp;".$row['rt']."&nbsp;"."RW"."&nbsp;".$row['rw'];"</td>";
                                                echo "<td style='width:110px;  text-align:center; vertical-align: middle;' class='text-capitalize'>";echo $row['no_telp'];"</td>";
                                                echo "<td style='width:110px;  text-align:center; vertical-align: middle;'>";echo $row['tabungan'];"</td>";
                                                echo "<td style='width:110px;  text-align:center; vertical-align: middle;' class='text-capitalize'><button id='updatenasabah' class='btn btn-primary' data-toggle='modal' href='#' data-target='#updatenasabahModal".$row['id_nasabah']."' title='Edit'><i class='fa fa-edit'></i></button>&nbsp;<button title='Delete' class='btn btn-danger' href='#' data-toggle='modal' data-target='#deleteModal".$row['id_nasabah']."'><i class='fa fa-remove'></i></button>&nbsp;<a target='_blank' title='Cetak Kartu Tabungan' class='btn btn-default' href='mod_nasabah/kartutabungan.php?id_nasabah=$row[id_nasabah]&&id_petugas=$_SESSION[admin]' ><i class='fa fa-file'></i></a></td>";
                                                
                                                //MODAL DELETE
                                                echo '<div class="modal fade" id="deleteModal'.$row["id_nasabah"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
                                                echo '<div class="modal-dialog modal-sm" role="document">';
                                                echo '<div class="modal-content">';
                                                echo '<div class="modal-header">
                                                    <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                                </div>';
                                                echo "<div class='modal-body'>Kamu yakin ingin menghapus?
                                                </div>
                                                    <div class='modal-footer'>
                                                        <input type='hidden' value='$row[id_nasabah]' name='id_nasabah'>
                                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>
                                                        <button class='btn btn-danger' aria-label='Delete'type='submit' name='hapus'></span>Hapus</button>
                                                    </div>
                                                </div>";
                                                echo "</form>";
                                                //-END MODAL DELETE

                                            echo '</tr>';
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                            ?>
                            <a class="btn btn-default" href="mod_report/rekapansaldo.php" style="background: #87D37C;" target="_blank"><i class="fa fa-file"> Cetak Rekapan Saldo</i></a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
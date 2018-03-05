            <h3><i class="fa fa-users fa-fw"></i>Data Pengepul</h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button class="btn btn-default" data-toggle="modal" href="#" data-target="#entrycustomerModal"><i class="fa fa-user-plus"></i></button> Tambah Data Baru
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
                                include('../connection/connection.php');
                                $stmt = $db->query("SELECT id_customer, nm_customer, alamat, no_telp, email FROM tb_customer ORDER by id_customer asc");
                                echo'<table style="table-layout:fixed;" class="table table-striped table-bordered table-hover" id="dataTables-example">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th><center>ID Pengepul</th>';
                                            echo '<th><center>Nama Pengepul</th>';
                                            echo '<th><center>Alamat</th>';
                                            echo '<th><center>No. Telp</th>';
                                            echo '<th><center>Email</th>';
                                            echo '<th><center>Aksi</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr'>";       
                                                echo "<form method='POST' action='mod_customer/proses.php'>";
                                                echo "<td style=' width:150px;  text-align:left; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['id_customer'];echo"</td>";
                                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nm_customer'];"</td>";
                                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['alamat'];"</td>";
                                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['no_telp'];"</td>";
                                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;'>";echo $row['email'];"</td>";

                                                //Tombol aksi
                                                echo "<td style='width:110px;  text-align:center; vertical-align: middle;' class='text-capitalize'><button id='updatecustomer' class='btn btn-primary' data-toggle='modal' href='#' data-target='#updatecustomerModal".$row['id_customer']."' title='Edit'><i class='fa fa-edit'></i></button>&nbsp;<button title='Delete' class='btn btn-danger' href='#' data-toggle='modal' data-target='#deleteModal".$row['id_customer']."'><i class='fa fa-remove'></i></button>
                                                </td>";
                                                //End tombol aksi

                                                //MODAL DELETE
                                                echo '<div class="modal fade" id="deleteModal'.$row["id_customer"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
                                                echo '<div class="modal-dialog modal-sm" role="document">';
                                                echo '<div class="modal-content">';
                                                echo '<div class="modal-header">
                                                    <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                                </div>';
                                                echo "<div class='modal-body'>Kamu yakin ingin menghapus?
                                                </div>
                                                    <div class='modal-footer'>
                                                        <input type='hidden' value='$row[id_customer]' name='id_customer'>
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
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
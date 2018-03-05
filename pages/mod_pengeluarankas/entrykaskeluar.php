        <img src="../images/logo.png" height="100" width="100">
        <br><h3><i class="fa fa-clipboard"> Entry Pengeluaran Kas</i></h3><hr>
        <div class="row">    
            <!-- FORM ENTRY PENERIMAAN KAS -->
            <div class="col-md-6">
              <form method="POST" action="mod_pengeluarankas/proses.php">
                <div class="form-group"><label>No Transaksi</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="notransaksi" readonly
                value="<?php
                    include('../connection/connection.php');
                    $today = date("dmY"); //untuk mengambil tahun, tanggal dan bulan Hari INI

                    //cari id terakhir ditanggal hari ini
                    $query = $db->query('SELECT max(no_transaksi) as maxNO FROM tb_kas');
                    $row = $query->fetch(PDO::FETCH_ASSOC);
                    $idMax = $row['maxNO'];

                    //setelah membaca id terakhir, lanjut mencari nomor urut id dari id terakhir
                    $NoUrut = (int) substr($idMax, 10, 4);
                    $NoUrut++; //nomor urut +1
    
                    $kode = "TK";
                    //setelah ketemu id terakhir lanjut membuat id baru dengan format sbb:
                    $notransaksi = $kode.$today .sprintf('%04s', $NoUrut);
                    //$today nanti jadinya misal 20160526 .sprintf('%04s', $NoUrut) urutan id di tanggal hari ini
                echo $notransaksi;
                ?>">
                </div>
                <div class="form-group"><label>Tanggal </label><input required class="form-control required" data-placement="top" data-trigger="manual" type="date" name="tanggal"></div>

                <div class="form-group has-feedback"><label>Jumlah Keluar</label>
                  <span class="form-control-feedback">IDR</span><input required class="form-control required text-capitalize" placeholder=".00" data-placement="top" data-trigger="manual" type="number" name="nominal"></div>
                
                <div class="form-group">
                    <label class="control-label">Keterangan Transaksi</label>
                        <select name="transaksi" class="form-control" required> 
                            <option value="">--Pilih Transaksi--</option>
                            <?php
                              include('../connection/connection.php');
                              $query = $db->query("SELECT id_ket, keterangan from tb_ketkas where status='keluar' order by id_ket asc");

                              while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                                echo "<option value=$row[id_ket] style='text-transform: uppercase;'>$row[keterangan]</option>";
                              }
                            ?>  
                        </select>
                </div>
          
                <div class="form-group has-feedback"><label>Pembayaran Ke</label><input required class="form-control required text-capitalize" placeholder="Pembayaran Ke" data-placement="top" data-trigger="manual" type="text" name="bayarke"><span class="form-control-feedback">Yth.</span></div>
                <input type="hidden" name="status" value="keluar">
                <button type="submit" class="btn btn-default" name="simpan"><i class="fa fa-plus"> SIMPAN </i></button>
              </form><br><hr>
              <!-- END FORM ENTRY transaksi -->
            </div>


            <div class="col-md-6">
              <!-- DETIL transaksi -->
                <?php
                include('../connection/connection.php');
                if(!empty($_GET['no_tb'])){
                $query = $db->query("SELECT * FROM tb_kas");
                echo'<table class="table table-striped table-bordered table-hover">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>No Transaksi</th>';
                            echo '<th>Tgl Transaksi</th>';
                            echo '<th>Jumlah Keluar</th>';
                            echo '<th>Keterangan Transaksi</th>';
                            echo '<th>Pembayaran Ke/th>';
                            echo '<th>Hapus</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        if($row['jumlah']>'0'){
                            echo "<tr'>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['no_transaksi'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['tgl_transaksi'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nominal'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['keterangan'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['bayar_ke'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'><a class='btn btn-danger' aria-label='Delete' href='mod_pengeluarankas/proses.php?no_transaksi=$row[no_transaksi]'><i class='fa fa-close'></i></a></td>";
                            echo '</tr>';
                        }
                    }
                    echo '</tbody>';
                echo '</table>';
                echo "<a class='btn btn-danger' href='index.php?hal=tb'> Selesai <i class='fa fa-check'></i></a>";
                }
                ?>
              <!-- END DETIL transaksi -->
            </div>
        </div>
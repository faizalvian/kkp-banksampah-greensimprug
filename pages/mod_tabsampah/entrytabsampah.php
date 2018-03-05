        <img src="../images/logo.png" height="100" width="100">
        <br><h3><i class="fa fa-clipboard"> Entry Data</i></h3><hr>
        <div class="row">    
            <!-- FORM ENTRY TABUNGAN SAMPAH -->
            <div class="col-md-6">
              <form method="POST" action="mod_tabsampah/proses.php">
                <div class="form-group">
                    <label class="control-label">Nama Nasabah</label>
                        <input required class="form-control required text-capitalize" placeholder="Entry Nama Nasabah" data-placement="top" data-trigger="manual" type="text" list="nasabah" name="nasabah">
                            <datalist id="nasabah">
                            <?php 
                                include('../connection/connection.php');
                                $query = $db->query('SELECT id_nasabah, nm_nasabah from tb_nasabah');
                                while($row = $query->fetch(PDO::FETCH_ASSOC)) 
                                {
                                    echo "<option value='$row[id_nasabah] - $row[nm_nasabah]'>";
                                }
                            ?>
                            </datalist>
                </div>
                <div class="form-group"><label>No Transaksi</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="notransaksi" readonly
                value="<?php
                    include('../connection/connection.php');
                    $today = date("dmY"); //untuk mengambil tahun, tanggal dan bulan Hari INI

                    //cari id terakhir ditanggal hari ini
                    $query = $db->query('SELECT max(no_transaksi) as maxNO FROM tb_tabungan');
                    $row = $query->fetch(PDO::FETCH_ASSOC);
                    $idMax = $row['maxNO'];

                    //setelah membaca id terakhir, lanjut mencari nomor urut id dari id terakhir
                    $NoUrut = (int) substr($idMax, 10, 4);
                    $NoUrut++; //nomor urut +1
    
                    $kode = "TB";
                    //setelah ketemu id terakhir lanjut membuat id baru dengan format sbb:
                    $notransaksi = $kode.$today .sprintf('%04s', $NoUrut);
                    //$today nanti jadinya misal 20160526 .sprintf('%04s', $NoUrut) urutan id di tanggal hari ini
                echo $notransaksi;
                ?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Jenis Sampah</label>
                        <select name="sampah" class="form-control" required>
                            <option value="">--Pilih Jenis Sampah--</option>
                            <?php
                              include('../connection/connection.php');
                              $query = $db->query("SELECT id_sampah, jenis_sampah from tb_sampah order by id_sampah asc");

                              while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                                echo "<option value=$row[id_sampah] style='text-transform: uppercase;'>$row[id_sampah] - $row[jenis_sampah]</option>";
                              }
                            ?>  
                        </select>
                </div>
                <div class="form-group has-feedback"><label>Qty</label><input required class="form-control required text-capitalize" placeholder="Qty" data-placement="top" data-trigger="manual" type="number" name="qty" min="1"><span class="form-control-feedback">kg</span></div>
                <button type="submit" class="btn btn-success" name="entrytb"><i class="fa fa-plus"> SIMPAN </i></button>
              </form><br><hr>
              <!-- END FORM ENTRY transaksi -->
            </div>


            <div class="col-md-6">
              <!-- DETIL transaksi -->
                <?php
                include('../connection/connection.php');
                if(!empty($_GET['no_tb'])){
                $query = $db->query("SELECT b.id_sampah as sphdetil, c.id_sampah, jenis_sampah, jumlah, total, hargabeli from tb_tabungan a, tb_detiltabungan b, tb_sampah c 
                                       where a.no_transaksi=b.no_transaksi and c.id_sampah=b.id_sampah
                                       and b.no_transaksi = '$_GET[no_tb]'
                                       ORDER by c.jenis_sampah asc");
                echo'<table class="table table-striped table-bordered table-hover">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>Jenis</th>';
                            echo '<th>Qty(kg)</th>';
                            echo '<th>Harga</th>';
                            echo '<th>Jumlah</th>';
                            echo '<th>Hapus</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        if($row['jumlah']>'0'){
                            echo "<tr'>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['jenis_sampah'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['jumlah'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['hargabeli'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['total'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'><a class='btn btn-danger' aria-label='Delete' href='mod_tabsampah/proses.php?sphdetil=$row[sphdetil]'><i class='fa fa-close'></i></a></td>";
                            echo '</tr>';
                        }
                    }
                    echo '</tbody>';
                echo '</table>';
                echo '<p>
                         Total = 
                      </p>';
                echo "<a class='btn btn-primary' href='report/transaksi.php?no_transaksi=$notransaksi'><i class='fa fa-print'></i> Cetak Kwitansi</a><br><br>";
                echo "<a class='btn btn-danger' href='index.php?hal=tb'> Selesai <i class='fa fa-check'></i></a>";
                }
                ?>
              <!-- END DETIL transaksi -->
            </div>
        </div>
        <!-- entry bagian modal -->
        <div id="tambahkettransaksiModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Tambah Transaksi Penerimaan Kas</h3>
              </div>
              <div class="modal-body">
                <form method="POST" action="mod_penerimaankas/proses_ket.php">

                  <div class="form-group"><label>Id Keterangan</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="no" readonly
                value="<?php
                    include('../connection/connection.php');

                    //cari id terakhir ditanggal hari ini
                    $query = $db->query('SELECT max(id_ket) as maxNO FROM tb_ketkas');
                    $row = $query->fetch(PDO::FETCH_ASSOC);
                    $idMax = $row['maxNO'];

                    //setelah membaca id terakhir, lanjut mencari nomor urut id dari id terakhir
                    $NoUrut = (int) substr($idMax, 3, 3);
                    $NoUrut++; //nomor urut +1
    
                    $kode = "KET";
                    //setelah ketemu id terakhir lanjut membuat id baru dengan format sbb:
                    $no = $kode .sprintf('%03s', $NoUrut);
                    //$today nanti jadinya misal 20160526 .sprintf('%04s', $NoUrut) urutan id di tanggal hari ini
                echo $no;
                ?>"> 
                </div>

                  <div class="form-group"><label>Keterangan Transaksi</label><input required class="form-control required text-capitalize" placeholder="contoh : penjualan tunai" data-placement="top" data-trigger="manual" type="text" name="keterangan"></div>
                  <input type="hidden" name="status" value="masuk">
                  <div class="form-group"><button type="submit" class="btn btn-success pull-center" name="tambah">Submit</button> <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.entry bagian modal -->
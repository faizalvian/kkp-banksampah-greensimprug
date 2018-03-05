        <?php
          include('../connection/connection.php'); 
          
          $query = $db->query("SELECT no_transaksi, tgl_transaksi, nm_nasabah, jumlah_tarik
                               FROM tb_nasabah, tb_pencairantab
                               WHERE tb_nasabah.id_nasabah=tb_pencairantab.id_nasabah");
          
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) { 
        ?>
 
        <div <?php echo 'id="detilptModal'.$row['no_transaksi'].'"' ?> class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Detil Penarikan</h3>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group"><label>No. Transaksi</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="notransaksi" maxlength="16" readonly value="<?php echo $row['no_transaksi']; ?>"></div>
                  <div class="form-group"><label>Tanggal Transaksi</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="tanggal" value="<?php echo $row['tgl_transaksi']; ?>" readonly></div>
                  <div class="form-group"><label>Nasabah</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="nominal" value="<?php echo $row['nm_nasabah']; ?>" readonly></div>
                  <div class="form-group"><label>Jumlah Pencairan</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="transaksi" value="<?php echo $row['jumlah_tarik']; ?>" readonly></div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
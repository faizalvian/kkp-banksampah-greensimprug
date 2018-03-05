        <?php
          include('../connection/connection.php'); 
          //$id_bagian = $_POST['id_bagian'];
          
          $stmt = $db->query("select * from tb_sampah");
        
        //<!-- update bagian modal -->
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        ?>
        <!-- update obat modal -->
        <div <?php echo 'id="updatesampahModal'.$row['id_sampah'].'"' ?> class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel"><?php echo $row['jenis_sampah']; ?></h3>
              </div>
              <div class="modal-body">
                <form method="POST" action="mod_sampah/proses.php">
                  <input type="hidden" value="<?php echo $row['id_sampah']; ?>" name="idsampah">
                  <div class="form-group has-feedback"><label>Harga baru/kg</label>
                  <span class="form-control-feedback">IDR</span><input required class="form-control required text-capitalize" placeholder=".00" data-placement="top" data-trigger="manual" type="number" value="<?php echo $row['hargabeli']; ?>" name="hargabeli"></div>
                  <div class="form-group"><button type="submit" class="btn btn-success pull-center" name="update">Ubah</button> <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
        <!-- ./ update obat modal -->
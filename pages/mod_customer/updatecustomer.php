        <?php
          include('../connection/connection.php'); 
          //$id_bagian = $_POST['id_bagian'];
          
          $stmt = $db->query("select * from tb_customer");
        
          //<!-- update bagian modal -->
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        ?>
        <div <?php echo 'id="updatecustomerModal'.$row['id_customer'].'"' ?> class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Update Pengepul</h3>
              </div>
              <div class="modal-body">
                <form method="POST" action="mod_customer/proses.php">
                  <div class="form-group"><label>ID Pengepul</label><input required class="form-control required text-uppercase" placeholder="Input ID Pengepul" data-placement="top" data-trigger="manual" type="text" name="idcustomer" maxlength="10" value="<?php echo $row['id_customer']; ?>" readonly></div>
                  <div class="form-group"><label>Nama Pengepul</label><input required class="form-control required text-capitalize" placeholder="Input Nama Bagian" data-placement="top" data-trigger="manual" type="text" name="namacustomer" value="<?php echo $row['nm_customer']; ?>"></div>
                  <div class="form-group"><label>Alamat - RT - RW</label>
                    <div class="row">
                      <div class="col-sm-4 tight-gutter"><input required class="form-control required text-capitalize" placeholder="Nama Jalan" data-placement="top" data-trigger="manual" type="text" name="alamat" value="<?php echo $row['alamat']; ?>"></div>
                      <div class="col-sm-4 tight-gutter"><input required class="form-control required text-capitalize" placeholder="RT" data-placement="top" data-trigger="manual" type="text" name="rt" id="rtcustedit" maxlength="2" minlength="2" value="<?php echo $row['RT']; ?>"></div>
                      <div class="col-sm-4 tight-gutter"><input required class="form-control required text-capitalize" placeholder="RW" data-placement="top" data-trigger="manual" type="text" name="rw" id="rwcustedit" maxlength="2" minlength="2" value="<?php echo $row['RW']; ?>"></div>
                    </div>
                  </div>
                  <div class="form-group"><label>No. Telp</label><input required class="form-control required text-capitalize" placeholder="Input No Telp" data-placement="top" data-trigger="manual" type="text" name="notelp" id="notelpcustedit" maxlength="13" value="<?php echo $row['no_telp']; ?>"></div>
                  <div class="form-group"><label>Email</label><input required class="form-control required" placeholder="@" data-placement="top" data-trigger="manual" type="email" name="email" value="<?php echo $row['email']; ?>"></div>
                  <div class="form-group"><button type="submit" class="btn btn-success pull-center" name="update">Update</button> <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php 
          } 
        ?>
        <!-- /.update bagian modal -->
        <?php
          include('../connection/connection.php'); 
          //$id_bagian = $_POST['id_bagian'];
          
          $stmt = $db->query("select id_nasabah, no_ktp, nm_nasabah, jenkel, alamat, rt, rw, no_telp, email from tb_nasabah");
          
          class selected{
              function cek($val,$sel,$tipe){
                  if($val==$sel){
                      switch($tipe){
                          case 'select' :echo "selected"; break;
                      }
                  }else{
                      echo "";
                  }
              }
          }
          $ob = new selected();
        
        //<!-- update bagian modal -->
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        ?>
        <!-- update obat modal -->
        <div <?php echo 'id="updatenasabahModal'.$row['id_nasabah'].'"' ?> class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <form method="POST" action="mod_nasabah/proses.php">
                  <input type="hidden" value="<?php echo $row['id_nasabah']; ?>" name="idnasabah">
                  <div class="form-group"><label>Nomor KTP</label><input required class="form-control required text-capitalize" placeholder="Input Nama nasabah" data-placement="top" data-trigger="manual" type="text" name="noktp" id="noktpedit" value="<?php echo $row['no_ktp']; ?>" readonly></div>
                  <div class="form-group"><label>Nama Nasabah</label><input required class="form-control required text-capitalize" placeholder="Input Nama nasabah" data-placement="top" data-trigger="manual" type="text" value="<?php echo $row['nm_nasabah']; ?>" name="namanasabah"></div>
                  <div class="form-group"><label>Jenis Kelamin</label>
                    <div class="selectContainer">
                        <select class="form-control" name="jenkel">
                            <option <?php $ob->cek("1",$row['jenkel'],"select") ?> value="1">Laki-laki</option>
                            <option <?php $ob->cek("0",$row['jenkel'],"select") ?> value="0">Perempuan</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group"><label>Alamat - RT - RW</label>
                    <div class="row">
                      <div class="col-sm-4 tight-gutter"><input required class="form-control required text-capitalize" placeholder="Nama Jalan" data-placement="top" data-trigger="manual" type="text" name="alamat" value="<?php echo $row['alamat']; ?>"></div>
                      <div class="col-sm-4 tight-gutter"><input required class="form-control required text-capitalize" placeholder="RT" data-placement="top" data-trigger="manual" type="text" name="rt" id="rtedit" maxlength="2" minlength="2" value="<?php echo $row['rt']; ?>"></div>
                      <div class="col-sm-4 tight-gutter"><input required class="form-control required text-capitalize" placeholder="RW" data-placement="top" data-trigger="manual" type="text" name="rw" id="rwedit" maxlength="2" minlength="2" value="<?php echo $row['rw']; ?>"></div>
                    </div>
                  </div>
                  <div class="form-group"><label>Nomor Telepon</label><input required class="form-control required" placeholder="xxxxxxxxxxxxx" data-placement="top" data-trigger="manual" type="text" name="notelp" id="notelpedit" maxlength="13" value="<?php echo $row['no_telp']; ?>"></div>
                  <div class="form-group"><label>Email</label><input required class="form-control required" placeholder="@" data-placement="top" data-trigger="manual" type="email" name="email" value="<?php echo $row['email']; ?>"></div>
                  <div class="form-group"><button type="submit" class="btn btn-success pull-center" name="update">Submit</button> <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
        <!-- ./ update obat modal -->
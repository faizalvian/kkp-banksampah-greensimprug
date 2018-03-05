        <!-- entry bagian modal -->
        <div id="entrycustomerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel"><i class="fa fa-users"> Form Tambah Pengepul</i></h3>
              </div>
              <div class="modal-body">
                <form method="POST" action="mod_customer/proses.php">
                  <div class="form-group"><label>Nama Pengepul</label><input required class="form-control required text-capitalize" placeholder="Input Nama Pengepul" data-placement="top" data-trigger="manual" type="text" name="namacustomer"></div>
                  <div class="form-group"><label>Alamat - RT - RW</label>
                    <div class="row">
                      <div class="col-sm-4 tight-gutter"><input required class="form-control required text-capitalize" placeholder="Nama Jalan" data-placement="top" data-trigger="manual" type="text" name="alamat"></div>
                      <div class="col-sm-4 tight-gutter"><input required class="form-control required text-capitalize" placeholder="RT" data-placement="top" data-trigger="manual" type="text" name="rt" id="rtcust" maxlength="2" minlength="2"></div>
                      <div class="col-sm-4 tight-gutter"><input required class="form-control required text-capitalize" placeholder="RW" data-placement="top" data-trigger="manual" type="text" name="rw" id="rwcust" maxlength="2" minlength="2"></div>
                    </div>
                  </div>
                  <div class="form-group"><label>Nomor Telepon</label><input required class="form-control required" placeholder="xxxxxxxxxxxxx" data-placement="top" data-trigger="manual" type="text" name="notelp" id="notelpcust" maxlength="13"></div>
                  <div class="form-group"><label>Email</label><input required class="form-control required" placeholder="@" data-placement="top" data-trigger="manual" type="email" name="email"></div>
                  <div class="form-group"><button type="submit" class="btn btn-success pull-center" name="tambah">SIMPAN</button> <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.entry bagian modal -->
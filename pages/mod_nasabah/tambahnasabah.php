        <!-- entry nasabah modal -->
        <div id="entrynasabahModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h3 id="myModalLabel"><i class="fa fa-user-plus"> Form Tambah Nasabah</i></h3>
              </div><!-- ./ modal-header -->

              <div class="modal-body">
                <form method="POST" action="mod_nasabah/proses.php">
                  <div class="form-group">
                    <label>Nomor KTP</label>
                      <input required class="form-control required" placeholder="xxxxxxxxxxxxxxxx" data-placement="top" data-trigger="manual" type="text" name="noktp" id="noktp" minlength="16" maxlength="16">
                  </div><!-- ./ form-group-KTP -->

                  <div class="form-group">
                    <label>Nama Nasabah</label>
                      <input required class="form-control required text-capitalize" placeholder="Input Nama nasabah" data-placement="top" data-trigger="manual" type="text" name="namanasabah">
                  </div><!-- ./ form-group-Nasabah -->

                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                      <div class="selectContainer">
                        <select class="form-control" name="jenkel">
                            <option value="1">Laki-laki</option>
                            <option value="0">Perempuan</option>
                        </select><!-- ./ form-control -->
                    </div><!-- ./ select-container -->
                  </div><!-- ./ form-group-Jenkel -->

                  <div class="form-group">
                    <label>Alamat - RT - RW</label>
                      <div class="row">
                        <div class="col-sm-4 tight-gutter"><input required class="form-control required text-capitalize" placeholder="Nama Jalan" data-placement="top" data-trigger="manual" type="text" name="alamat">
                        </div><!-- ./ Nama-Jalan -->

                        <div class="col-sm-4 tight-gutter"><input required class="form-control required text-capitalize" placeholder="RT" data-placement="top" data-trigger="manual" type="text" name="rt" id="rt" maxlength="2" minlength="2">
                        </div><!-- ./ RT -->

                        <div class="col-sm-4 tight-gutter"><input required class="form-control required text-capitalize" placeholder="RW" data-placement="top" data-trigger="manual" type="text" name="rw" id="rw" maxlength="2" minlength="2">
                        </div><!-- ./ RW -->
                    </div><!-- ./ row -->
                  </div><!-- ./ form-group-Alamat -->

                  <div class="form-group">
                    <label>Nomor Telepon</label>
                      <input required class="form-control required" placeholder="xxxxxxxxxxxxx" data-placement="top" data-trigger="manual" type="text" name="notelp" id="notelp" maxlength="13">
                  </div><!-- ./ form-group-Telepon -->

                  <div class="form-group">
                    <label>Email</label>
                      <input required class="form-control required" placeholder="@" data-placement="top" data-trigger="manual" type="email" name="email">
                    </div><!-- ./ form-group-Email -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-success pull-center" name="tambah">SIMPAN</button> 
                    <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid.</p>
                  </div><!-- ./ form-group-Simpan -->
                </form><!-- ./ form -->
              </div><!-- ./ modal-body -->
            </div><!-- ./ modal-content -->
          </div><!-- ./ modal-dialog -->
        </div><!-- ./ entry nasabah modal -->
        
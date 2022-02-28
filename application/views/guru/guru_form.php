<!-- ======= About Section ======= -->
<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Edit Data Guru</h2>
    </div>
    <div class="row content col-md-12 justify-content-center">
      <!-- if there flashdata message -->
      <?php if ($this->session->flashdata('message')) : ?>
        <?= $this->session->flashdata('message'); ?>
      <?php endif ?>
    </div>
    <div class="card">
      <div class="card-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
          <div class="mb-2 row">
            <div class="col">
              <div class="form-group">
                <label for="varchar">NIP <?php echo form_error('nip') ?></label>
                <input type="text" class="form-control" name="nip" id="nip" placeholder="Nomor Induk Pengajar" value="<?php echo $nip; ?>" />
              </div>
            </div>
          </div>
          <div class="mb-2 row">
            <div class="form-group">
              <label for="varchar">Nama <?php echo form_error('nama') ?></label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="<?php echo $nama; ?>" />
            </div>
          </div>

          <div class="mb-2 row">
            <div class="form-group">
              <label for="varchar">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
              <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
            </div>
          </div>

          <div class="mb-2 row">
            <div class="form-group">
              <label for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
              <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                <?php if ($jenis_kelamin) : ?>
                  <option selected value="<?php echo $jenis_kelamin; ?>"><?php if ($jenis_kelamin === "l") {
                                                                            echo "Laki-Laki";
                                                                          } else {
                                                                            echo "Perempuan";
                                                                          } ?></option>
                  <option value="l">Laki-laki</option>
                  <option value="p">Perempuan</option>
                <?php else : ?>
                  <option value="">-- Pilih Hak Akses --</option>
                  <option value="l">Laki-laki</option>
                  <option value="p">Perempuan</option>
                <?php endif; ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="mb-2 col">
              <div class="form-group">
                <label for="varchar">Agama <?php echo form_error('agama') ?></label>
                <select class="form-control" name="agama" id="agama">
                  <?php if ($agama) : ?>
                    <option selected value="<?php echo $agama; ?>"><?= $agama; ?></option>
                    <option value="Islam">Islam</option>
                    <option value="protestan">Protestan</option>
                    <option value="katolik">katolik</option>
                    <option value="hindu">hindu</option>
                    <option value="buddha">buddha</option>
                    <option value="konghucu">konghucu</option>
                  <?php else : ?>
                    <option value="">-- Pilih Hak Akses --</option>
                    <option value="Islam">Islam</option>
                    <option value="protestan">Protestan</option>
                    <option value="katolik">katoli</option>
                    <option value="hindu">hindu</option>
                    <option value="buddha">buddha</option>
                    <option value="konghucu">konghucu</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>

            <div class="mb-2 col">
              <div class="form-group">
                <label for="varchar">Nomor HP <?php echo form_error('hp') ?></label>
                <input type="text" class="form-control" name="hp" id="hp" placeholder="Nomor HP" value="<?php echo $hp; ?>" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-2 col">
              <div class="form-group">
                <label for="varchar">Pendidikan Terakhir <?php echo form_error('pendidikan_terakhir') ?></label>
                <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" placeholder="pendidikan_terakhir" value="<?php echo $pendidikan_terakhir; ?>" />
              </div>
            </div>
            <div class="mb-2 col">
              <div class="form-group">
                <label for="varchar">Golongan <?php echo form_error('golongan') ?></label>
                <input type="text" class="form-control" name="golongan" id="golongan" placeholder="golongan" value="<?php echo $golongan; ?>" />
              </div>
            </div>
          </div>


          <div class="mb-2 row">
            <div class="form-group">
              <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
              <!-- <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" /> -->
              <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"><?php echo $alamat; ?></textarea>
            </div>
          </div>



          <!-- if there $id_guru -->
          <?php
          if (isset($id_guru)) {
            echo '<input type="hidden" name="id_guru" value="' . $id_guru . '" />';
          }
          ?>
          <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
          <a href="<?php echo site_url('guru') ?>" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</section>
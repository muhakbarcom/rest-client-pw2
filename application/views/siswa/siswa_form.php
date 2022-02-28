<!-- ======= About Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Tambah Data Siswa</h2>
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
                                <label for="varchar">NISN <?php echo form_error('nisn') ?></label>
                                <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Nomor Induk Siswa Nasional" value="<?php echo $nisn; ?>" />
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
                            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                            <!-- <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" /> -->
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"><?php echo $alamat; ?></textarea>
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

                    <div class="mb-2 row">
                        <div class="form-group">
                            <label for="varchar">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
                            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-2 col">
                            <div class="form-group">
                                <label for="varchar">Nama Ayah <?php echo form_error('nama_ayah') ?></label>
                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="nama_ayah" value="<?php echo $nama_ayah; ?>" />
                            </div>
                        </div>
                        <div class="mb-2 col">
                            <div class="form-group">
                                <label for="varchar">Nama Ibu <?php echo form_error('nama_ibu') ?></label>
                                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="nama_ibu" value="<?php echo $nama_ibu; ?>" />
                            </div>
                        </div>
                    </div>

                    <!-- if there $id_siswa -->
                    <?php
                    if (isset($id_siswa)) {
                        echo '<input type="hidden" name="id_siswa" value="' . $id_siswa . '" />';
                    }
                    ?>
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('siswa') ?>" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Kelola Data Guru</h2>
    </div>
    <div class="row">
      <div class="row content col-md-12 justify-content-center">
        <!-- if there flashdata message -->
        <?php if ($this->session->flashdata('message')) : ?>
          <?= $this->session->flashdata('message'); ?>
        <?php endif ?>
      </div>
      <div class="row">
        <div class="col-md-3">
          <a class="btn btn-primary" href="<?= base_url('guru/create'); ?>"><i class="bi bi-plus-circle"></i> Tambah Data</a>
        </div>
      </div>
      <table class="table table-stripped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NIP</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Golongan</th>
            <th scope="col">Agama</th>
            <th scope="col">Jenis Kelamin</th>
            <!-- <th scope="col">Tanggal Lahir</th> -->
            <!-- <th scope="col">Nomor HP</th> -->
            <th scope="col">Pendidikan Terakhir</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($data as $guru) {
            $i;
          ?>
            <tr>
              <th scope="row"><?= $i;
                              $i++; ?></th>
              <td><?= $guru['nip']; ?></td>
              <td><?= $guru['nama']; ?></td>
              <td><?= $guru['alamat']; ?></td>
              <td><?= $guru['golongan']; ?></td>
              <td><?= $guru['agama']; ?></td>
              <td>
                <?php if ($guru['jenis_kelamin'] === "l") {
                  echo "Laki-Laki";
                } else {
                  echo "Perempuan";
                } ?>
              </td>
              <!-- <td><?= $guru['tanggal_lahir']; ?></td> -->
              <!-- <td><?= $guru['hp']; ?></td> -->
              <td><?= $guru['pendidikan_terakhir']; ?></td>
              <td>
                <a href="<?= base_url('guru/read/' . $guru['id_guru']); ?>" class="btn btn-sm btn-primary"><i class="bi bi-search"></i></a>
                <a href="<?= base_url('guru/update/' . $guru['id_guru']); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                <!-- alert before delete -->
                <a href="<?= base_url('guru/delete/' . $guru['id_guru']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
              </td>
            </tr>
          <?php

          }
          ?>
        </tbody>
      </table>
    </div>
  </div>


  </div>
</section>
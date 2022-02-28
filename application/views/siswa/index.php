<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Kelola Data Siswa</h2>
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
                    <a class="btn btn-primary" href="<?= base_url('siswa/create'); ?>"><i class="bi bi-plus-circle"></i> Tambah Data</a>
                </div>
            </div>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Nama Ayah</th>
                        <th scope="col">Nama Ibu</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data as $siswa) {
                        $i;
                    ?>
                        <tr>
                            <th scope="row"><?= $i;
                                            $i++; ?></th>
                            <td><?= $siswa['nisn']; ?></td>
                            <td><?= $siswa['nama']; ?></td>
                            <td><?= $siswa['alamat']; ?></td>
                            <td><?= $siswa['agama']; ?></td>
                            <td>
                                <?php if ($siswa['jenis_kelamin'] === "l") {
                                    echo "Laki-Laki";
                                } else {
                                    echo "Perempuan";
                                } ?>
                            </td>
                            <td><?= $siswa['tanggal_lahir']; ?></td>
                            <td><?= $siswa['nama_ayah']; ?></td>
                            <td><?= $siswa['nama_ibu']; ?></td>
                            <td>
                                <a href="<?= base_url('siswa/read/' . $siswa['id']); ?>" class="btn btn-sm btn-primary"><i class="bi bi-search"></i></a>
                                <a href="<?= base_url('siswa/update/' . $siswa['id']); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <!-- alert before delete -->
                                <a href="<?= base_url('siswa/delete/' . $siswa['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
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
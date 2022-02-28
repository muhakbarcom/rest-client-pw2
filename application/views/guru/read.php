<!-- ======= About Section ======= -->
<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Detail Data Guru</h2>
    </div>
    <div id="" class="row">
      <div class="col-md-3"></div>
      <div class="mt-4 col-md-6 card" data-aos="zoom-in" data-aos-delay="200">
        <div class="p-5">
          <div class="row">
            <div class="col-md-5">NIP</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4"><?= $data['nip']; ?></div>
          </div>
          <div class="mt-2 row ">
            <div class="col-md-5">Nama</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4"><?= $data['nama']; ?></div>
          </div>
          <div class="mt-2 row ">
            <div class="col-md-5">Tanggal Lahir</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4"><?= $data['tanggal_lahir']; ?></div>
          </div>
          <div class="mt-2 row ">
            <div class="col-md-5">Jenis Kelamin</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4"><?= $data['jenis_kelamin']; ?></div>
          </div>
          <div class="mt-2 row ">
            <div class="col-md-5">Agama</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4"><?= $data['agama']; ?></div>
          </div>
          <div class="mt-2 row ">
            <div class="col-md-5">Pendidikan Terakhir</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4"><?= $data['pendidikan_terakhir']; ?></div>
          </div>
          <div class="mt-2 row ">
            <div class="col-md-5">Golongan</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4"><?= $data['golongan']; ?></div>
          </div>
          <div class="mt-2 row ">
            <div class="col-md-5">Alamat</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4"><?= $data['alamat']; ?></div>
          </div>
          <div class="mt-2 row ">
            <div class="col-md-5">Nomor HP</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4"><?= $data['hp']; ?></div>
          </div>
          <div class="mt-2 row">
            <a class="btn bg-primary text-light" href="<?= base_url('guru'); ?>">Kembali</a>
          </div>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</section>
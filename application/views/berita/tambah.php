<!-- partial -->
<div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Tambah Berita</h3>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title mb-5">Form Tambah Berita</h4>
					<?php if($this->session->flashdata('error')): ?>
						<div class="alert alert-danger">
							<?= $this->session->flashdata('error') ?>
						</div>
					<?php endif ?>
                    <form class="forms-sample" action="<?= base_url('BeritaController/add') ?>" method="POST">
						<div class="form-group">
							<label for="judul_berita">Judul Berita</label>
							<input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Masukkan Judul Berita" required />
						</div>

						<div class="form-group">
							<label for="id_kategori">Nama Kategori</label>
							<select name="id_kategori" id="id_kategori" class="form-control">
								<option value="" disabled selected>- Pilih Kategori -</option>
								<?php
									foreach($kategori->result_array() as $kategori){
										?>
											<option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
										<?php
									}
								?>
							</select>
						</div>

					  	<div class="form-group">
							<label for="isi_berita">Isi Berita</label>
							<textarea name="isi_berita" id="isi_berita" cols="30" rows="10" class="form-control"></textarea>
						</div>
						
                      <button type="submit" class="btn btn-primary me-2"> Simpan </button>
                    </form>
					<a href="<?= base_url('BeritaController') ?>"><button class="btn btn-secondary mt-2">Kembali</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->

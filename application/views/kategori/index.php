<div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Kategori</h3>
            </div>
            <div class="row">
				<div class="col-lg-12">
				<?php if($this->session->flashdata('success')): ?>
									<div class="alert alert-success">
										<?= $this->session->flashdata('success') ?>
									</div>
							<?php endif ?>

							<?php if($this->session->flashdata('error')): ?>
									<div class="alert alert-danger">
										<?= $this->session->flashdata('error') ?>
									</div>
							<?php endif ?>
				</div>
              <div class="col-lg-12 grid-margin stretch-card">
			  
                <div class="card">
                  <div class="card-body">
										<div class="row mb-5">
											<div class="col-lg-10">
												<h4 class="card-title">Daftar Kategori</h4>
											</div>
											<div class="col-lg-2">
												<a href="<?= base_url('KategoriController/tambah') ?>"><button class="btn btn-primary">Tambah Kategori</button></a>
											</div>
										</div>
					
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
													<?php
														$no=1;
													foreach($kategori->result_array() as $key): ?>
														<tr>
															<td><?= $no++ ?></td>
															<td><?= $key['nama_kategori'] ?></td>
															<td>
																<a href="<?= base_url('KategoriController/edit/'.$key['id_kategori']) ?>"><button class="btn btn-primary">Edit</button></a>
																<a href="<?= base_url('KategoriController/hapus/'.$key['id_kategori']) ?>" onclick = "return confirm('Yakin hapus kategori?')"><button class="btn btn-danger">Hapus</button></a>
															</td>
														</tr>
													<?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
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

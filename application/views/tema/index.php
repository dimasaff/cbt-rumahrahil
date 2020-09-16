<!-- Begin Page Content -->
<div class="container-fluid ">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3 col-lg">
        <div class="row no-gutters justify-content-center">
            <div class="col-md-9 ">
                <div class="card-body">
                    <h1 class="text-center">Tema</h1>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                    <div class="col-md-5 mt-2 mb-2">
                        <select id="sortKelas" class="form-control" required>
                            <option selected value="all">Tampilkan Semua</option>..</option>
                            <?php foreach ($tingkat as $t) : ?>
                                <option value="<?= $t['id_tingkat']; ?>">Kelas <?= $t['nama_tingkat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <table class="table table-hover">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Tingkat</th>
                                <th scope="col">Nama Tema</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tabeltema">
                            <?php $this->load->view('tema/table_tema', $tema); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Input Tema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="form-theme" novalidate>
                    <div class="form-group">
                        <label for="inputKelas">Kelas</label>
                        <select id="inputKelas" class="form-control" name="classroom" required>
                            <option selected value="">Pilih..</option>
                            <?php foreach ($tingkat as $t) : ?>
                                <option value="<?= $t['id_tingkat']; ?>">SD Kelas <?= $t['nama_tingkat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu Kelas
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNameTheme">Nama Tema</label>
                        <input type="text" class="form-control" id="exampleInputNameTheme" placeholder="Masukkan Nama Tema" name="nameTheme" required>
                        <div class="invalid-feedback">
                            Data Tidak Boleh Kosong
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="btn-save-theme">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
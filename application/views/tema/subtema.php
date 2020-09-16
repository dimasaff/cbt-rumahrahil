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
                    <h1 class="text-center">SubTema</h1>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                    <span>
                        <div class="col-md-5 mt-2 mb-2">
                            <select id="sortTema" class="form-control" name="sortTema" required>
                                <option selected value="all">Tampilkan Semua</option>..</option>
                                <?php foreach ($tema as $t) : ?>
                                    <option value="<?= $t['id_tema']; ?>"><?= $t['nama_tema']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </span>
                    <table class="table table-hover">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama tema</th>
                                <th scope="col">Nama SubTema</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tabelsubtema">
                            <?php $this->load->view('tema/table_subtema', $subtema); ?>
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
                <form class="needs-validation" method="POST" action="<?= base_url('Theme/subtema'); ?>" novalidate>
                    <div class="form-group">
                        <label for="inputKelas">Tema</label>
                        <select id="inputKelas" class="form-control" name="nameTheme" required>
                            <option selected value="">Pilih..</option>
                            <?php foreach ($tema as $t) : ?>
                                <option value="<?= $t['id_tema']; ?>"><?= $t['nama_tema']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu Kelas
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNameTheme">Nama SubTema</label>
                        <input type="text" class="form-control" id="exampleInputSubNameTheme" placeholder="Masukkan Nama SubTema" name="nameSubTheme" required>
                        <div class="invalid-feedback">
                            Data Tidak Boleh Kosong
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
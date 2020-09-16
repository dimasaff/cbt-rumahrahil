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
            <div class="col-md-12 ">
                <div class="card-body">
                    <h1 class="text-center">Jawaban</h1>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                    <span>
                        <div class="col-md-5 mt-2 mb-2">
                            <select id="sortSubtemaJawaban" class="form-control" name="sortSubtema" required>
                                <option selected value="all">Tampilkan semua data</option>..</option>
                                <?php foreach ($subtema as $t) : ?>
                                    <option value="<?= $t['id_subtema']; ?>"><?= $t['nama_subtema']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </span>
                    <table class="table table-hover">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Soal</th>
                                <th scope="col">Option A</th>
                                <th scope="col">Option B</th>
                                <th scope="col">Option C</th>
                                <th scope="col">Option D</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tabeljawaban">
                            <?php $this->load->view('soal/table_jawaban', $jawaban); ?>
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
                <h5 class="modal-title" id="createModalLabel">Input Option Jawaban</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="POST" action="<?= base_url('soal/jawaban') ?>" novalidate>
                    <div class="form-group">
                        <label for="inputSoal">Soal</label>
                        <select id="inputSoal" class="form-control" name="soal" required>
                            <option selected value="">Pilih..</option>
                            <?php foreach ($soal as $su) : ?>
                                <option value="<?= $su['id_soal']; ?>"><?= $su['soal']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu Soal
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputOptionA">Option A</label>
                        <input type="text" class="form-control" id="exampleInputOptionA" placeholder="Masukkan Option Jawaban A" name="option_a" required>
                        <div class="invalid-feedback">
                            Data Tidak Boleh Kosong
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputOptionB">Option B</label>
                        <input type="text" class="form-control" id="exampleInputOptionB" placeholder="Masukkan Option Jawaban B" name="option_b" required>
                        <div class="invalid-feedback">
                            Data Tidak Boleh Kosong
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputOptionC">Option C</label>
                        <input type="text" class="form-control" id="exampleInputOptionC" placeholder="Masukkan Option Jawaban C" name="option_C" required>
                        <div class="invalid-feedback">
                            Data Tidak Boleh Kosong
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputOptionD">Option D</label>
                        <input type="text" class="form-control" id="exampleInputOptionD" placeholder="Masukkan Option Jawaban D" name="option_d" required>
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
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
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($jawaban as $s) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $s['soal']; ?></td>
                                    <td><?= $s['option_a']; ?></td>
                                    <td><?= $s['option_b']; ?></td>
                                    <td><?= $s['option_c']; ?></td>
                                    <td><?= $s['option_d']; ?></td>
                                    <td>
                                        <a href="" class="badge badge-pill badge-success" data-toggle="modal" data-target="#updateModal<?= $s['id_jawaban']; ?>">Update</a>
                                        <a href="" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#deleteModal<?= $s['id_jawaban']; ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
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
<!-- Modal -->
<?php foreach ($jawaban as $so) : ?>
    <div class="modal fade" id="updateModal<?= $so['id_jawaban']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $so['id_jawaban']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $so['id_jawaban']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="POST" action="<?= base_url('soal/updateJawaban/') . $so['id_jawaban']; ?>" novalidate>
                        <div class="form-group">
                            <label for="inputSoal">Soal</label>
                            <select id="inputSoal" class="form-control" name="soal" required>
                                <option selected value="<?= $so['soal_id']; ?>"><?= $so['soal']; ?> </option>
                                <?php foreach ($soal as $s) : ?>
                                    <option value="<?= $s['id_soal']; ?>"><?= $s['soal']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Soal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputOptionA">Option A</label>
                            <input type="text" class="form-control" id="exampleInputOptionA" placeholder="Masukkan Option Jawaban A" name="option_a" value="<?= $so['option_a']; ?>" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputOptionB">Option B</label>
                            <input type="text" class="form-control" id="exampleInputOptionB" placeholder="Masukkan Option Jawaban B" name="option_b" value="<?= $so['option_b']; ?>" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputOptionC">Option C</label>
                            <input type="text" class="form-control" id="exampleInputOptionC" placeholder="Masukkan Option Jawaban C" name="option_c" value="<?= $so['option_c']; ?>" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputOptionC">Option D</label>
                            <input type="text" class="form-control" id="exampleInputOptionC" placeholder="Masukkan Option Jawaban C" name="option_c" value="<?= $so['option_c']; ?>" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputOptionD">Option C</label>
                            <input type="text" class="form-control" id="exampleInputOptionD" placeholder="Masukkan Option Jawaban D" name="option_d" value="<?= $so['option_d']; ?>" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal -->
<?php foreach ($soal as $tm) : ?>
    <div class="modal fade" id="deleteModal<?= $tm['id_soal']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $tm['id_soal']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('soal/deleteJawaban/') . $tm['id_soal']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $tm['id_soal']; ?>">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus soal ini?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ya</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<style>
    /* .invalid class prevents CSS from automatically applying */
    .invalid input:required:invalid {
        background: #BE4C54;
    }

    /* Mark valid inputs during .invalid state */
    .invalid input:required:valid {
        background: #17D654;
    }
</style>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
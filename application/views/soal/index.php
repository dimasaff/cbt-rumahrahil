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
                    <h1 class="text-center">Soal</h1>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                    <span>
                        <div class="col-md-5 mt-2 mb-2">
                            <form action="<?= base_url('soal') ?>" method="post">
                                <select id="sortTema" class="form-control" name="sortSubTema" required>
                                    <option selected value="">Kelompokan berdasarkan subtema</option>..</option>
                                    <?php foreach ($subtema as $t) : ?>
                                        <option value="<?= $t['id_subtema']; ?>"><?= $t['nama_subtema']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button class="btn btn-facebook" type="submit">Refresh</button>
                            </form>
                        </div>
                    </span>
                    <table class="table table-hover">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Subtema</th>
                                <th scope="col">Jawaban Benar</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Soal Text</th>
                                <th scope="col">Soal Gambar</th>
                                <th scope="col">Soal Suara</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($soal as $s) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $s['nama_subtema']; ?></td>
                                    <td><?= $s['jawaban_benar']; ?></td>
                                    <td><?= $s['nama_tingkat'] ?></td>
                                    <td><?= $s['soal']; ?></td>
                                    <td><img src="<?= base_url('assets/img/') . $s['soal_gambar']; ?>" alt="" width="100px" height="100px"></td>
                                    <td><?= $s['soal_suara']; ?></td>
                                    <td>
                                        <a href="" class="badge badge-pill badge-success" data-toggle="modal" data-target="#updateModal<?= $s['id_soal']; ?>">Update</a>
                                        <a href="" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#deleteModal<?= $s['id_soal']; ?>">Delete</a>
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
                <h5 class="modal-title" id="createModalLabel">Input Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('soal'); ?>
                <div class="form-group">
                    <label for="inputSubtema">Subtema</label>
                    <select id="inputSubtema" class="form-control" name="subtema" required>
                        <option selected value="">Pilih..</option>
                        <?php foreach ($subtema as $su) : ?>
                            <option value="<?= $su['id_subtema']; ?>"><?= $su['nama_subtema']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Tolong Pilih Salah Satu subtema
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAnswer">Jawaban Benar</label>
                    <select id="inputAnswer" class="form-control" name="answer" required>
                        <option selected value="">Pilih..</option>
                        <?php foreach ($jawabanBenar as $t) : ?>
                            <option value="<?= $t['id_kunci_jawaban']; ?>"><?= $t['jawaban_benar']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Tolong Pilih Salah Satu jawaban benar
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputClass">Kelas</label>
                    <select id="inputClass" class="form-control" name="class" required>
                        <option selected value="">Pilih..</option>
                        <?php foreach ($kelas as $k) : ?>
                            <option value="<?= $k['id_tingkat']; ?>"><?= $k['nama_tingkat']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Tolong Pilih Salah Satu Kelas
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputQueation">Soal Text</label>
                    <input type="text" class="form-control" id="exampleInputQueation" placeholder="Masukkan Soal" name="question" required>
                    <div class="invalid-feedback">
                        Data Tidak Boleh Kosong
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputQueationPicture">Soal Gambar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputQueationAudio">Soal Audio</label>
                    <input type="text" class="form-control" id="exampleInputQueationAudio" placeholder="Masukkan Soal Audio" name="questionAudio" disabled>
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
<?php foreach ($soal as $so) : ?>
    <div class="modal fade" id="updateModal<?= $so['id_soal']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $so['id_soal']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $so['id_soal']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('soal/updateSoal/' . $so['id_soal']); ?>
                    <div class="form-group">
                        <label for="inputSubtema">Subtema</label>
                        <select id="inputSubtema" class="form-control" name="subtema" required>
                            <option selected value="<?= $so['subtema_id']; ?>"><?= $so['nama_subtema']; ?></option>
                            <?php foreach ($subtema as $su) : ?>
                                <option value="<?= $su['id_subtema']; ?>"><?= $su['nama_subtema']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu subtema
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAnswer">Jawaban Benar</label>
                        <select id="inputAnswer" class="form-control" name="answer" required>
                            <option selected value="<?= $so['kunci_jawaban_id']; ?>"><?= $so['jawaban_benar']; ?></option>
                            <?php foreach ($jawabanBenar as $t) : ?>
                                <option value="<?= $t['id_kunci_jawaban']; ?>"><?= $t['jawaban_benar']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu jawaban benar
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputClass">Kelas</label>
                        <select id="inputClass" class="form-control" name="class" required>
                            <option selected value="<?= $so['tingkat_id']; ?>"><?= $so['nama_tingkat']; ?></option>
                            <?php foreach ($kelas as $k) : ?>
                                <option value="<?= $k['id_tingkat']; ?>"><?= $k['nama_tingkat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu Kelas
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQueation">Soal Text</label>
                        <input type="text" class="form-control" id="exampleInputQueation" placeholder="Masukkan Soal" name="question" value="<?= $so['soal']; ?>" required>
                        <div class="invalid-feedback">
                            Data Tidak Boleh Kosong
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQueationPicture">Soal Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="updateImage">
                            <label class="custom-file-label" for="image"><?= $so['soal_gambar']; ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQueationAudio">Soal Audio</label>
                        <input type="text" class="form-control" id="exampleInputQueationAudio" placeholder="Masukkan Soal Audio" name="questionAudio" value="<?= $so['soal_suara']; ?>" disabled>
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
                <form method="POST" action="<?= base_url('soal/deleteSoal/') . $tm['id_soal']; ?>">
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
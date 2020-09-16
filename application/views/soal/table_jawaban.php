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
                            <label for="exampleInputOptionD">Option D</label>
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
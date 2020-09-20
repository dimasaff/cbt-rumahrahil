<?php $i = 1; ?>
<?php foreach ($soal as $s) : ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $s['kategori']; ?></td>
        <td><?= $s['soal_text']; ?></td>
        <td><img src="<?= base_url('assets/img/') . $s['soal_gambar']; ?>" alt="" width="100px" height="100px"></td>
        <td><?= $s['kunci']; ?></td>
        <td><?= $s['paket']; ?></td>
        <td>
            <a href="" class="badge badge-pill badge-success" data-toggle="modal" data-target="#updateModal<?= $s['id_soal_cpns']; ?>">Update</a>
            <a href="" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#deleteModal<?= $s['id_soal_cpns']; ?>">Delete</a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
<!-- Modal -->
<?php foreach ($soal as $so) : ?>
    <div class="modal fade" id="updateModal<?= $so['id_soal_cpns']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $so['id_soal_cpns']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $so['id_soal_cpns']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('soal/updateSoal/' . $so['id_soal_cpns']); ?>
                    <input type="hidden" name="gambar" value="<?= $so['soal_gambar']; ?>">
                    <div class=" form-group">
                        <label for="inputKategori">Kategori</label>
                        <select id="inputKategori" class="form-control" name="kategori" required>
                            <option selected value="<?= $so['kategori_cpns_id']; ?>"><?= $so['nama_kategori']; ?></option>
                            <?php foreach ($kategori as $su) : ?>
                                <option value="<?= $su['id_kategori_cpns']; ?>"><?= $su['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu Kategori
                        </div>
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
                            <input type="file" class="custom-file-input" id="image" name="updateImage" value="<?= $so['soal_gambar']; ?>">
                            <label class="custom-file-label" for="image"><?= $so['soal_gambar']; ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAnswer">Jawaban Benar</label>
                        <select id="inputAnswer" class="form-control" name="answer" required>
                            <option selected value="<?= $so['kunci_cpns_id']; ?>"><?= $so['jawaban_benar']; ?></option>
                            <?php foreach ($jawabanBenar as $t) : ?>
                                <option value="<?= $t['id_kunci_cpns']; ?>"><?= $t['jawaban_benar']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu jawaban benar
                        </div>
                    <div class="form-group">
                        <label for="inputClass">Paket</label>
                        <select id="inputClass" class="form-control" name="class" required>
                            <option selected value="<?= $so['paket_cpns_id']; ?>"><?= $so['nama_paket']; ?></option>
                            <?php foreach ($kelas as $k) : ?>
                                <option value="<?= $k['id_paket_cpns']; ?>"><?= $k['nama_paket']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu Paket
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
    <div class="modal fade" id="deleteModal<?= $tm['id_soal_cpns']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $tm['id_soal_cpns']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('soal/deleteSoal/') . $tm['id_soal_cpns']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $tm['id_soal_cpns']; ?>">Hapus Data</h5>
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
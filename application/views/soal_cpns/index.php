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
                            <select id="sortKategori" class="form-control" name="sortKategori" required>
                                <option selected value="all">tampilkan semua data</option>..</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $t['id_kategori_cpns']; ?>"><?= $t['nama_kategori_cpns']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </span>
                    <table class="table table-hover">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Jawaban Benar</th>                            
                                <th scope="col">Soal Text</th>
                                <th scope="col">Soal Gambar</th>
                                <th scope="col">Paket</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tabelsoal">
                            <?php $this->load->view('soal_cpns/table_soal', $soal); ?>
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
                    <label for="inputKategori">Kategori</label>
                    <select id="inputKategori" class="form-control" name="kategori" required>
                        <option selected value="">Pilih..</option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['id_kategori_cpns']; ?>"><?= $k['nama_kategori_cpns']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Tolong Pilih Salah Satu Kategori
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAnswer">Jawaban Benar</label>
                    <select id="inputAnswer" class="form-control" name="answer" required>
                        <option selected value="">Pilih..</option>
                        <?php foreach ($jawabanBenar as $t) : ?>
                            <option value="<?= $t['id_kunci_cpns']; ?>"><?= $t['kunci_jawaban_cpns']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Tolong Pilih Salah Satu jawaban benar
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
                    <label for="inputPaket">Paket</label>
                    <select id="inputPaket" class="form-control" name="answer" required>
                        <option selected value="">Pilih..</option>
                        <?php foreach ($Paket as $pkt) : ?>
                            <option value="<?= $pkt['id_paket_cpns']; ?>"><?= $pkt['nama_paket_cpns']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Tolong Pilih Salah Satu Paket
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
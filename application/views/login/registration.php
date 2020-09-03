<div class="row justify-content-center">

    <div class="col-lg-12 mt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi Siswa/Guru</h1>
                            </div>

                            <form method="POST" action="<?= base_url('login/registration'); ?>">
                                <div class="form-group">
                                    <label for="inputName">Nama</label>
                                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Masukkan Nama Lengkap Anda" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="Email" class="form-control" id="inputEmail" name="email" placeholder="Masukkan Email Anda" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword1">Password</label>
                                        <input type="password" class="form-control" id="inputPassword1" name="password1" placeholder="Masukkan Password Anda" value="<?= set_value('password1'); ?>">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword2">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="inputPassword2" name="password2" placeholder="Masukkan Ulang Password Anda" value="<?= set_value('password2'); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputTingkat">Registrasi Sebagai</label>
                                        <select id="inputTingkat" class="form-control" name="regist">
                                            <option selected>Pilih...</option>
                                            <?php foreach ($role as $r) : ?>
                                                <option value="<?= $r['id_role']; ?>"><?= $r['role']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('regist', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputKelas">Kelas</label>
                                        <select id="inputKelas" class="form-control" name="classroom">
                                            <option selected>Pilih..</option>
                                            <?php foreach ($tingkat as $t) : ?>
                                                <option value="<?= $t['id_tingkat']; ?>">SD Kelas <?= $t['nama_tingkat']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('classroom', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSchool">Asal Sekolah</label>
                                    <input type="text" class="form-control" id="inputSchool" name="school" placeholder="Masukkan Asal Sekolah" value="<?= set_value('school'); ?>">
                                    <?= form_error('school', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Alamat</label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Masukkan Alamat Anda" value="<?= set_value('address'); ?>">
                                    <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('login'); ?>">Sudah Memiliki Akun...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
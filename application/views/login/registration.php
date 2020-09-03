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

                            <form method="POST" action="<?= base_url(''); ?>">
                                <div class="form-group">
                                    <label for="inputName">Nama</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Masukkan Nama Lengkap Anda">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="Email" class="form-control" id="inputEmail" placeholder="Masukkan Email Anda">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword1">Password</label>
                                        <input type="Password" class="form-control" id="inputPassword1" placeholder="Masukkan Password Anda">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword2">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="inputPassword2" placeholder="Masukkan Ulang Password Anda">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputTingkat">Registrasi Sebagai</label>
                                        <select id="inputTingkat" class="form-control">
                                            <option selected>Pilih...</option>
                                            <option value="">Guru</option>
                                            <option value="">Siswa</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputGrade">Pilih Jenjang Sekolah</label>
                                        <select id="inputGrade" class="form-control">
                                            <option selected>Pilih..</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputKelas">Kelas</label>
                                        <select id="inputKelas" class="form-control">
                                            <option selected>Pilih..</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSchool">Asal Sekolah</label>
                                    <input type="text" class="form-control" id="inputSchool" placeholder="Masukkan Asal Sekolah">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Alamat</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Masukkan Alamat Anda">
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
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
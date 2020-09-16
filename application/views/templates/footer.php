            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Private Coding</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
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
                $(document).ready(function() {
                    $('.custom-file-input').on('change', function() {
                        let fileName = $(this).val().split('\\').pop();
                        $(this).next('.custom-file-label').addClass("selected").html(fileName);
                    });
                    $('#sortKelas').on('change', function() {
                        var a = $('#sortKelas').val();
                        tema(a);
                    });
                    //memancing combobox
                    $('#sortTema').on('change', function() {
                        var a = $('#sortTema').val();
                        subtema(a);
                    });
                    $('#sortSubTema').on('change', function() {
                        var a = $('#sortSubTema').val();
                        soal(a);
                    });
                    $('#sortSubtemaJawaban').on('change', function() {
                        var a = $('#sortSubtemaJawaban').val();
                        jawaban(a);
                    });

                    $('#btn-save-theme').on('click', function() {
                        const a = $('#form-theme').serialize();
                        console.log(a);
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url('Theme'); ?>",
                            data: $('#form-theme').serialize(),
                            success: function(response) {
                                document.location.href = "<?= base_url('theme'); ?>"
                            }
                        });
                    });
                });

                function tema(a) {
                    //alert(a);
                    var xhttp;
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("tabeltema").innerHTML = this.responseText;

                        }
                    };
                    xhttp.open("POST", "<?= base_url('theme/viewTableTema/'); ?>" + a, true);
                    xhttp.send();
                }

                function subtema(a) {
                    // alert(a);
                    var xhttp;
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("tabelsubtema").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("POST", "<?= base_url('theme/viewTableSubtema/'); ?>" + a, true);
                    xhttp.send();
                }

                function soal(a) {
                    var xhttp;
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("tabelsoal").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("POST", "<?= base_url('soal/viewTableSoal/'); ?>" + a, true);
                    xhttp.send();
                    //alert(a);
                }

                function jawaban(a) {
                    var xhttp;
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("tabeljawaban").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("POST", "<?= base_url('soal/viewTableJawaban/'); ?>" + a, true);
                    xhttp.send();
                    //alert(a);
                }
            </script>
            </body>

            </html>
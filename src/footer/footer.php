<!-- Script JS bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/3a61d8c882.js" crossorigin="anonymous"></script>
<!-- <script src="https://https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script> -->
<script>
    $(document).ready(function () {

        if (window.location.pathname == '/sppPayment/src/show/showdatauser.php' ||
            window.location.pathname == '/sppPayment/src/edit/edituser.php' ||
            window.location.pathname == '/sppPayment/src/add/adduser.php') { // user
            const userMessage = document.getElementById("user").value;

            // add
            if (userMessage === 'add-user-failed') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Data user gagal disimpan!',
                })
            } else if (userMessage === 'add-user-empty') {
                Swal.fire(
                    'Warnig',
                    'Masih ada data yang kosong',
                    'info'
                )
            } else if (userMessage === 'add-user-success') {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data user berhasil disimpan',
                    showConfirmButton: false,
                    timer: 2000
                })
            } 

            // edit
            if (userMessage === 'edit-user-failed') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Data user gagal diedit!',
                })
            } else if (userMessage === 'edit-user-empty') {
                Swal.fire(
                    'Warnig',
                    'Masih ada data yang kosong',
                    'info'
                )
            } else if (userMessage === 'edit-user-success') {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data user telah diedit',
                    showConfirmButton: false,
                    timer: 2000
                })
            }

            // delete
            $('.delete-user').click(function (e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda yakin akan menghapus data ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {

                    if (result.isConfirmed) {
                        var username = $(this).closest('tr').find('.username').text();
                        $('#username').val(username);
                        document.getElementById("get-delete-user").click();
                    }
                })
            })

            if (userMessage === 'delete-user-failed') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Data user gagal dihapus!',
                })
            } else if (userMessage === 'delete-user-cant-access') {
                Swal.fire(
                    'Warnig',
                    'Anda tidak memiliki akses!',
                    'info'
                )
            } else if (userMessage === 'delete-user-success') {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data user telah dihapus',
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        } else if (window.location.pathname == '/sppPayment/src/show/showdatawclass.php' ||
            window.location.pathname == '/sppPayment/src/edit/editwclass.php' ||
            window.location.pathname == '/sppPayment/src/add/addwclass.php') { // wclass
            const wclassMessage = document.getElementById("wclass").value;

            // add
            if (wclassMessage === 'add-wclass-failed') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Data walikelas gagal disimpan!',
                })
            } else if (wclassMessage === 'add-wclass-empty') {
                Swal.fire(
                    'Warnig',
                    'Masih ada data yang kosong',
                    'info'
                )
            } else if (wclassMessage === 'add-wclass-success') {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data walikelas berhasil disimpan',
                    showConfirmButton: false,
                    timer: 2000
                })
            } 
            
            // edit
            if (wclassMessage === 'edit-wclass-failed') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Data walikelas gagal diedit!',
                })
            } else if (wclassMessage === 'edit-wclass-empty') {
                Swal.fire(
                    'Warnig',
                    'Masih ada data yang kosong',
                    'info'
                )
            } else if (wclassMessage === 'edit-wclass-success') {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data walikelas telah diedit',
                    showConfirmButton: false,
                    timer: 2000
                })
            }

            // delete
            $('.delete-wclass').click(function (e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda yakin akan menghapus data ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {

                    if (result.isConfirmed) {
                        var getClass = $(this).closest('tr').find('.class').text();
                        $('#class').val(getClass);
                        document.getElementById("get-delete-wclass").click();
                    }
                })
            })

            if (wclassMessage === 'delete-wclass-failed') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Data user gagal dihapus!',
                })
            } else if (wclassMessage === 'delete-wclass-cant-access') {
                Swal.fire(
                    'Warnig',
                    'Anda tidak memiliki akses!',
                    'info'
                )
            } else if (wclassMessage === 'delete-wclass-success') {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data user telah dihapus',
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        }
        

        // $('.pay-button').click(function (e) {
        //     e.preventDefault();

        //     const href = $(this).attr('href');

        //     Swal.fire({
        //         title: 'Yakin?',
        //         text: "Anda yakin siswa ini membayar tagihan!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya, Bayar!'
        //     }).then((result) => {
        //         if (result.value) {
        //             document.location.href = href;
        //             var message = document.getElementById('message').value;

        //             if (message === 'pay success') {
        //                 Swal.fire({
        //                     position: 'center',
        //                     icon: 'success',
        //                     title: 'Siswa tersebut telah membayar',
        //                     showConfirmButton: false,
        //                     timer: 3000
        //                 })
        //             } else if (message === 'pay failed') {
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Oops...',
        //                     text: 'Pembayaran gagal!',
        //                     footer: '<a href="">Why do I have this issue?</a>'
        //                 })
        //             }
        //         }
        //     })
        // });
    });
</script>
<div class="card-body text-center" style="margin-top: 300px;">
    <footer>
        <footer>
        <p>Author: ©Shirohaku Dev Team-2022</p>
                <p><i class="fa-solid fa-envelope"></i> Contact us: <a href="mailto:shirohakudteam@gmail.com">shirohakudteam@gmail.com</a></p>
        </footer>
    </footer>
</div>
</body>
</html>
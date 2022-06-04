<!-- Script JS bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/3a61d8c882.js" crossorigin="anonymous"></script>
<script src="https://https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script>
    $(document).ready(function () {
        $('.pay-button').click(function (e) {
            e.preventDefault();
            var nis = $(this).closest('tr').find('.stud-nis').text();
            // console.log(nis);
            $('#payment-nis').val(nis);
            $('#pay-modal').modal('show');
        });

        $('.delete-user').click(function (e) {
            e.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    var username = $(this).closest('tr').find('.username').text();
            //         // console.log(username);
            //         $('#username').val(username);
            //           document.getElementById("get-delete-user").click();
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
            // Swal.fire({
            //     title: 'Apakah Anda Yakin?',
            //     text: "Anda yakin akan menghapus data ini!",
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Ya, Hapus!'
            //     }).then((result) => {
            //     if (result.isConfirmed) {
            //         var username = $(this).closest('tr').find('.username').text();
            //         // console.log(username);
            //         $('#username').val(username);
            //         document.getElementById("get-delete-user").click();
            //         Swal.fire({
            //             position: 'center',
            //             icon: 'success',
            //             title: 'Your work has been saved',
            //             showConfirmButton: false,
            //             timer: 2000
            //         })
            //     }
            // })
        });

        // $('.delete-wclass').click(function (e) {
        //     e.preventDefault();

        //     Swal.fire({
        //         title: 'Apakah Anda Yakin?',
        //         text: "Anda yakin akan menghapus data ini!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya, Hapus!'
        //         }).then((result) => {
        //         if (result.isConfirmed) {
        //             var class = $(this).closest('tr').find('.class').text();
        //             $('#class').val(class);
        //             document.getElementById("get-delete-wclass").click();
        //             Swal.fire({
        //                 position: 'center',
        //                 icon: 'success',
        //                 title: 'Your work has been saved',
        //                 showConfirmButton: false,
        //                 timer: 2000
        //             })
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
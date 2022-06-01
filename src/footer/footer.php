<!-- Script JS bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.pay-button').click(function (e) {
            e.preventDefault();
            var nis = $(this).closest('tr').find('.stud-nis').text();
            // console.log(nis);
            $('#payment-nis').val(nis);
            $('#exampleModal').modal('show');
        });
    });
</script>
<div class="card-body text-center" style="margin-top: 300px;">
    <footer>
        <footer>
        <p>Author: ©Shirohaku Dev Team-2022</p>
                <p>Contact us: <a href="mailto:shirohakudteam@gmail.com">shirohakudteam@gmail.com</a></p>
        </footer>
    </footer>
</div>
</body>
</html>
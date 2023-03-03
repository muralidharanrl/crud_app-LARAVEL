<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Holiday </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Libraries Stylesheet -->
    <link href=" {{ url('admin1/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href=" {{ url('admin1/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Template Stylesheet -->
    <link href=" {{ url('admin1/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Template Javascript -->

</head>

<body>
    <div class="position-relative bg-white d-flex p-0">
        <div class="content" style="margin-left:10px;padding:0;">
            @include('mcm.layout.header_fullscreen')
            @yield('content')
        </div>
    </div>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                // td = tr[i].getElementsByTagName("td")[0];
                alltags = tr[i].getElementsByTagName("td");
                isFound = false;
                for (j = 0; j < alltags.length; j++) {
                    td = alltags[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            j = alltags.length;
                            isFound = true;
                        }
                    }
                }
                if (!isFound && tr[i].className !== "header") {
                    tr[i].style.display = "none";
                }
            }
        }
        //inactive
        $('.inactive').on('click', function() {
            var urls = $(this).attr('data-urls');
            Swal.fire({
                text: "Do you really want to Inactive?",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Inactive it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: urls,
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            Toast.fire({
                                icon: 'error',
                                title: 'Inactive successfully'
                            })
                            setTimeout(function() {
                                window.location.reload(1);
                            }, 3000);
                        }
                    });
                }
            })
        });
        //active
        $('.active').on('click', function() {
            var urls = $(this).attr('data-urls');
            Swal.fire({
                text: "Do you really want to Active?",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Active it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: urls,
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Active successfully'
                            })
                            setTimeout(function() {
                                window.location.reload(1);
                            }, 3000);
                        }
                    });
                }
            })
        });
    </script>
    @if (Session::has('success'))
        <script>
            var msg = "<?php echo Session::get('success'); ?>";
            Toast.fire({
                icon: 'success',
                title: msg
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            var msg = "<?php echo Session::get('error'); ?>";
            Toast.fire({
                icon: 'error',
                title: msg
            })
        </script>
    @endif
    @if (Session::has('warning'))
        <script>
            var msg = "<?php echo Session::get('warning'); ?>";
            Toast.fire({
                icon: 'warning',
                title: msg
            })
        </script>
    @endif
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src=" {{ url('admin1/lib/chart/chart.min.js') }}"></script>
    <script src=" {{ url('admin1/lib/easing/easing.min.js') }}"></script>
    <script src=" {{ url('admin1/lib/waypoints/waypoints.min.js') }}"></script>
    <script src=" {{ url('admin1/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src=" {{ url('admin1/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src=" {{ url('admin1/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    @yield('scripts')
</body>

</html>

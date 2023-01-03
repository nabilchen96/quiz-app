<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    <title>
        Quizz App
    </title>
</head>

<body>
    <!-- container -->
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0
        min-vh-100">
            <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
                <!-- Card -->
                <div class="card smooth-shadow-md">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <a href="../index.html"><img src="../assets/images/brand/logo/logo-primary.svg"
                                    class="mb-2" alt=""></a>
                            <p class="mb-6">Please enter your user information.</p>
                        </div>
                        <!-- Form -->
                        <form id="formLogin">
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Username or email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    placeholder="Email address here" required="">
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="**************" required="">
                            </div>
                            <!-- Checkbox -->
                            <div class="d-lg-flex justify-content-between align-items-center mb-4">
                                <div class="form-check custom-checkbox">
                                    <input type="checkbox" class="form-check-input" id="rememberme">
                                    <label class="form-check-label" for="rememberme">Remember
                                        me</label>
                                </div>

                            </div>
                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" id="btnLogin" class="btn btn-primary">Sign in</button>

                                    <button style="display: none; background: #0d6efd;" id="btnLoginLoading"
                                        class="btn btn-info btn-moodle text-white" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>

                                    </button>
                                </div>

                                <div class="d-md-flex justify-content-between mt-4">
                                    <div class="mb-2 mb-md-0">
                                        <a href="sign-up.html" class="fs-5">Create An
                                            Account </a>
                                    </div>
                                    <div>
                                        <a href="forget-password.html"
                                            class="text-inherit
                        fs-5">Forgot your password?</a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="{{ asset('back/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/feather-icons/dist/feather.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/prismjs/components/prism-core.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/prismjs/components/prism-markup.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/prismjs/plugins/line-numbers/prism-line-numbers.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>

    <!-- clipboard -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>

    <!-- Theme JS -->
    <script src="{{ asset('back/assets/js/theme.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

    <script>
        formLogin.onsubmit = (e) => {

            e.preventDefault();

            const formData = new FormData(formLogin);
            document.getElementById(`btnLogin`).style.display = "none";
            document.getElementById(`btnLoginLoading`).style.display = "block";

            axios({
                    method: 'post',
                    url: '/loginProses',
                    data: formData,
                })
                .then(function(res) {
                    //handle success
                    if (res.data.responCode == 1) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil Login',
                            timer: 1000,
                            showConfirmButton: false,
                            // text: res.data.respon
                        })

                        setTimeout(() => {
                            location.reload(res.data.respon);
                        }, 1500);

                    } else {

                        Swal.fire({
                            icon: 'warning',
                            title: 'Ada kesalahan',
                            text: `${res.data.respon}`,
                        })
                    }
                })
                .catch(function(res) {
                    //handle error
                    console.log(res);
                }).then(function() {
                    // always executed              
                    document.getElementById(`btnLogin`).style.display = "block";
                    document.getElementById(`btnLoginLoading`).style.display = "none";

                });

        }
    </script>

</body>

</html>

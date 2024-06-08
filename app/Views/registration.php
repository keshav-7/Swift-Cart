<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Swift Cart</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">        
    </head>
    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->
        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <!-- <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123 Street, New York</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                        <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                    </div>
                </div>
            </div> -->
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="\" class="navbar-brand">
                        <h1 class="text-primary display-6">Swift Cart</h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="\" class="nav-item nav-link active">Home</a>
                            <a href="shop" class="nav-item nav-link">Shop</a>
                            <a href="shopDetail" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart" class="dropdown-item">Cart</a>
                                    <a href="checkout" class="dropdown-item">Checkout</a>
                                    <a href="testimonial" class="dropdown-item">Testimonial</a>
                                    <a href="error_404" class="dropdown-item">404 Page</a>
                                </div>
                            </div>
                            <a href="contact" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal">
                                <i class="fas fa-search text-primary"></i>
                            </button>
                            <a href="cart" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                            </a>
                            <a href="register" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End --> 
        
        <!-- Login -->
        <div class="wrapper">
            <div class="title-text">
                <div class="title login"></div>
                <div class="title signup"></div>
                <?php if(session()->getFlashdata('error')) { ?>
                <div class="error">
                    <?= session()->getFlashdata('error') ?>
                    <?= validation_list_errors() ?>
                </div>
                <?php } else if(session()->getFlashdata('success')) { ?>
                <div class="success">
                    <?= session()->getFlashdata('success') ?>
                </div>
                <?php } ?>                 
            </div>
            <div class="form-container">
                <div class="slide-controls">
                    <input type="radio" name="slide" id="login" checked>
                    <input type="radio" name="slide" id="signup">
                    <label for="login" class="slide login">Login</label>
                    <label for="signup" class="slide signup">Signup</label>
                    <div class="slider-tab"></div>
                </div>
                <div class="form-inner">
                    <form class="login form" name="login" action="login" method="post" id="login_form" autocomplete="off">
                        <div class="field">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="field">
                            <input type="password" name="password" minlength="8" maxlength="12" placeholder="Password" required>
                        </div>
                        <div class="pass-link" style="text-align: center;" >
                            <a href="#">Forgot password?</a>
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Login">
                        </div>
                        <!-- <div class="signup-link">Not a member? <a href="">Signup now</a></div> -->
                    </form>
                    <form class="signup form" name="signup" action="signup" method="post" id="signup_form" autocomplete="off">
                        <div class="field">
                            <input type="name" name="name" placeholder="Name" required>
                        </div> 
                        <div class="field">
                            <input type="mobile" name="mobile" placeholder="Mobile" minlength="10" maxlength="10" onkeypress='return isNumber(event);' required>
                        </div>                                               
                        <div class="field">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="field">
                            <input type="password" name="password" placeholder="Password" minlength="8" maxlength="12" required>
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Signup">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- End -->
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = (()=>{
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (()=>{
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (()=>{
            signupBtn.click();
            return false;
        });

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            console.log(charCode);
            console.log("2684");
            console.log(evt.charcode);
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }        
    </script>
</html>
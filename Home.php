<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RefuSHE Applications Portal</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/card.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

  

    <style>
        .card-grid {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
        }

        .banner-img {
            width: 100%;
            height: 60px;
            background-color: #ffffff;
            border-radius: 10px 10px 0 0;
        }

        .profile-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .card-body {
            text-align: center;
        }

        .card-body .badge {
            margin-bottom: 10px;
            font-size: 14px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        .card-footer {
            margin-top: auto;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }

        .card-footer .view-more {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .card-footer .view-more:hover {
            text-decoration: underline;
        }
        .page-item.active .page-link {
            background: #052766 !important;
            border-color: #052766 !important;
        }
        .services .icon-box:hover::before {
            background: #052766 !important;
        }
        .services .icon i, .e-code, .page-link {
            color: #052766;
        }
        .back-to-top i {
            background: #052766;
        }

        button {
            background: #052766;
        }
        .client-text, .nav-menu a:hover {
            color: #052766 !important;
        }

            .section-title h2 {
            color: #9c6f1c;
            border-left: 5px solid #052766;
        }
         .section-title h2::before,
         .section-title h2::after {
	        background: #9c6f1c;
        }
        #createAccount:hover,
        #loginMain:hover,
        .back-to-top i:hover {
            box-shadow: 0 1rem 1rem rgba(0,0,0,.15);
            background: #052766 !important;
            color: #fff !important;
            transform: scale(1.025)
        }
        #hero .btn-get-started:hover {
            background: #052766;
            box-shadow: 0 1rem 1rem rgba(0,0,0,.15);
            transform: scale(1.025)
        }
        .active.hvr-underline-from-center > a {
            color: #052766 !important;
        }

        #hero .btn-get-started, #createAccountMain {
            color: #052766;
            border: 2px solid #052766;
        }

        #createAccountMain {
             background-color: #fff !important;
        }
        .back-to-top i, .back-to-top i:hover, .btn-primary, .hvr-underline-from-center:before, .client-bg, #createAccountMain:hover {
            background: #052766 !important;
        }

        #createAccountMain:hover {
            color: #fff !important;
        }
        .btn.btn-primary:hover {
            box-shadow: 0 1rem 1rem rgba(0,0,0,.15);
            height: 2px;
            transform: scale(1.025)
        }
        .btn-secondary, .btn-dark, .btn-info, .contact .php-email-form button[type="submit"] {
            background: #9c6f1c !important;
            border-color: #9c6f1c !important;
        }
            .btn.btn-info:hover,
            #sendMessage:hover,
            .btn-outline-success:hover,
            .btn-secondary:hover,
            .btn-dark:hover,
            .btn-info:hover {
                background: #9c6f1c !important;
                color: #fff !important;
                box-shadow: 0 1rem 1rem rgba(0,0,0,.15);
                transform: scale(1.025)
            }

            .ri-mail-send-line {
                display: inline-block;
                width: 1em;
                height: 1em;
                --svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23000' d='M21 3a1 1 0 0 1 1 1v16.007a1 1 0 0 1-.992.993H2.992A.993.993 0 0 1 2 20.007V19h18V7.3l-8 7.2l-10-9V4a1 1 0 0 1 1-1zM8 15v2H0v-2zm-3-5v2H0v-2zm14.566-5H4.434L12 11.81z'/%3E%3C/svg%3E");
                background-color: currentColor;
                -webkit-mask-image: var(--svg);
                mask-image: var(--svg);
                -webkit-mask-repeat: no-repeat;
                mask-repeat: no-repeat;
                -webkit-mask-size: 100% 100%;
                mask-size: 100% 100%;
                }

                .carbon--back-to-top {
                    display: inline-block;
                    width: 1em;
                    height: 1em;
                    --svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Cpath fill='%23000' d='M16 14L6 24l1.4 1.4l8.6-8.6l8.6 8.6L26 24zM4 8h24v2H4z'/%3E%3C/svg%3E");
                    background-color: currentColor;
                    -webkit-mask-image: var(--svg);
                    mask-image: var(--svg);
                    -webkit-mask-repeat: no-repeat;
                    mask-repeat: no-repeat;
                    -webkit-mask-size: 100% 100%;
                    mask-size: 100% 100%;
                    }
    </style>
    <script>
    let primColor = "#052766";

        if (primColor)
        {
            document.documentElement.style.cssText = "--clr-primary: "+primColor;
        }

      

    </script>
</head>

<body>
    <input type="hidden" id="primary-color" value=#052766 />
    <input type="hidden" id="secondary-color" value=#9c6f1c />
    <!-- ======= Header ======= -->
  
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="row col-lg-12 mb-5">
            <div class="col-lg-4">
                <h2>
                    <a href="index.html" class="text-dark font-weight-bold">
                        <span>RefuSHE Kenya</span>
                    </a>
                </h2>
            </div>
            <div class="col-lg-8">
                <nav class="nav-menu d-none d-lg-block border-1 ms-auto">
                    <ul class="d-flex justify-content-end align-items-center">
                        <li class="hvr-underline-from-center active " id="home">
                            <a href="Home/PublicProgrammes.php">Find Courses</a>
                        </li>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <li class="get-started">
                                <a id="loginMain" href="Backend/logout.php">Log Out</a>
                            </li>
                        <?php else: ?>
                            <li class="get-started">
                                <a id="createAccountMain" href="Home/Register.html">Create Account</a>
                            </li>
                            <li class="get-started">
                                <a id="loginMain" href="Home/Login.html">Log In</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

    <main>
     
<section id="hero" class="d-flex align-items-center">
    <input type="hidden" id="primary-color" value=#052766 />
    <input type="hidden" id="secondary-color" value=#9c6f1c />


    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up"> Education for Empowerment </h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">We are proud to offer vocational courses to refugee girls, empowering them with essential skills for a brighter future. No formal qualifications are required to join our programs. We believe in providing opportunities for all, regardless of your educational background. Join us to unlock your potential and create new opportunities for yourself and your community.</h2>
                <div data-aos="fade-up" data-aos-delay="800">
                        <a class="btn-get-started text-white border-0 scrollto mr-3 mb-3" id="createAccount" href="Home/Register.html">Create Account</a>
                    <a class="btn-get-started scrollto" id="login" href="Home/PublicProgrammes.php">View Courses</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                <img src="img2.png" class="img-fluid animated" alt="RefuShe">
            </div>
        </div>
    </div>

</section>
    <section id="services" class="services">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2 class="md-6">How to Apply for our Courses</h2>

            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bxl-dribbble">1</i></div>
                        <h4 class="title"><a href="index.html">Step 1: Find a Course</a></h4>
                        <p class="description">Search for a course to enroll to</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-file">2</i></div>
                        <h4 class="title"><a href="index.html">Step 2: Create Account</a></h4>
                        <p class="description">Create a Login Account Profile</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-tachometer">3</i></div>
                        <h4 class="title"><a href="index.html">Step 3: Submit your Application</a></h4>
                        <p class="description">Update Application Profile and Submit your Application</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section id="features" class="features">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>SEPTEMBER 2024 INTAKE OPEN</h2>
                </div>
                <div class="row">
                    <?php include 'Backend/fetch_courses_home.php'; ?>
                </div>
                <div class="text-center">
                    <a class="btn btn-info border-0 rounded-pill" href="Home/PublicProgrammes.php">View More Courses</a>
                </div>
            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Contact Us</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-about">
                            <h3>RefuSHE Kenya</h3>
                            <p> Education for Empowerment </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="info">
                            <div>
                            </div>
                            <div class="ml-2">
                            </div>
                            <div class="ml-3">
                            </div>
                            <div class="ml-4">
                                <i class="ri-mail-send-line"></i>
                                <p>admissions@refushe.org</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
                        <form method="post" id="enquiry" role="form" class="php-email-form" action="https://application.kibu.ac.ke/Enquiry/SaveEnquiry">
                            <div class="form-group">
                                <input type="text" name="Name" class="form-control" id="Name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="Email" id="Email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="Phone" id="Phone" placeholder="Your Phone number" data-rule="minlen:10" data-msg="Please enter a valid phone" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="Message" id="Message" rows="5" data-rule="minlen:30" data-msg="Please write something for us not less than 30 chracters" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit" id="sendMessage">Send Message</button></div>
                        <input name="__RequestVerificationToken" type="hidden" value="CfDJ8CDAy67nCthLtdW4kvview3P9VWqfRkUDSuRAdAgIYnO1XaH28_O0FvRKFdQ0CW4uKflhJ9BEoNz8oyBFGSW6re5B-XG8X8AQ2D-zaM_2AkeMQZfxmnCysa-kCbxEybT1yndz3mttsvJB4NDdu7NnaI" /></form>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <a href="Home.php" class="carbon--back-to-top"><i class="carbon--back-to-top"></i></a>

    <script>
    $(document).ready(function () {
    var opt = "";
		$("." + opt + "-link").addClass("bottom-links-active");
		var isOpen = false;
		$("#userButton").click(function () {
			isOpen = !isOpen;
			if (isOpen) {
				$("#userMenu").removeClass("hidden");
			}
			else
				$("#userMenu").addClass("hidden");
        });

        changeColor();

        $('.hvr-underline-from-center').on("click", function () {
            debugger
            $('.hvr-underline-from-center').removeClass('active');
            let activeLink = $(this).attr('id');
            $("#" + activeLink).addClass('active');
            sessionStorage.setItem("active-link", activeLink);
        })
        const activeLink = sessionStorage.getItem("active-link");
        if (activeLink) {
            $('.hvr-underline-from-center').removeClass('active');
            $("#" + activeLink).addClass('active');
        }
        window.onscroll = function () {
            if (activeLink) {
                $('.hvr-underline-from-center').removeClass('active');
                $("#" + activeLink).addClass('active');
            }
        }

        $("#sendMessage").on("click", () => {
            debugger
            if ($('#enquiry').valid()) {
                console.log("success!");
            }
            else {
                console.log("error!");
            }
        })
	});
    </script>

    <script>
          debugger
        let imageBanner = document.querySelectorAll(".banner-img");
        if (imageBanner) {
            imageBanner.forEach(f => {

                f.style.backgroundImage = "url(/uploads/9e60f5e1-32d8-4af8-9226-086eb7df8f39.png)";
            })
        }
        function changeColor() {
            var pcolor = $('#primary-color').val();
            var scolor = $('#secondary-color').val();


            $('.services .icon-box::before').css('background-color', pcolor);
            $('#loginMain').css('background-color', pcolor);
            $('#findCourses').css('color', pcolor);


            $('.btn-info').css('background-color', pcolor);
            $('.btn-success').css('background-color', scolor);
            $('.btn-dark').css('background-color', scolor);

            $('.icon-box:hover').css('background-color', pcolor);
            $('.badge-primary').css('background-color', pcolor);
            $('.ri-mail-send-line').css('color', pcolor);
            $('.ri-map-pin-line').css('color', pcolor);
            $('.text-inf').css('color', scolor);
        }


    </script>

    
    <script>
    $(document).ready(function () {
    var opt = "";
		$("." + opt + "-link").addClass("bottom-links-active");
		var isOpen = false;
		$("#userButton").click(function () {
			isOpen = !isOpen;
			if (isOpen) {
				$("#userMenu").removeClass("hidden");
			}
			else
				$("#userMenu").addClass("hidden");
        });

        changeColor();
	});
    </script>

    <script>
        function changeColor() {
            var pcolor = $('#primary-color').val();
            var scolor = $('#secondary-color').val();

            $('#btn-Course').css('background-color', pcolor);
            $('#createAccount').css('background-color', pcolor);
            $('#createAccountMain').css('background-color', pcolor);
            $('#loginMain').css('background-color', pcolor);

            $('#sendMessage').css('background-color', pcolor);
            $('#findCourses').css('color', pcolor);
            $('.icon-box:hover').css('background-color', pcolor);
            $('.badge-primary').css('background-color', pcolor);
            $('.ri-mail-send-line').css('color', pcolor);
            $('.ri-map-pin-line').css('color', pcolor);
            $('.text-inf').css('color', scolor);



            $('.btn-info').css('background-color', pcolor);
            $('.btn-primary').css('background-color', pcolor);
            $('.btn-success').css('background-color', scolor);
            $('.btn-dark').css('background-color', scolor);

        }


    </script>
;

</body>

</html>


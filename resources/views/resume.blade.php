<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>My resume</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->;
  <link href="assets/img/favicon.png;)}}" rel="icon">
  <link href="assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{('assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <h1 class="logo me-auto me-lg-0"><a href="#">Makinde Tolu Resume</a></h1>
    </div>

  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container" data-aos="fade-up">
      @if($message = Session::get('message'))
            <div class ="alert alert-success" style="margin-top: 30px;">
              {{$message}}
            </div>
        @endif
        <div class="row">
          <div class="col-lg-6">
            <h3 class="resume-title">Summary</h3>
            <div class="resume-item pb-0">
              <h4>{{$user->name}}</h4>
              <p>
              <ul>
                <li>{{json_decode($user->description)->phone_number}}</li>
                <li>{{$user->email}}</li>
              </ul>
              </p>
            </div>
            <h3 class="resume-title">Education</h3>
            <div class="resume-item">
              <h4>{{json_decode($user->education)->degree}}</h4>
              <h5>{{json_decode($user->education)->date}}</h5>
            </div>
          </div>
          <div class="col-lg-6">
            <h3 class="resume-title">Professional Experience</h3>
            <div class="resume-item">
              <h4>{{json_decode($user->experience)->title}}</h4>
              <h5>{{json_decode($user->experience)->date}}</h5>
              <p>
              <ul>
                <li>{{json_decode($user->experience)->details[0]}}</li>
                <li>{{json_decode($user->experience)->details[1]}}</li>
                <li>{{json_decode($user->experience)->details[2]}}</li>
                <li>{{json_decode($user->experience)->details[3]}}</li>
                </ul>
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->
    <div class="card-body container">
        <form method="post" action="https://teemak-resume.herokuapp.com/sendmail">
          @csrf
            <div class="form-group">
                <label for="name" class="text-center"><b>Name</b></label>
                <input type="text" name="name" placeholder="Name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email" class="text-center"><b>Your Email Address</b></label>
                <input type="email" name="email" placeholder="Email Address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password" class="text-center"><b>About Yourself</b></label>
                <textarea row="5" col="5" name="message"  class="form-control" required></textarea>
            </div>
                <button type="submit" style="width: 100%; margin-top: 20px;" class="btn btn-success" >Contact me</button>
        </form>
    </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Makinde</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{('assets/js/main.js')}}"></script>

</body>

</html>

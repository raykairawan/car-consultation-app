<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Consultation Dashboard</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/bootstrap.css') }}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link href="{{ asset('assets2/css/font-awesome.min.css" rel="stylesheet') }}" />
    <link href="{{ asset('assets2/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets2/css/style.css') }}" rel="stylesheet" />
</head>
<body>
 <div class="hero_area">
     <!-- header section strats -->
     <header class="header_section">
         <div class="header_bottom">
             <div class="container-fluid">
                 <nav class="navbar navbar-expand-lg custom_nav-container ">
                     <a class="navbar-brand" href="{{ route('user.index') }}">
              <span>
                CarConsultation
              </span>
                     </a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                         <span class=""> </span>
                     </button>

                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav  ">
                             <li class="nav-item active">
                                 <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="#services">Services</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="#about"> About</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="#contact_us">Contact Us</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="{{ route('login') }}"> <i class="fa fa-user" aria-hidden="true"></i> Login Admin</a>
                             </li>
                         </ul>
                     </div>
                 </nav>
             </div>
         </div>
     </header>
     <!-- end header section -->
     <!-- slider section -->
     <section class="slider_section ">
         <div class="slider_bg_box">
             <img src="{{ asset('assets2/images/repair.png') }}" alt="">
         </div>
         <div id="customCarousel1" class="carousel slide" data-ride="carousel">
             <div class="carousel-inner">
                 <div class="carousel-item active">
                     <div class="container ">
                         <div class="row">
                             <div class="col-md-7 ">
                                 <div class="detail-box">
                                     <h1>
                                         Memastikan Kondisi <br>
                                         Mobil Tetap Optimal
                                     </h1>
                                     <p>
                                         Melalui pengecekan rutin oleh profesional, Anda bisa mengidentifikasi potensi
                                         masalah sebelum menjadi lebih besar. Konsultasi yang tepat dapat membantu
                                         menjaga mesin mobil tetap dalam kondisi prima, memastikan efisiensi bahan bakar,
                                         serta memperpanjang usia kendaraan Anda.
                                     </p>
                                     <div class="btn-box">
                                         <a href="{{ route('user.consultation.index') }}" class="btn1">
                                             Konsultasi Sekarang
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="carousel-item">
                     <div class="container ">
                         <div class="row">
                             <div class="col-md-7 ">
                                 <div class="detail-box">
                                     <h1>
                                         Keamanan Berkendara <br> Lebih Terjamin
                                     </h1>
                                     <p>
                                         Konsultasi dengan mekanik profesional dapat mendeteksi tanda-tanda kerusakan
                                         yang dapat membahayakan keselamatan Anda di jalan. Dengan pemeriksaan berkala,
                                         Anda bisa menghindari kecelakaan atau masalah teknis yang tidak terduga saat
                                         berkendara.
                                     </p>
                                     <div class="btn-box">
                                         <a href="{{ route('user.consultation.index') }}" class="btn1">
                                             Konsultasi Sekarang
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="carousel-item">
                     <div class="container ">
                         <div class="row">
                             <div class="col-md-7 ">
                                 <div class="detail-box">
                                     <h1>
                                         Meningkatkan Nilai <br> Jual Mobil
                                     </h1>
                                     <p>
                                         Jika Anda berencana untuk menjual mobil di masa depan, melakukan konsultasi
                                         mobil secara berkala bisa meningkatkan nilai jual kendaraan Anda. Mobil yang
                                         selalu dirawat dengan baik dan memiliki catatan servis yang lengkap akan lebih
                                         menarik bagi calon pembeli.
                                     </p>
                                     <div class="btn-box">
                                         <a href="{{ route('user.consultation.index') }}" class="btn1">
                                             Konsultasi Sekarang
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <ol class="carousel-indicators">
                 <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                 <li data-target="#customCarousel1" data-slide-to="1"></li>
                 <li data-target="#customCarousel1" data-slide-to="2"></li>
             </ol>
         </div>

     </section>
     <!-- end slider section -->
 </div>


 <!-- service section -->

 <section class="service_section layout_padding" id="services">
     <div class="service_container">
         <div class="container ">
             <div class="heading_container">
                 <h2>
                     Our <span>Services</span>
                 </h2>
                 <p>
                     Adapun beberapa service yang bisa kami berikan diantaranya adalah:
                 </p>
             </div>
             <div class="row">
                 <div class="col-md-6 ">
                     <div class="box ">
                         <div class="img-box">
                             <img src="{{ asset('assets2/images/s1.png') }}" alt="">
                         </div>
                         <div class="detail-box">
                             <h5>
                                 Ganti Oli Rutin
                             </h5>
                             <p>
                                 Dengan melakukan penyesuaian pada sistem pembakaran, filter, dan busi,
                                 mobil Anda akan berjalan lebih efisien, lebih hemat bahan bakar, serta
                                 mengurangi risiko kerusakan mendadak.
                             </p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 ">
                     <div class="box ">
                         <div class="img-box">
                             <img src="{{ asset('assets2/images/s2.png') }}" alt="">
                         </div>
                         <div class="detail-box">
                             <h5>
                                 Pemeriksaan Rem
                             </h5>
                             <p>
                                 Rem adalah bagian vital untuk keselamatan berkendara. Pemeriksaan dan
                                 perawatan rem secara berkala memastikan fungsi pengereman tetap responsif.
                             </p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 ">
                     <div class="box ">
                         <div class="img-box">
                             <img src="{{ asset('assets2/images/s3.png') }}" alt="">
                         </div>
                         <div class="detail-box">
                             <h5>
                                 Tune-Up Mesin
                             </h5>
                             <p>
                                 Dengan melakukan penyesuaian pada sistem pembakaran, filter, dan busi, mobil
                                 Anda akan berjalan lebih efisien, lebih hemat bahan bakar, serta mengurangi
                                 risiko kerusakan mendadak.
                             </p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 ">
                     <div class="box ">
                         <div class="img-box">
                             <img src="{{ asset('assets2/images/s4.png') }}" alt="">
                         </div>
                         <div class="detail-box">
                             <h5>
                                 Balancing & Spooring
                             </h5>
                             <p>
                                 Layanan balancing dan spooring sangat penting yaitu
                                 memastikan roda berputar dengan seimbang dan sejajar. Anda dapat
                                 mengurangi keausan ban dan meningkatkan kontrol kendaraan.
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <!-- end service section -->


 <!-- about section -->

 <section class="about_section layout_padding-bottom" id="about">
     <div class="container  ">
         <div class="row">
             <div class="col-md-6">
                 <div class="detail-box">
                     <div class="heading_container">
                         <h2>
                             About <span>Us</span>
                         </h2>
                     </div>
                     <p>
                         CarConsultation adalah layanan profesional yang berkomitmen untuk memberikan solusi
                         terbaik dalam perawatan dan perbaikan mobil Anda. Berlokasi di Jl. Cimanuk No.303,
                         kami hadir untuk memastikan kendaraan Anda selalu dalam kondisi prima dengan berbagai
                         layanan, mulai dari pengecekan rutin, tune-up mesin, hingga pemeriksaan rem dan
                         balancing. Tim kami terdiri dari teknisi berpengalaman yang siap memberikan konsultasi
                         dan perawatan berkualitas untuk keamanan dan kenyamanan berkendara Anda.
                         Di CarConsultation, kepuasan pelanggan adalah prioritas utama kami.
                     </p>
                 </div>
             </div>
             <div class="col-md-6 ">
                 <div class="img-box">
                     <img src="{{ asset('assets2/images/about-img.jpg') }}" alt="">
                 </div>
             </div>

         </div>
     </div>
 </section>

 <!-- end about section -->

 <!-- contact section -->
 <section class="contact_section" id="contact_us">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-4 col-md-5 offset-md-1">
                 <div class="heading_container">
                     <h2>
                         Contact Us
                     </h2>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-4 col-md-5 offset-md-1">
                 <div class="form_container contact-form">
                     <form action="">
                         <div>
                             <input type="text" placeholder="Your Name" />
                         </div>
                         <div>
                             <input type="text" placeholder="Phone Number" />
                         </div>
                         <div>
                             <input type="email" placeholder="Email" />
                         </div>
                         <div>
                             <input type="text" class="message-box" placeholder="Message" />
                         </div>
                         <div class="btn_box">
                             <button>
                                 SEND
                             </button>
                         </div>
                     </form>
                 </div>
             </div>
             <div class="col-lg-7 col-md-6 px-0">
                 <div class="map_container">
                     <div class="map">
                         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12281.64563419125!2d107.87248716046876!3d-7.208815871223664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68b0f6bf3262ab%3A0x5ce638e63bf1b8ef!2sBudi%20Jaya%20Mobilindo!5e0!3m2!1sen!2sid!4v1724476844335!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- end contact section -->

 <!-- info section -->

 <section class="info_section layout_padding2">
     <div class="container">
         <div class="row">
             <div class="col-md-6 col-lg-3 info_col">
                 <div class="info_contact">
                     <h4>
                         Address
                     </h4>
                     <div class="contact_link_box">
                         <a href="">
                             <i class="fa fa-map-marker" aria-hidden="true"></i>
                             <span>
                  Jl. Cimanuk No.303, Pataruman, Kec. Tarogong Kidul, Kabupaten Garut, Jawa Barat 44151
                </span>
                         </a>
                         <a href="">
                             <i class="fa fa-phone" aria-hidden="true"></i>
                             <span>
                  Call +62 81272920102
                </span>
                         </a>
                         <a href="">
                             <i class="fa fa-envelope" aria-hidden="true"></i>
                             <span>
                  carconsultation@gmail.com
                </span>
                         </a>
                     </div>
                 </div>
                 <div class="info_social">
                     <a href="">
                         <i class="fa fa-facebook" aria-hidden="true"></i>
                     </a>
                     <a href="">
                         <i class="fa fa-twitter" aria-hidden="true"></i>
                     </a>
                     <a href="">
                         <i class="fa fa-linkedin" aria-hidden="true"></i>
                     </a>
                     <a href="">
                         <i class="fa fa-instagram" aria-hidden="true"></i>
                     </a>
                 </div>
             </div>
             <div class="col-md-6 col-lg-3 info_col">
                 <div class="info_detail">
                     <h4>
                         Info
                     </h4>
                     <p>
                         Not Already Yet.
                     </p>
                 </div>
             </div>
             <div class="col-md-6 col-lg-2 mx-auto info_col">
                 <div class="info_link_box">
                     <h4>
                         Links
                     </h4>
                     <div class="info_links">
                         <a class="active" href="">
                             Home
                         </a>
                         <a class="" href="">
                             About
                         </a>
                         <a class="" href="">
                             Services
                         </a>
                         <a class="" href="">
                             Contact Us
                         </a>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-lg-3 info_col ">
                 <h4>
                     Subscribe
                 </h4>
                 <form action="#">
                     <input type="text" placeholder="Enter email" />
                     <button type="submit">
                         Subscribe
                     </button>
                 </form>
             </div>
         </div>
     </div>
 </section>

 <!-- end info section -->

 <!-- footer section -->
 <section class="footer_section">
     <div class="container">
         <p>
             &copy; <span id="displayYear"></span> All Rights Reserved By
             <a href="https://html.design/">CarConsultation</a>
         </p>
     </div>
 </section>
 <!-- footer section -->

 <script type="text/javascript" src="{{ asset('assets2/js/jquery-3.4.1.min.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
 </script>
 <script type="text/javascript" src="{{ asset('assets2/js/bootstrap.js') }}"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
 </script>
 <script type="text/javascript" src="{{ asset('assets2/js/custom.js') }}"></script>
</body>
</html>

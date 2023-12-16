<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>My portfolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

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
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        @if (!empty($heroes))
          <img src="{{$heroes->imageUrl($heroes->img)}}" alt="" style="width: 200px;height:180px"  class="img-fluid rounded-circle">
          <h1 class="text-light"><a href="index.html">{{$heroes->firstName}}</a></h1>
        @else
          <img src="storage/images/empty/empty.svg" alt="" class="img-fluid rounded-circle">
          <h1 class="text-light"><a href="index.html">Name Not Found</a></h1>
        @endif

        {{-- Social Network --}}
        
        <div class="social-links mt-3 text-center">
          {{-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> --}}
          <a href="https://www.facebook.com/roosvelt.anaguesonna.716/?locale=fr_FR" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="https://www.instagram.com/kings_game_.2000/" class="instagram"><i class="bx bxl-instagram"></i></a>
          {{-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> --}}
          <a href="https://www.linkedin.com/in/roosvelt-anague-sonna-5b058a208/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      {{-- NavBar --}}
      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="{{route('dashboard')}}" class="nav-link scrollto active"><i class="bx bx-folder"></i> <span>Dashboard</span></a></li>
          <li><a href="#hero" class="nav-link scrollto "><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->


  {{-- background image --}}
  <style>

#hero {
  width: 100%;
  height: 100vh;
  background: url("{{($heroes)?$heroes->imageUrl($heroes->img) : 'storage/images/empty/empty.svg'}}") top center;
  background-size: cover;
}

  </style>

  @if (!empty($heroes))
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
      <div class="hero-container ms-5" data-aos="fade-in">
        <h1 class="fs-1">{{$heroes->firstName.' '.$heroes->lastName}}</h1>
        <p>I'm <span class="typed" data-typed-items="{{$heroes->job}}"></span></p>
      </div>
    </section>
  @else
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
      <div class="hero-container" data-aos="fade-in">
        <h1>Data Not Found</h1>
        <p>Please go to the dashboard to add <span class="typed" data-typed-items="First Name, Last Name, Jobs"></span></p>
      </div>
    </section>
  @endif
 <!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
   
    @if (!empty($about))
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="{{$about->imageUrl($about->image)}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3 class="text-uppercase">{{$about->title}}.</h3>
            <p class="fst-italic">
             {{$about->shortText}}.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{date('d M Y', strtotime($about->birthday))}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>{{$about->website}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{$about->phone}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{$about->city}}</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{$about->age}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>{{$about->degree}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>PhEmailone:</strong> <span>{{$about->email}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>{{$about->freelance}}</span></li>
                </ul>
              </div>
            </div>
            <p>
              {{$about->longText}}
            </p>
          </div>
        </div>

      </div>
    </section>
    @else
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="{{asset('assets/img/profile-img.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>UI/UX Designer &amp; Web Developer.</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>1 May 1995</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.example.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+123 456 7890</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>New York, USA</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>30</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Master</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>PhEmailone:</strong> <span>email@example.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                </ul>
              </div>
            </div>
            <p>
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p>
          </div>
        </div>

      </div>
    </section>
    @endif


    <!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    {{-- <section id="facts" class="facts">
      <div class="container">

        <div class="section-title">
          <h2>Facts</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Happy Clients</strong> consequuntur quae</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Projects</strong> adipisci atque cum quia aut</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hours Of Support</strong> aut commodi quaerat</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hard Workers</strong> rerum asperiores dolor</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Facts Section --> --}}

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Skills</h2>
          <p>I have a wide range of skills in web development, among others:</p>
        </div>

     

      <div class="row skills-content">

      @forelse ($skills as $item)

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

        <div class="progress">
          <span class="skill">{{$item->skillName}} <i class="val">{{$item->percentage}}%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="{{$item->percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
          
      @empty

          <div class="col-lg-6" data-aos="fade-up">

            <div class="progress">
              <span class="skill">HTML <i class="val">100%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">CSS <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">JavaScript <i class="val">75%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

            <div class="progress">
              <span class="skill">PHP <i class="val">80%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
  
            <div class="progress">
              <span class="skill">WordPress/CMS <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
  
            <div class="progress">
              <span class="skill">Photoshop <i class="val">55%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
  
          </div>
      @endforelse

       

      </div>
          
     

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Resume</h2>
          <p>Here is the different information to know about me:</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title">Sumary</h3>

            @if (!empty($sumary))
            <div class="resume-item pb-0">
              <h4>{{$sumary->name}}</h4>
              <p><em>{{$sumary->shortText}}</em></p>
              <ul>
                <li>{{$sumary->address}}</li>
                <li>{{$sumary->phone}}</li>
                <li>{{$sumary->email}}</li>
              </ul>
            </div>
            @else
            <div class="resume-item pb-0">
              <h4>No data</h4>
              <p><em>No data</em></p>
              <ul>
                <li>No data</li>
                <li>no data</li>
                <li>no data</li>
              </ul>
            </div>
            @endif
           
{{-- education --}}
            <h3 class="resume-title">Education</h3>
            @forelse ($education as $item)
            <div class="resume-item">
              <h4>{{$item->degree}}</h4>
              <h5>{{$item->year}}</h5>
              <p><em>{{$item->shoolPlace}}</em></p>
              <p>{{$item->shortText}}</p>
            </div>
            @empty
            <div class="resume-item">
              <h4>Licence en genie logiciel</h4>
              <h5>2022 - 2023</h5>
              <p><em>L'institut universaitaire des leaders, Dl</em></p>
              <p>formation professionelle de qualite</p>
            </div>
            <div class="resume-item">
              <h4>BTS</h4>
              <h5>2019 - 2021</h5>
              <p><em>L'institut universitaire des grandes ecoles des tropiques</em></p>
              <p>Un bonne organisation et un parcour tres intense</p>
            </div>
            @endforelse
           
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Professional Experience</h3>
              @forelse ($experience as $items)
              <div class="resume-item">
                <h4>{{$items->job}}</h4>
                <h5>{{$items->year}}</h5>
                <p><em>{{$items->workplace}}</em></p>
                <ul>
                  @forelse ($items->mission as $item)
                      <li>{{$item->shortText}}</li>
                  @empty
                      <li><span class="text-danger text-uppercase fw-bold text-center">please go to the dashoard and specify what tasks you performed during this work</span></li>
                  @endforelse
                 
                </ul>
              </div>
             
              @empty
              <div class="resume-item">
              <h2 class="text-success fw-bold">I have copetence but </h2>
                <div class="d-flex justify-content-center  mt-2 align-items-center">
                  <img src="storage/images/empty/empty.svg" alt="" width="65" height="75" class="img-fluid me-2">
                  <h4 class="text-danger ">I do not yet have professional experience</h4>
                </div>
              </div>
             
              @endforelse
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Below you will find a list of the different projects I have done as a web developer.</p>
        </div>


        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

          @forelse ($portfolio as $item)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{$item->imageUrl($item->image)}}" width="100%" height="100%"  class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="{{$item->imageUrl($item->image)}}"  data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="{{route('project.show',['portfolio'=>$item->id])}}" title="More Details">more</a>
              </div>
            </div>
            <p><a href="{{route('project.show',['portfolio'=>$item->id])}}">{{$item->projectName}}</a></p>
          </div>
          @empty

          <div class="d-flex justify-content-center  mt-2 align-items-center">
            <img src="storage/images/empty/empty.svg" alt="" width="65" height="75" class="img-fluid me-2">
            <h4 class="text-danger ">I do not yet have project</h4>
          </div>
              
          @endforelse

         


        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p class="fw-bold text-capitalize">I am a web developer with no experience yet but with extensive skills in the sector. I am available for projects of any size, and I am always ready for new challenges.</p>
        </div>
  
        <div class="row">

          @forelse ($service as $item)
          <div class="col-lg-4 col-md-6 icon-box"  data-aos="fade-up">
            <div class="icon"><img class="rounded-circle" src="{{$item->imageUrl($item->image)}}" width="70" height="70"   alt=""> </div>
            <h4 class="title"><a href="">{{$item->title}}</a></h4>
            <p class="description">{{$item->shortText}}</p>
          </div>
          @empty
              
         
          <div class="d-flex justify-content-center  mt-2 align-items-center">
            <img src="storage/images/empty/empty.svg" alt="" width="65" height="75" class="img-fluid me-2">
            <h4 class="text-danger ">Please go to the dashoard and insert the services</h4>
          </div>
          @endforelse
        </div>
  
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p ><li>I am a competent, reliable and professional web developer.</li>
            <li>I am always ready to help others and share my knowledge.</li>
            <li>I am a positive and constructive collaborator.</li>
            <li>I am always looking for new ways to improve my skills and knowledge.</li>
            <li>I am always willing to go the extra mile to meet the needs of my team</li></p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            @forelse ($testimonial as $item)
            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      {{$item->shortText}}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{$item->imageUrl($item->image)}}" width="70" height="75"  class="testimonial-img" alt="">
                <h3>{{$item->name}}</h3>
                <h4>{{$item->job}}</h4>
              </div>
            </div><!-- End testimonial item -->
            @empty
            <div class="d-flex justify-content-center  mt-2 align-items-center">
              <img src="storage/images/empty/empty.svg" alt="" width="65" height="75" class="img-fluid me-2">
              <h4 class="text-danger ">I do not yet have professional experience</h4>
            </div>
            @endforelse

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
   @include('message.create')
  
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy;  <strong><span></span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
         <a href="https://bootstrapmade.com/"></a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/typed.js/typed.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
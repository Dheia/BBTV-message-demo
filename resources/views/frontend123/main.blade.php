<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- STYLE CSS -->
    {{-- <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" /> --}}
    @include('frontend.section.head')
</head>

<body class="app sidebar-mini">
    <!-- GLOBAL-LOADER -->
    <!-- <div id="global-loader">
        <img src="{{ URL::asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>  -->
    <!-- /GLOBAL-LOADER -->
    <!-- PAGE -->
    @include('frontend.section.header')
   
    @yield('content')
    @include('frontend.section.footer')
    
    @include('frontend.section.footer-scripts')
    <script type="text/javascript">
        // ============================== Carousel slider =====================================

const images = document.querySelectorAll(".carousel-image");
const dots = document.querySelectorAll(".dot");
const prevBtn = document.querySelector("#prevBtn");
const nextBtn = document.querySelector("#nextBtn");

const nextSlide = () => {
  const currentSlide = document.querySelector(".current");
  currentSlide.classList.remove("current");
  if (currentSlide.nextElementSibling) {
    currentSlide.nextElementSibling.classList.add("current");
  } else {
    images[0].classList.add("current");
  }

  dotsNextSlide();
};

const prevSlide = () => {
  const currentSlide = document.querySelector(".current");
  currentSlide.classList.remove("current");
  if (currentSlide.previousElementSibling) {
    currentSlide.previousElementSibling.classList.add("current");
  } else {
    images[images.length - 1].classList.add("current");
  }

  dotsPrevSlide();
};

nextBtn.addEventListener("click", k => {
  nextSlide();
});
prevBtn.addEventListener("click", k => {
  prevSlide();
});

// =================== Dots ===========================
const dotsNextSlide = () => {
  const dotActive = document.querySelector(".active");

  dotActive.classList.remove("active");
  if (dotActive.nextElementSibling) {
    dotActive.nextElementSibling.classList.add("active");
  } else {
    dots[0].classList.add("active");
  }
  dotActive.classList.remove("active");
};

const dotsPrevSlide = () => {
  const dotActive = document.querySelector(".active");

  dotActive.classList.remove("active");
  if (dotActive.previousElementSibling) {
    dotActive.previousElementSibling.classList.add("active");
  } else {
    dots[dots.length - 1].classList.add("active");
  }
  dotActive.classList.remove("active");
};

const dotJump = () => {
  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      const dotActive = document.querySelector(".active");
      dotActive.classList.remove("active");
      dot.classList.add("active");

      const imageTarget = images[index];
      const currentSlide = document.querySelector(".current");

      currentSlide.classList.remove("current");
      imageTarget.classList.add("current");
    });
  });
};
dotJump();
    </script>
</body>

</html>

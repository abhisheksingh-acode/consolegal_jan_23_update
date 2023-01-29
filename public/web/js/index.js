// sticky navbar
$(document).scroll(() => {
  var ht = document
    .querySelector(".navbar")
    .nextElementSibling.getBoundingClientRect().top;

  $(".navbar").next().addClass("position-relative");
  if (ht < 40) {
    $(".navbar").addClass("sticky-nav");
  } else {
    $(".navbar").removeClass("sticky-nav");
  }
});

// our service tab switch ajax
$(document).ready(() => {
  $(".tabs").click(function () {
    // tab bar active class
    $(".active-li").removeClass("active-li");
    $(".tabs").css("animation-name", "");

    $(this).addClass("active-li");
    let activeIndex = $(this).index();

    $(this).css("animation-name", "fade");

    // check radio
    $("li input[type=radio]").removeAttr("checked");
    $(".active-li input").attr("checked", "checked");

    // load container when click
    $(".tab-container").addClass("d-none");
    $(".tab-container .col-md-6").css("animation-name", "zoom-in");
    $(".tab-container").eq(activeIndex).removeClass("d-none");
  });
});

////////////////// swiper blog slider
let swiperBlog = new Swiper(".swiper-container-blog", {
  slidesPerView: "auto",
  spaceBetween: 30,
  loop: true,
  speed: 1000,

  autoplay: {
    delay: 2300,
    disableOnInteraction: false,
  },
  breakpoints: {
    1180: {
      slidesPerView: "auto",
      spaceBetween: 30,
    },
    920: {
      slidesPerView: "auto",
      spaceBetween: 30,
    },
    576: {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
    },
  },
  navigation: {
    nextEl: ".swiper-next-btn",
    prevEl: ".swiper-prev-btn",
  },
});

////////////////// swiper testimonial slider
let swiperTestimonial = new Swiper(".swiper-container-testimonial", {
  effect: "coverflow",
  loop: true,
  centeredSlides: true,
  spaceBetween: 60,
  speed: 1200,
  slidesPerView: "auto",
  loop: true,
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 50,
    modifier: 2,
    slideShadows: true,
  },
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
  },
  autoplay: {
    delay: 1000,
    disableOnInteraction: false,
  },
});

//////////////////// swiper choose slider
let swiperWhyChoose = new Swiper(".swiper-container-why-choose", {
  loop: true,
  centeredSlides: true,
  spaceBetween: 70,
  speed: 2500,
  grabCursor: true,
  slidesPerView: "auto",
  navigation: {
    nextEl: ".swiper-next-btn",
  },
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
  },
  // autoplay: {
  //   delay: 2000,
  //   disableOnInteraction: false,
  // },
  breakpoints: {
    centeredSlides: true,
    spaceBetween: 30,
    speed: 2500,
    grabCursor: true,
    slidesPerView: 1,
  },
});

//////////////////// swiper most popular post
let swiperPopularPost = new Swiper(".swiper-popular-post", {
  loop: true,
  // centeredSlides: true,
  spaceBetween: 40,
  speed: 2500,
  grabCursor: true,
  slidesPerView: "auto",
  navigation: {
    nextEl: ".swiper-btn-next",
    prevEl: ".swiper-btn-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
  },
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
});

////////////// scroll bar tab indicator
$(document).ready(() => {
  let count = $(".bar-item").length;

  for (let i = 0; i < count; i++) {
    let id = $(".scroll-section").eq(i).attr("id");
    $(".bar-item")
      .eq(i)
      .attr("href", "#" + id);
  }

  $(document).scroll(function () {
    let el = $(".scroll-section");

    // find active el
    el.each(function (index, val) {
      var offset = $(this).offset();
      var top = offset.top;
      let dist = top - $(window).scrollTop();

      // add active class
      if (dist < 200 && dist > 0) {
        $(".active-li").removeClass("active-li");
        $(".bar-list li").eq(index).addClass("active-li");
      }
    });
  });
});

///////////// cards tilt Animation
$(document).ready(() => {
  // header icon cards
  $(".inner").tilt({
    maxTilt: 20,
    perspective: 1400,
    easing: "cubic-bezier(.03,.98,.52,.99)",
    speed: 1200,
    glare: true,
    maxGlare: 0.2,
    scale: 1.1,
  });

  // services cards
  $(".inner-card").tilt({
    maxTilt: 15,
    perspective: 1200,
    easing: "cubic-bezier(.03,.98,.52,.99)",
    speed: 1200,
    glare: true,
    maxGlare: 0.2,
    scale: 1,
  });
});

////// our process accordions

$(document).ready(function () {
  $(".accordions .title:not(.show) + .dropdown-content").hide();

  $(".accordions .accordion-box").click(function () {
    $(".accordions .show").removeClass("show");
    let index = $(this).index();
    $(".accordions .title").eq(index).addClass("show");

    $(".accordions .title:not(.show) + .dropdown-content").hide();
    $(".accordions .show + .dropdown-content").show();
  });
});

////////// faqs
$(document).ready(function () {
  $(".topic li").click(function (e) {
    e.preventDefault();
    // tab bar active class
    $(".topic .active").removeClass("active");

    $(this).addClass("active");
    let activeIndex = $(this).index();

    // load container when click
    $(".topic-content .active").removeClass("active");
    $(".topic-content .active-container").eq(activeIndex).addClass("active");
  });
});


$(document).ready(function(){

    $(document).on("submit", "#join-form", function(e) {

      e.preventDefault();

      const formData = $(this).serialize();

      $.ajax({
        type:"post",
        url : joinUrl,
        data:formData,
        success: function(data){
          // console.log(data);
            alert(data.msg)
            $("#join-form").find("input").val('')
        },
        error: function(err){
          console.log(err);
        }
      })
    })
})

<script src="./js/jquery.min.js"></script>
<script src="./js/jquery-3.2.1.min.js"></script>
<script src="./js/all.min.js"></script>
<script src="./js/fontawesome.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/main.js"></script>
<script src="./js/owl.carousel.min.js"></script>
<script>
    $('.card-slider').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        nav:true,
        dots:false,
        navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>',],
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:false,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:true
            },
            1000:{
                items:3,
                nav:true,
                loop:true
            }
        }
    })
</script>

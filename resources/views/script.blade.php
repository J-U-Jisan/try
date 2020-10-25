
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
<script src="{{ asset('js/fontawesome.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
<script>
    $('.event-slider').slick({
        lazyLoad: 'ondemand',
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrow: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
</script>
<script>
    //Get the button
    var mybutton = document.getElementById("hiBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<script type="text/javascript">
    window.addEventListener("load", function(){
        const loader = document.querySelector(".loader");
        loader.className += "  hidden";
    });
</script>
<script>
    function changeClass() {
        var x = document.getElementsByClassName('card-full-body container mb-5 home-event');
        var width = (window.innerWidth > 0) ? window.innerWidth : screen.Width;
        console.log("Helllo World =>" + width);
        if(x.length > 0) {
            if(width <= 768) {
                $(x).removeClass('container mb-5');
            }
        }
        var event = document.getElementsByClassName('event container');
        console.log("Helllo World =>" + width);
        if(event.length > 0) {
            if(width <= 768) {
                $(event).removeClass('container');
            }
        }
    }
</script>

<!--Chatbot Inegration -->
<!--
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId            : 'your-app-id',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v8.0'
        });
    };
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js"></script>
-->

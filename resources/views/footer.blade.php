<footer class="footer">
    <div class="container clearfix section-padding">
        <div class="col float-left col-md-5">
            <div style="display: inline-flex;">
                <img src="{{ asset('images/logo.png') }}" alt="Try" class="col-7 col-md-4">
                <span class="title-try" style="color:white;">Be the reason someone smiles today</span>
            </div>
            <br><br>
            <p>Bidyanondo (Learn for Fun) is an educational voluntary organization in Bangladesh. The official registration No. is S-12258/2015). Bidyanondo has been running by 40 officers and hundreds of volunteers, whose mission is t...</p>
            <br>
            <a href="#" style="color: #00a78e !important; font-weight: bold;" >READ MORE <i class="fas fa-long-arrow-alt-right"></i></i></a>
            <br>
            <br>
            <a href="https://www.facebook.com/try.kuet" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.youtube.com/channel/UCqXcrHhJSRc0l8Te4-KGhjg" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="mailto:trykuet@gmail.com" target="_blank"><i class="fab fa-google"></i></a>
            <a href="https://www.linkedin.com/company/try-kuet/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.instagram.com/try_kuet/" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="col float-left col-md-2">
            <h5 class="title">VISIT</h5>
            <a href="{{ route('event') }}"><p>Events</p></a>
            <a href="{{ route('partner') }}"><p>Sponsor</p></a>
        </div>
        <div class="col float-left col-md-2">
            <h5 class="title">HELP</h5>
            <a href="{{ route('contact') }}"><p>Contact us</p></a>
            <a href=""><p>About Us</p></a>
            <a href="{{ route('member') }}"><p>Members</p></a>
        </div>
        <div class="col float-left col-md-3">
            <h5 class="title">CONTACT</h5>
            <p><i class="fas fa-map-marker-alt"></i>&nbsp; : KUET, 9203 Khulna</p>
            @foreach($footer_list as $footer)
            <p><i class="fas fa-phone-alt"></i>&nbsp; :&nbsp {{ $footer->mobile }}</p>
            @endforeach
            @foreach($footer_list as $footer)
                @if($footer->email)
                    <p><i class="fab fa-google"></i>&nbsp; :&nbsp{{ $footer->email }}</p>
                @endif
            @endforeach
        </div>
    </div>
    <div class="developed"> <p>Developed by <a target="_blank" href="https://www.linkedin.com/in/jalal-uddin-jisan/"><font>Jalal Uddin Jisan</font></a> </p> </div>
</footer>

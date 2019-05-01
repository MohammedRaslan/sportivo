@extends('Frontview.inc.header')
@section('body')
	<!-- Hero-area -->
    <div class="hero-area section">

<!-- Backgound Image -->
<div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('FrontEnd') }}/img/background.jpg)"></div>
<!-- /Backgound Image -->

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
            <ul class="hero-area-tree">
                <li><a href="index">Home</a></li>
                <li>Contact</li>
            </ul>
            <h1 class="white-text">Get In Touch</h1>

        </div>
    </div>
</div>

</div>
<!-- /Hero-area -->

<!-- Contact -->
<div id="contact" class="section">

<!-- container -->
<div class="container">

    <!-- row -->
    <div class="row">

        <!-- contact form -->
        <div class="col-md-6">
            <div class="contact-form">
                
                <h4>Send A Message</h4>
            <form action="{{ route('contactpage') }}" >
                {{ csrf_field() }}
                    <input class="input" type="text" name="name" placeholder="Name" required>
                    <input class="input" type="email" name="email" placeholder="Email" required>
                    <input class="input" type="text" name="subject" placeholder="Subject" required>
                    <textarea class="input" name="message" placeholder="Enter your Message" required></textarea>
                    <button class="main-button icon-button pull-right">Send Message</button>
                </form>
            </div>
            
        </div>
        <!-- /contact form -->
    
        <!-- contact information -->
        <div class="col-md-5 col-md-offset-1">
            <h4>Contact Information</h4>
            <ul class="contact-details">
                <li><i class="fa fa-envelope"></i>Seven_M@gmail.com</li>
                <li><i class="fa fa-phone"></i>0111-1295-259</li>
                <li><i class="fa fa-map-marker"></i>4476 Clement Street</li>
            </ul>

            <!-- contact map -->
            <div id="contact-map"></div>
            <!-- /contact map -->

        </div>
        <hr>
        @if(!Auth::guest())
        <!-- contact information -->
        <div class="row" style="position:relative; bottom:-40px; right:270px;">
                <div class="section-header text-center">
                   
                    <p class="lead"><b> More News</b>.</p>
                    <br>
                </div>
            </div>
        <div id="courses-wrapper" style="float:left">

                <!-- row -->
                <div class="row" >

                        
                    <!-- single course -->
                @foreach ($singleton->take(4) as $post)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="course">
                        <a href="blog/#{{ $post->id }}" class="course-img">
                        <img style="width: 320px; height:194.06px;" src="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
                            <i class="course-link-icon fa fa-link"></i>
                        </a>
                    <a class="course-title" href="blog/#{{ $post->id }}">{{ $post->body }} </a>
                        <div class="course-details">
                            
                            <span class="course-price course-free">New</span>
                        </div>
                    </div>
                </div>
                @endforeach
                    
                
                </div>
                <!-- /row -->

            

            </div>
            @endif
    </div>
    <!-- /row -->

</div>
<!-- /container -->

</div>
<!-- /Contact -->

@include('Frontview.inc.footer')
@endsection

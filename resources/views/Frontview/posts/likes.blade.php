@if(Auth::guest())
@include('notfound')
@else
@extends('Frontview.inc.header')
@section('body')
<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('FrontEnd') }}/img/background.jpg)"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="">Home</a></li>
							<li>Likes</li>
						</ul>
						<h1 class="white-text">Liked Posts</h1>

					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Blog -->
		<div id="blog" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- main blog -->
					<div id="main" class="col-md-9">

						<!-- row -->
						<div class="row">

							<!-- single blog -->
							
                    
                    @foreach ($likes as $like)
                    @foreach($posts as $post)
                           @if($like->post_id == $post->id)
                           @if($like->user_id == Auth::id())

					<div class="col-md-6 " >
					<div class="single-blog "  data-postid="{{ $post->id }}">
								<div class="blog-img" >
									<img style="width:400px; height:250px;" src="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
								
								</div>
								<h4><a href="blog-post.html">{{ $post->body }}.</a></h4>


				<button class="btn btn-primary" style="width:120px;" ><a style="color:blanchedalmond" href="#" class="like">
					{{ Auth::user()->like()->where('post_id', $post->id)->first() ? Auth::user()->like()->where('post_id',$post->id)->first()->like == 1 ? 'Unlike' : ' ' : 'Like'	}}</a></button>
					
										<div class="blog-meta">
								<span class="blog-meta-author">By: <a>{{ $post->author }}</a></span>
									<div class="pull-right">
									<span>{{ $post->created_at }}</span>
								
									</div>
								</div>
							</div>
                        </div>
                        @endif
                        @endif
                    @endforeach
                    @endforeach
							
							<!-- /single blog -->


							<!-- single blog -->
							<!-- /single blog -->

							</div>
						<!-- /row -->

						<!-- row -->
						
						<!-- /row -->
					</div>
					<!-- /main blog -->

					<!-- aside blog -->
					<div id="aside" class="col-md-3">

						<!-- search widget -->
						<div class="widget search-widget">
						<form action="{{ URL::to('/search') }}" method="POST" role="search">
							{{ csrf_field() }}
								<input class="input" type="text" name="search" placeholder="Search..." >
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<!-- /search widget -->

						<!-- category widget -->
						<!-- /category widget -->

						<!-- posts widget -->
						<div class="widget posts-widget">
								<h3>Recents Posts</h3>
	
								<!-- single posts -->
								@foreach($posts->take(2) as $post)
								<div class="single-post">
								<a class="single-post-img" href="#{{ $post->id }}">
								<img  style="width:90px; height:60px;" src="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
									</a>
									<a href="blog-post.html">{{ $post->body }}.</a>
									
								<p><small>By : {{ $post->author }} . {{ $post->created_at }}</small></p>
								</div>
								<!-- /single posts -->
								@endforeach
							
	
						</div>

					</div>
					<!-- /aside blog -->

				</div>
				<!-- row -->

			</div>
			<!-- container -->

		</div>
		<!-- /Blog -->
	<script src="{{ asset('/js/like.js') }}"></script>	
	<script type="text/javascript">
		var token = '{{ Session::token() }}';
		var urlLike = '{{ route('blog') }}';
	</script>
@include('Frontview.inc.footer')
@endsection
@endif

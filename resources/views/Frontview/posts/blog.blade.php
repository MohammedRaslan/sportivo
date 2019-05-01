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
							<li>News</li>
						</ul>
						<h1 class="white-text">More News</h1>

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
							
					@foreach($posts as $post)
					<div class="col-md-6 " id="{{ $post->id }}">
					<div class="single-blog "  data-postid="{{ $post->id }}" >
								<div class="blog-img" >
									<img style="width:400px; height:250px;" src="{{ asset('uploads') }}/post/{{ $post->img }}" alt="">
								<!--<a href="blog-post.html"></a>-->
								</div>
								<h4><a href="blog-post.html">{{ $post->body }}.</a></h4>
							<!--<form action="{{ route('submitlike') }}" method="POST">-->
								
						<!--	<input type="text" value="{{ $post->id }}" name="post_id" hidden>
							<input type="text" value="{{ Auth::id() }}" name="user_id" hidden>-->

				<button class="btn btn-primary" style="width:120px;" ><a style="color:blanchedalmond" href="#" class="like">
					{{ Auth::user()->like()->where('post_id', $post->id)->first() ? Auth::user()->like()->where('post_id',$post->id)->first()->like == 1 ? 'Unlike' : ' ' : 'Like'	}}</a></button>
					
										<!--<button  id="{{ $post->id }}" value="1"  type="submit" name="like" class="btn btn-primary like"  style="width:120px;">LIKE</button>
										<button  id="{{ $post->id }}" value="0"  type="button" name="dislike" class="btn btn-danger dislike"  style="width:120px;">DISLIKE</button>-->
										
										<form action="{{ route('comment') }}" method="POST" enctype="multipart/form-data" id="{{ $post->id }}">
										<input  type="submit" id="{{ Auth::id() }}" name="comment"  class="btn btn-success addComment" value="Comment" style="width:120px; float:right; position:relative; top:-33px;">
								{{ csrf_field() }}
								<input type="text" name="commentbody" class="CommentText" placeholder="Comment" required>
										<input type="text" name="post_id" value="{{ $post->id }}" hidden>
							</form>
							<div class="CommentsList" id="{{ $post->id }}">
									@foreach ($comments->take(10) as $comment)
									@foreach ($users as $user)
											
									
									
											@if($comment->commentable_id == $post->id )
											@if($comment->user_id == $user->id)

								<li class="list-group-item"><a href="#" style="color:darkorange">{{ $user->name }}</a> : <a>{{ $comment->body }} </a>
											@endif	
											@endif																		
									</li>
									@endforeach
									@endforeach
						</div>
								<div class="blog-meta">
								<span class="blog-meta-author">By: <a>{{ $post->author }}</a></span>
									<div class="pull-right">
									<span>{{ $post->created_at }}</span>
									
								<!--	<span class="blog-meta-comments"><a href=""><i class="fa fa-thumbs-up"></i> 0</a></span>									
									<span class="blog-meta-comments"><a href=""><i class="fa fa-comments"></i> 0</a></span>-->
								
								
									</div>
								</div>
							</div>
						</div>
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
							@foreach($posts->take(3) as $post)
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
		<script>
		/*	function toggle1() {
			var dislike = document.getElementById("dislike");
			var like = document.getElementById("like");
			if (dislike.style.display === "none") {
			  dislike.style.display = "inline";
			  like.style.display = "none";
			} else{
			  dislike.style.display = "none";
			}
		  }
		  function toggle2() {
			var dislike = document.getElementById("dislike");
			var like = document.getElementById("like");
			if (like.style.display === "none") {
			  dislike.style.display = "none";
			  like.style.display = "inline";
			  
			} else{
			  like.style.display = "none";
			}
		  }
		  $("body").on("click",'.like', function () {
        $(this).text($(this).text()== 'LIKE' ? 'Liked' : 'LIKE');
		$(this).toggleClass('btn-secondary');
		
   		 });*/
				$(".addComment").on("click",function(){
					var uid = $(this).prop("id");
					var form = $(this).closest("form");
					var pid= $(form).prop("id");
					var text = $(form).find(".CommentText").text();
					$(".CommentList"+"#"+pid).append("<li class='list-group-item'><a href='#' style='color:darkorange'>"+uid+"</a> : <a>"+text+"</a></li>");
				});
		</script>
	
	<script src="{{ asset('/js/like.js') }}"></script>	
	<script type="text/javascript">
		var token = '{{ Session::token() }}';
		var urlLike = '{{ route('blog') }}';
	</script>
@include('Frontview.inc.footer')
@endsection
@endif


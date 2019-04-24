@if(Auth::guest())
@include('notfound')
@else
@extends('Frontview.inc.header')
@section('body')
<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('FrontEnd') }}/img/page-background.jpg)"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="index.html">Home</a></li>
							<li>Blog</li>
						</ul>
						<h1 class="white-text">Blog Page</h1>

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
							<div class="col-md-6">
								<div class="single-blog">
									<div class="blog-img">
										<a href="blog-post.html">
											<img src="{{ asset('FrontEnd') }}/img/blog01.jpg" alt="">
										</a>
									</div>
									<h4><a href="blog-post.html">Pro eu error molestie deserunt. At per viderer bonorum persecuti.</a></h4>
									<div class="blog-meta">
										<span class="blog-meta-author">By: <a href="#">John Doe</a></span>
										<div class="pull-right">
											<span>18 Oct, 2017</span>
											<span class="blog-meta-comments"><a href="#"><i class="fa fa-comments"></i> 35</a></span>
										</div>
									</div>
								</div>
							</div>
							<!-- /single blog -->

							<!-- single blog -->
							<div class="col-md-6">
								<div class="single-blog">
									<div class="blog-img">
										<a href="blog-post.html">
											<img src="{{ asset('FrontEnd') }}/img/blog02.jpg" alt="">
										</a>
									</div>
									<h4><a href="blog-post.html">Pro eu error molestie deserunt. At per viderer bonorum persecuti.</a></h4>
									<div class="blog-meta">
										<span class="blog-meta-author">By: <a href="#">John Doe</a></span>
										<div class="pull-right">
											<span>18 Oct, 2017</span>
											<span class="blog-meta-comments"><a href="#"><i class="fa fa-comments"></i> 35</a></span>
										</div>
									</div>
								</div>
							</div>
							<!-- /single blog -->

							<!-- single blog -->
							<div class="col-md-6">
								<div class="single-blog">
									<div class="blog-img">
										<a href="blog-post.html">
											<img src="{{ asset('FrontEnd') }}/img/blog03.jpg" alt="">
										</a>
									</div>
									<h4><a href="blog-post.html">Pro eu error molestie deserunt. At per viderer bonorum persecuti.</a></h4>
									<div class="blog-meta">
										<span class="blog-meta-author">By: <a href="#">John Doe</a></span>
										<div class="pull-right">
											<span>18 Oct, 2017</span>
											<span class="blog-meta-comments"><a href="#"><i class="fa fa-comments"></i> 35</a></span>
										</div>
									</div>
								</div>
							</div>
							<!-- /single blog -->

							<!-- single blog -->
							<div class="col-md-6">
								<div class="single-blog">
									<div class="blog-img">
										<a href="blog-post.html">
											<img src="{{ asset('FrontEnd') }}/img/blog04.jpg" alt="">
										</a>
									</div>
									<h4><a href="blog-post.html">Pro eu error molestie deserunt. At per viderer bonorum persecuti.</a></h4>
									<div class="blog-meta">
										<span class="blog-meta-author">By: <a href="#">John Doe</a></span>
										<div class="pull-right">
											<span>18 Oct, 2017</span>
											<span class="blog-meta-comments"><a href="#"><i class="fa fa-comments"></i> 35</a></span>
										</div>
									</div>
								</div>
							</div>
							<!-- /single blog -->

						</div>
						<!-- /row -->

						<!-- row -->
						<div class="row">

							<!-- pagination -->
							<div class="col-md-12">
								<div class="post-pagination">
									<a href="#" class="pagination-back pull-left">Back</a>
									<ul class="pages">
										<li class="active">1</li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
									</ul>
									<a href="#" class="pagination-next pull-right">Next</a>
								</div>
							</div>
							<!-- pagination -->

						</div>
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
						<div class="widget category-widget">
							<h3>Categories</h3>
							<a class="category" href="#">Web <span>12</span></a>
							<a class="category" href="#">Css <span>5</span></a>
							<a class="category" href="#">Wordpress <span>24</span></a>
							<a class="category" href="#">Html <span>78</span></a>
							<a class="category" href="#">Business <span>36</span></a>
						</div>
						<!-- /category widget -->

						<!-- posts widget -->
						<div class="widget posts-widget">
							<h3>Recents Posts</h3>

							<!-- single posts -->
							<div class="single-post">
								<a class="single-post-img" href="blog-post.html">
									<img src="{{ asset('FrontEnd') }}/img/post01.jpg" alt="">
								</a>
								<a href="blog-post.html">Pro eu error molestie deserunt.</a>
								<p><small>By : John Doe .18 Oct, 2017</small></p>
							</div>
							<!-- /single posts -->

							<!-- single posts -->
							<div class="single-post">
								<a class="single-post-img" href="blog-post.html">
									<img src="{{ asset('FrontEnd') }}/img/post02.jpg" alt="">
								</a>
								<a href="blog-post.html">Pro eu error molestie deserunt.</a>
								<p><small>By : John Doe .18 Oct, 2017</small></p>
							</div>
							<!-- /single posts -->

							<!-- single posts -->
							<div class="single-post">
								<a class="single-post-img" href="blog-post.html">
									<img src="{{ asset('FrontEnd') }}/img/post03.jpg" alt="">
								</a>
								<a href="blog-post.html">Pro eu error molestie deserunt.</a>
								<p><small>By : John Doe .18 Oct, 2017</small></p>
							</div>
							<!-- /single posts -->

						</div>
						<!-- /posts widget -->

						<!-- tags widget -->
						<div class="widget tags-widget">
							<h3>Tags</h3>
							<a class="tag" href="#">Web</a>
							<a class="tag" href="#">Photography</a>
							<a class="tag" href="#">Css</a>
							<a class="tag" href="#">Responsive</a>
							<a class="tag" href="#">Wordpress</a>
							<a class="tag" href="#">Html</a>
							<a class="tag" href="#">Website</a>
							<a class="tag" href="#">Business</a>
						</div>
						<!-- /tags widget -->

					</div>
					<!-- /aside blog -->

				</div>
				<!-- row -->

			</div>
			<!-- container -->

		</div>
		<!-- /Blog -->
@include('Frontview.inc.footer')
@endsection
@endif

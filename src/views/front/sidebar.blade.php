
<aside class="sidebar">
	@if(env('NEWSLETTER') == true)
	<div class="widget widget-subscription">
		<h4 class="widget-title">Get notified updates</h4>
           @include('newsletter::front.form')

	</div>
	@endif
	<!-- Widget Latest Posts -->
	<div class="widget widget-latest-post">
		<h4 class="widget-title">Latest Posts</h4>
				@foreach ($posts as $post)

		<div class="media">
			<a class="pull-left" href="#">
				<img class="media-object" src="{{asset('photos/posts')}}/{{$post->defaultPhoto['name']}}" alt="Image">
			</a>

			<div class="media-body">
				<h4 class="media-heading"><a href="{{route('blog.blogcategory', blog\blogsystem\Helpers\BlogSystemHelper::geturipostarrayparameters( 'blog\blogsystem\Models\Post', $post['id'] ) ) }}">{!! CustomHelper::gettranslatefield( 'blog\blogsystem\Models\Post','name', $post['id'] )  !!}</a></h4>
						<p><?php  
							$desc= CustomHelper::gettranslatefield( 'blog\blogsystem\Models\Post','description', $post['id'] ) ;

							echo CustomHelper::wordlimit( $desc,8 ); ;?></p>
			</div>

		</div>
			@endforeach

	</div>
	<!-- End Latest Posts -->


	<!-- Widget Latest Categories -->
	<div class="widget widget-latest-post">
		<h4 class="widget-title">Latest Categories</h4>
				@foreach ($blogcategories as $blogcategory)

		<div class="media">
			<a class="pull-left" href="#">
				<img class="media-object" src="{{asset('photos/blogcategory')}}/{{$blogcategory->defaultPhoto['name']}}" alt="Image">
			</a>

			<div class="media-body">
				<h4 class="media-heading"><a href="{{route('blog.blogcategory', blog\blogsystem\Helpers\BlogSystemHelper::geturiarrayparameters( 'blog\blogsystem\Models\Blogcategory', $blogcategory['id'] ) ) }}">{!! CustomHelper::gettranslatefield( 'blog\blogsystem\Models\Blogcategory','name', $blogcategory['id'] )  !!}</a></h4>
						<p><?php  
							$desc= CustomHelper::gettranslatefield( 'blog\blogsystem\Models\Blogcategory','description', $blogcategory['id'] ) ;

							echo CustomHelper::wordlimit( $desc,8 ); ;?></p>
			</div>

		</div>
			@endforeach

	</div>
	<!-- End Latest Categories -->



</aside>
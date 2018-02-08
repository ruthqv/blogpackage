


@foreach ($posts as $post)
<div class="post">
	<div class="post-media post-thumb">
		<a href="{{route('blog.blogcategory', blog\blogsystem\Helpers\BlogSystemHelper::geturipostarrayparameters( 'blog\blogsystem\Models\Post', $post['id'] ) ) }}">
		    @if ($post->defaultPhoto() && $post->defaultPhoto()->count() > 0)
				<img src="{{asset('photos/posts')}}/{{$post->defaultPhoto['name']}}" alt="">
			@endif

		</a>
	</div>
	 <h4><a href="{{route('blog.blogcategory', blog\blogsystem\Helpers\BlogSystemHelper::geturipostarrayparameters( 'blog\blogsystem\Models\Post', $post['id'] ) ) }}">{!! CustomHelper::gettranslatefield( 'blog\blogsystem\Models\Post','name', $post['id'] )  !!}</a></h4>
	<div class="post-meta">
		<ul>
			<li>
				<i class="tf-ion-ios-calendar"></i> {{$post['created_at']}}
			</li>
			<li>
				<i class="tf-ion-android-person"></i> POSTED BY {{$post['author']}}
			</li>
            <!--<li><a href=""><i class="tf-ion-ios-pricetags"></i> LIFESTYLE</a>,<a href=""> TRAVEL</a>, <a href="">FASHION</a></li>
			<li><a href=""><i class="tf-ion-chatbubbles"></i> 4 COMMENTS</a></li> -->
		</ul>
	</div>
	<div class="post-content">
		<p><?php  
$desc= CustomHelper::gettranslatefield( 'blog\blogsystem\Models\Post','description', $post['id'] ) ;

echo CustomHelper::wordlimit( $desc,50 ); ;?></p>
		<a href="{{route('blog.blogcategory', blog\blogsystem\Helpers\BlogSystemHelper::geturipostarrayparameters( 'blog\blogsystem\Models\Post', $post['id'] ) ) }}" class="btn btn-main">Continue Reading</a>
	</div>
</div>

@endforeach

{{ $posts->links() }}




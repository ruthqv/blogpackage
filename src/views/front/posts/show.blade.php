@extends('layouts.app')

@section('content')

<section class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				 <h4 class="widget-title">{!! CustomHelper::gettranslatefield( 'blog\blogsystem\Models\Post','name', $post['id'] )  !!}</h4>

				<div class="post post-single">
					<div class="post-thumb">
			            @if ($post->defaultPhoto())
							<img class="img-responsive" src="{{asset('photos/posts')}}/{{$post->defaultPhoto['name']}}" alt="">
						@endif
						@if ($post->photos() && $post->photos()->count() > 1)
			                @foreach($post->photos as $photo)
			                    @if (!$photo['default'])
			                        <a href="" data-toggle="lightbox" data-gallery="multiimages">
			                            <img src="{{asset('photos/posts')}}/{{$potho['name']}}" alt="{!! htmlspecialchars($post['name']) !!}" class="thumbnail" />
			                        </a>
			                    @endif
			                @endforeach
			            @endif
					</div>
					<div class="post-meta">
						<ul>
							<li>
								<i class="tf-ion-ios-calendar"></i> {{$post['created_at']}}
							</li>
							<li>
								<i class="tf-ion-android-person"></i> POSTED BY {{$post->author['name']}}
							</li>
							<!-- <li><a href=""><i class="tf-ion-ios-pricetags"></i> LIFESTYLE</a>,<a href=""> TRAVEL</a>, <a href="">FASHION</a></li>
							<li><a href=""><i class="tf-ion-chatbubbles"></i> 4 COMMENTS</a></li> -->
						</ul>
					</div>
					<div class="post-content post-excerpt">
						<p>{!! CustomHelper::gettranslatefield( 'blog\blogsystem\Models\Post','description', $post['id'] )  !!}</p>
				    </div>
			         
			         @include('front.elements.sharesocial')
					
					@if(env('COMMENTS') == true )
						
						@include('comments::front.index', ['item' => $post, 'type' => 'blog\blogsystem\Models\Post' ])

					@endif	
			       

				</div>

			</div>
		</div>
	</div>
</section>		

@endsection

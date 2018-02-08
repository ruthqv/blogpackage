@extends('layouts.app')
@section('content')


<div class="page-wrapper">
	<div class="container">
		<div class="row">
			@if(!empty($blogcategory))
			<h4 class="widget-title text-center">{!! CustomHelper::gettranslatefield( 'blog\blogsystem\Models\Blogcategory','name', $blogcategory['id'] )  !!}</h4>
			@endif
      		<div class="col-md-4">
              @include('blog::front.sidebar')
      		</div>	
			<div class="col-md-8">
               @include('blog::front.posts.grid')
            </div>
		</div>
	</div>
</div>   
@endsection

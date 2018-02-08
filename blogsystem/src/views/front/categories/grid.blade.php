
@extends('front.layouts.master')

@section('content')

<div class="page-wrapper">
	<div class="container">
		<div class="row">
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

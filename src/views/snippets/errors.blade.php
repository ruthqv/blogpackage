<section class="errors">
	
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			@if (count($errors) > 0)
			<div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i>

			        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			</div>
			@endif			
		</div>
	</div>
</div>
</section>

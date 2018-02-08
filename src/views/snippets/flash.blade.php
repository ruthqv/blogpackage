<section class="flash">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if (session()->has('alert-' . $msg))
                        <div class="alert alert-{{ $msg }}">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('alert-' . $msg) }}
                        </div>
                    @endif
                @endforeach
                @if (session()->has('status'))
                     <div class="alert alert-info alert-common" role="alert"><i class="tf-ion-android-checkbox-outline"></i>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('status') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>    
</section>

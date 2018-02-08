@extends('admin.index')
@section('previous')
<a type="submit" href="{{ route('admin.blog.blogcategories.index') }}" class="btn btn-sm btn-primary" target="_blank" title="go back"><i class="fa fa-angle-left"></i> GO BACK</a>
            <h2>Categories</h2>
@endsection
@section('maincontent')


            @if (count($blogcategories) > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>posts</th>
                            <th>Order</th>
                            <th>Edit</th>
                            <th>Remove</th>
                        </tr>
                        @foreach ($blogcategories as $blogcategory)
                            <tr>
                                <td>
                                    @for ($i = 0; $i < $blogcategory['parents']; $i++)
                                        <i class="fa fa-caret-right"></i>
                                    @endfor
                                @if ($blogcategory->defaultPhoto()->count() > 0)
                                    <img src="{{asset('photos/blogcategory')}}/{{$blogcategory->defaultPhoto['name']}}" alt="{!! $blogcategory['name'] !!}" width="50px" />
                                @endif
                                    <a href="{{ route('admin.blog.blogcategories.show', $blogcategory['id']) }}">{{ $blogcategory['name'] }}</a>
                                </td>
                                <td>{{ $blogcategory->posts()->count() }}</td>

                                <td>{{ $blogcategory['order'] }}</td>

                                <td><a href="{{ route('admin.blog.blogcategories.show', $blogcategory['id']) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a></td>
                                <td>
                                    <form method="POST" action="{{ route('admin.blog.blogcategories.destroy', $blogcategory['id']) }}" accept-charset="UTF-8" role="form" onsubmit="return confirm('Do you really want to remove this blogcategory?');">

                                        {{ csrf_field() }}
                                        
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @else
                <div class="alert alert-warning">There are no categories at the present.</div>
            @endif

            <a href="{{ route('admin.blog.blogcategories.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add new Category</a><br /><br />

    @endsection
    @section('scripts')
        <script>
            function remove(url) {
                var r = confirm("Are you sure you want to remove this blogcategory?");
                if (r == true) {
                    window.location.replace(url);
                } else {
                    return false;
                }
            }
        </script>
    @endsection


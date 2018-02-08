@extends('blog::admin.master')

@section('content') 
 <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th class="text-center">Category</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Posts</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Remove</th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr>
                            <td><a href="{{ route('admin.blog.blogcategories.show', $post['blogcategory_id']) }}"></a>{{$post->blogcategory['name']}}</td>
                            <td class="text-right">{{ $post['id'] }}</td>
                            <td>
                                @if ($post->defaultPhoto()->count() > 0)
                                    <img src="{{asset('photos/posts')}}/{{$post->defaultPhoto['name']}}" alt="{!! $post['name'] !!}" width="50px" />
                                @endif

                                <a href="{{ route('admin.blog.posts.show', $post['id']) }}">{{ $post['name'] }}</a>
                               
                           

                                @if ($post['new'])
                                    <span class="label label-success">New</span>
                                @endif

                                @if ($post['special'])
                                <span class="label label-primary">Special</span>
                                @endif

                      
                            </td>

                            <td class="text-center"><a href="{{ route('admin.blog.posts.show', $post['id']) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a></td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('admin.blog.posts.destroy', $post['id']) }}" accept-charset="UTF-8" role="form" onsubmit="return confirm('Do you really want to remove this post?');">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        <div class="col-md-12">
            <a href="{{ route('admin.blog.posts.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add new Post</a><br /><br />
        </div>

    @endsection
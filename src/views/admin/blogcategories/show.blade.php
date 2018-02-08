@extends('blog::admin.master')
@section('previous')
<a type="submit" href="{{ route('admin.blog.blogcategories.index') }}" class="btn btn-sm btn-primary" target="_blank" title="go back"><i class="fa fa-angle-left"></i> GO BACK</a>
            <h2>Edit Category</h2>
@endsection
@section('content')

            <form method="POST" action="{{ route('admin.blog.blogcategories.update', $blogcategory['id']) }}" accept-charset="UTF-8" role="form"  enctype="multipart/form-data"  class="form" data-id="{{ $blogcategory['id'] }}"  data-type="blog/blogsystem/Models/Category">
            
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label required">Category Name:</label>

                            <input type="text" id="name" class="namefortrans form-control" name="name" value="{{ old('name', $blogcategory['name']) }}" maxlength="45" required />

                            @include('snippets.errors_first', ['param' => 'name'])
                        </div>
                        
                       <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="control-label required">Category Description:</label>

                            <input type="text" id="description" class="descriptionfortrans form-control" name="description" value="{{ old('description', $blogcategory['description']) }}" maxlength="45" required />

                            @include('snippets.errors_first', ['param' => 'description'])
                        </div>

                        <div class="form-group{{ $errors->has('uri') ? ' has-error' : '' }}">
                            <label for="uri" class="control-label required">Category URI:</label>

                            <input type="text" id="uri" class="form-control" name="uri" value="{{ old('uri', $blogcategory['uri']) }}" maxlength="45" required />

                            <p class="help-block">
                                This will appear as blogcategory name in the URL. Please use lower case only, with no spaces,
                                and separate words by hyphen.
                            </p>

                            @include('snippets.errors_first', ['param' => 'uri'])
                        </div>
                                                    


                        <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                            <label for="parent-id" class="control-label">Parent Category:</label>

                            <select id="parent-id" class="form-control" name="parent_id" required>
                                <option value="0">No parent blogcategory (Root blogcategory)</option>
                                @foreach(collect($blogcategories['all'])->mapWithKeys(function ($item) {
                                        return [$item['id'] => str_repeat('- ', $item['parents']) . $item['name']];
                                    }) as $key => $value)
                                    <option value="{{ $key }}"{{ old('parent_id', $blogcategory['parent_id']) == $key ? ' selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>

                            @include('snippets.errors_first', ['param' => 'parent_id'])
                        </div>
                        <div class="form-group">
                            <label for="photos" class="control-label">Photos:</label>

                            @if ($blogcategory->photos()->count() > 0)
                                <table class="table">
                                    <tr>
                                        <th>Photo</th>
                                        <th>Default</th>
                                        <th>Remove</th>
                                    </tr>
                                    @foreach ($blogcategory->photos as $photo)
                                        <tr>
                                            <td><img src="{{asset('photos/blogcategory')}}/{{$photo['name']}}" width="100" /></td>
                                            <td><input type="radio" name="photos_default" value="{{ $photo['id'] }}" {{ $photo['default'] ? 'checked' : '' }} /></td>
                                            <td><input type="checkbox" name="photos_remove[]" value="{{ $photo['id'] }}" /></td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif

                            <input type="file" id="photos" name="photos[]" multiple />
                        </div>
                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                            <label for="order" class="control-label">Order:</label>

                            <input type="number" id="order" class="form-control" name="order" value="{{ old('order', $blogcategory['order']) }}" maxlength="3" min="0" />

                            <p class="help-block">Set the order of this blogcategory (relative to other categories in the same level).</p>

                            @include('snippets.errors_first', ['param' => 'order'])
                        </div>

                        <div class="form-group{{ $errors->has('menu') ? ' has-error' : '' }}">
                            <label for="menu" class="control-label">Menu:</label>

                            <input type="checkbox" id="menu" name="menu" value="1"{{ old('menu', $blogcategory['menu']) ? ' checked' : '' }} />

                            <p class="help-block">Display this blogcategory in the global menu.</p>

                            @include('snippets.errors_first', ['param' => 'menu'])
                        </div>

                        @if(env('LANGS') && $blogcategory->translatablefields())
                        @foreach($blogcategory->translatablefields() as $field)
                          @include('langs::admin.translate.show', ['item' => $field, 'entity'=> $blogcategory] )            
                        @endforeach
                        @endif
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" title="Save this blogcategory"><i class="fa fa-save"></i> Save</button>
                        </div>

            </form>

    @endsection
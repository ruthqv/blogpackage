@extends('layouts.app')

@section('content') 

  <form method="POST" action="{{ route('admin.blog.posts.update', $post['id']) }}" accept-charset="UTF-8" enctype="multipart/form-data" role="form"  class="form" data-id="{{ $post['id'] }}"  data-type="blog/blogsystem/Models/Post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label required">Post Name:</label>

                    <input type="text" id="name" class="form-control namefortrans" name="name" value="{{ old('name', $post['name']) }}" maxlength="255" required />

                    @include('snippets.errors_first', ['param' => 'name'])
                </div>

                <div class="form-group{{ $errors->has('uri') ? ' has-error' : '' }}">
                    <label for="uri" class="control-label required">Post URI:</label>

                    <input type="text" id="uri" class="form-control" name="uri" value="{{ old('uri', $post['uri']) }}" maxlength="255" required />

                    <p class="help-block">To be used in the URL, make sure to use lowercase with hyphen, i.e. "post-title".</p>

                    @include('snippets.errors_first', ['param' => 'uri'])
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="control-label">Post Description:</label>

                    <textarea id="description" class="form-control descriptionfortrans" name="description" maxlength="2048" rows="5">{{ old('description', $post['description']) }}</textarea>

                    @include('snippets.errors_first', ['param' => 'description'])
                </div>



                <div class="form-group{{ $errors->has('blogcategory_id') ? ' has-error' : '' }}">
                    <label for="blogcategory-id" class="control-label required">Category:</label>

                    <select id="blogcategory-id" class="form-control" name="blogcategory_id" required>
                        <option value="">Select one</option>

                        @foreach(collect($blogcategories['all'])->mapWithKeys(function ($item) {
                                return [$item['id'] => str_repeat('- ', $item['parents']) . $item['name']];
                            }) as $key => $value)
                            <option value="{{ $key }}"{{ old('blogcategory_id', $post['blogcategory_id']) == $key ? ' selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>

                    @include('snippets.errors_first', ['param' => 'blogcategory_id'])
                </div>

                <div class="form-group">
                    <label for="special" class="control-label">Special:</label>

                    <input type="checkbox" id="special" name="special" value="on"{{ old('special', $post['special']) ? ' checked' : '' }} />

                    <p class="help-block">Check this to mark this post as a "special" post, which will be shown
                        in the Specials block in homepage.</p>

                    @include('snippets.errors_first', ['param' => 'special'])
                </div>

                <div class="form-group">
                    <label for="new" class="control-label">New:</label>

                    <input type="checkbox" id="new" name="new" value="on"{{ old('new', $post['new']) ? ' checked' : '' }} />

                    <p class="help-block">Check this to mark this post as a "new" post, which will have a "New"
                        ribbon on its thumbnail image.</p>

                    @include('snippets.errors_first', ['param' => 'new'])
                </div>

                <div class="form-group">
                    <label for="photos" class="control-label">Photos:</label>

                    @if ($post->photos()->count() > 0)
                        <table class="table">
                            <tr>
                                <th>Photo</th>
                                <th>Default</th>
                                <th>Remove</th>
                            </tr>
                            @foreach ($post->photos as $photo)
                                <tr>
                                    <td><img src="{{asset('photos/posts')}}/{{$photo['name']}}" width="100" /></td>
                                    <td><input type="radio" name="photos_default" value="{{ $photo['id'] }}" {{ $photo['default'] ? 'checked' : '' }} /></td>
                                    <td><input type="checkbox" name="photos_remove[]" value="{{ $photo['id'] }}" /></td>
                                </tr>
                            @endforeach
                        </table>
                    @endif

                    <input type="file" id="photos" name="photos[]" multiple />
                </div>

                <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                    <label for="order" class="control-label required">Order:</label>

                    <input type="number" id="order" class="form-control" name="order" value="{{ old('order', $post['order']) }}" maxlength="10" required />

                    <p class="help-block">Set the order of this post in its blogcategory.</p>

                    @include('snippets.errors_first', ['param' => 'order'])
                </div>

                @if(env('LANGS') && $post->translatablefields())
                @foreach($post->translatablefields() as $field)
                  @include('langs::admin.translate.show', ['item' => $field, 'entity'=> $post] )            
                @endforeach
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-success" title="Update this post"><i class="fa fa-save"></i> Save</button>

                    <a href="{{ route('admin.blog.posts.index') }}" class="btn" title="Click here to cancel">Cancel</a>
                </div>



            </form>


    @endsection
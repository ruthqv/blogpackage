@extends('blog::admin.master')

@section('content') 
       <form method="POST" action="{{ route('admin.blog.posts.store') }}" accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-12 col-md-6">


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label required">Post Name:</label>

                            <input type="text" id="name" class="form-control namefortrans" name="name" value="{{ old('name') }}" maxlength="255" required />

                            @include('blog::snippets.errors_first', ['param' => 'name'])
                        </div>


                        <div class="form-group{{ $errors->has('uri') ? ' has-error' : '' }}">
                            <label for="uri" class="control-label required">Post URI:</label>

                            <input type="text" id="uri" class="form-control" name="uri" value="{{ old('uri') }}" maxlength="255" required />

                            <p class="help-block">To be used in the URL, make sure to use lowercase with hyphen, i.e. "post-title".</p>

                            @include('blog::snippets.errors_first', ['param' => 'uri'])
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="control-label">Post Description:</label>

                            <textarea id="description" class="form-control descriptionfortrans" name="description" maxlength="2048" rows="5">{{ old('description') }}</textarea>

                            @include('blog::snippets.errors_first', ['param' => 'description'])
                        </div>


                        <div class="form-group{{ $errors->has('blogcategory_id') ? ' has-error' : '' }}">
                            <label for="blogcategory-id" class="control-label required">Category:</label>

                            <select id="blogcategory-id" class="form-control" name="blogcategory_id" required>
                                <option value="">Select one</option>
                                @foreach(collect($blogcategories['all'])->mapWithKeys(function ($item) {
                                        return [$item['id'] => str_repeat('- ', $item['parents']) . $item['name']];
                                    }) as $key => $value)
                                    <option value="{{ $key }}"{{ old('blogcategory_id') == $key ? ' selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>

                            @include('blog::snippets.errors_first', ['param' => 'blogcategory_id'])
                        </div>

                        <div class="form-group">
                            <label for="special" class="control-label">Special:</label>

                            <input type="checkbox" id="special" name="special" value="on"{{ old('special') ? ' checked' : '' }} />

                            <p class="help-block">Check this to mark this post as a "special" post, which will be shown
                                in the Special block in homepage.</p>

                            @include('blog::snippets.errors_first', ['param' => 'special'])
                        </div>

                        <div class="form-group">
                            <label for="new" class="control-label">New:</label>

                            <input type="checkbox" id="new" name="new" value="on"{{ old('new') ? ' checked' : '' }} />

                            <p class="help-block">Check this to mark this post as a "new" post, which will have a "New"
                                ribbon on its thumbnail image.</p>

                            @include('blog::snippets.errors_first', ['param' => 'new'])
                        </div>

                        <div class="form-group">
                            <label for="photos" class="control-label">Photos:</label>

                            <input type="file" id="photos" name="photos[]" multiple />
                        </div>

                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                            <label for="order" class="control-label required">Order:</label>

                            <input type="number" id="order" class="form-control" name="order" value="{{ old('order') }}" maxlength="10" required />

                            <p class="help-block">Set the order of this post in its blogcategory.</p>

                            @include('blog::snippets.errors_first', ['param' => 'order'])
                        </div>

                           @if(env('LANGS') && $translatablefields)
                            @foreach($translatablefields as $field)
                              @include('langs::admin.translate.create', ['item' => $field])            
                            @endforeach
                            @endif


                        <div class="form-group">
                            <button type="submit" class="btn btn-success" title="Create this new post"><i class="fa fa-save"></i> Submit</button>

                            <a href="{{ route('admin.blog.posts.index') }}" title="Click here to cancel">Cancel</a>
                        </div>


                    </div>
                </div>

            </form>

    @endsection
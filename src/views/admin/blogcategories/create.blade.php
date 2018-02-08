@extends('blog::admin.master')

@section('content') 
            <form method="POST" action="{{ route('admin.blog.blogcategories.store') }}" accept-charset="UTF-8" role="form"  enctype="multipart/form-data" >
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label required">Category Name:</label>

                            <input type="text" id="name" class="namefortrans form-control" name="name" value="{{ old('name') }}" maxlength="45" required />

                            @include('snippets.errors_first', ['param' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="control-label required">Category description:</label>

                            <input type="text" id="description" class="descriptionfortrans form-control" name="description" value="{{ old('description') }}" maxlength="45" required />

                            @include('snippets.errors_first', ['param' => 'description'])
                        </div>

                        <div class="form-group{{ $errors->has('uri') ? ' has-error' : '' }}">
                            <label for="uri" class="control-label required">Category URI:</label>

                            <input type="text" id="uri" class="form-control" name="uri" value="{{ old('uri') }}" maxlength="45" required />

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
                                    <option value="{{ $key }}"{{ old('parent_id') == $key ? ' selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>

                            @include('snippets.errors_first', ['param' => 'parent_id'])
                        </div>
                        <div class="form-group">
                            <label for="photos" class="control-label">Photos:</label>

                            <input type="file" id="photos" name="photos[]" multiple />
                        </div>
                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                            <label for="order" class="control-label">Order:</label>

                            <input type="number" id="order" class="form-control" name="order" value="{{ old('order') }}" maxlength="3" min="0" />

                            <p class="help-block">Set the order of this blogcategory (relative to other categories in the same level).</p>

                            @include('snippets.errors_first', ['param' => 'order'])
                        </div>

                           @if(env('LANGS') && $translatablefields)
                            @foreach($translatablefields as $field)
                              @include('langs::admin.translate.create', ['item' => $field])            
                            @endforeach
                            @endif


                        <div class="form-group">
                            <button type="submit" class="btn btn-success" title="Create this new blogcategory"><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </div>

                </div>

            </form>

  

    @endsection
@extends('layouts.backend.app')
@section('title')
    Post
@endsection
@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{asset('asset/backend')}}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
@endpush
@section('content')
<form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
    @csrf
<!-- Vertical Layout -->
<div class="row clearfix">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Add Post
                </h2>
            </div>
            <div class="body">
                    <label for="email_address">Post Title</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="title" class="form-control" placeholder="Enter Post Title" name="title">
                        </div>
                    </div>
                    <label for="email_address">Feature Image</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" id="image" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="status" value="1" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                          Publish
                        </label>
                      </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Categories and Tags
                </h2>
            </div>
            <div class="body">
                    
                    <div class="form-group">
                        <div class="form-line {{$errors->has('categories') ? 'focused error' : ''}}">
                            <label>Select Category</label>
                            <select name="categories[]" id="category" class="form-control show-tick" data-live-serach="true" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line {{$errors->has('categories') ? 'focused error' : ''}}">
                            <label>Select Tags</label>
                            <select name="tags[]" id="tag" class="form-control show-tick" data-live-serach="true" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <a type="submit" href="{{route('admin.category.index')}}" class="btn btn-danger m-t-15 waves-effect">BACK</a>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Add Post
                </h2>
            </div>
            <div class="body">
                <textarea id="tinymce" name="body"></textarea>
            </div>
        </div>
    </div>
</div>
</form>
@push('js')
    <!-- Select Plugin Js -->
    <script src="{{asset('asset/backend')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- TinyMCE -->
    <script src="{{asset('asset/backend')}}/plugins/tinymce/tinymce.js"></script>
    <script>
        tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = '{{asset('asset/backend/plugins/tinymce')}}';
    </script>
@endpush
@endsection

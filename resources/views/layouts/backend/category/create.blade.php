@extends('layouts.backend.app')
@section('title')
    Category
@endsection
@section('content')

<!-- Vertical Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Add Category
                </h2>
            </div>
            <div class="body">
                <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="email_address">Category Name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="name" class="form-control" placeholder="Enter Category Name" name="name">
                        </div>
                    </div>
                    <label for="email_address">Category Image</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" id="image" class="form-control"Name" name="image">
                        </div>
                    </div>
                    <br>
                    <a type="submit" href="{{route('admin.category.index')}}" class="btn btn-danger m-t-15 waves-effect">BACK</a>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

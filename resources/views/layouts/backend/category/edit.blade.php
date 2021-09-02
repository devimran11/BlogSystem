@extends('layouts.backend.app')
@section('title')
    Edit Tag
@endsection
@section('content')

<!-- Vertical Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit Category
                </h2>
            </div>
            <div class="body">
                <form action="{{route('admin.category.update', $edit->id)}}"  id="myForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="email_address">Category Name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="name" class="form-control" placeholder="Enter Category Name" name="name" value="{{$edit->name}}">
                        </div>
                    </div>
                    <label for="email_address">Category Image</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" id="image" class="form-control"Name" name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <img src="{{ (!empty($edit->image)) ? url('storage/category/'.$edit->image):url('default.png')}}" style="width: 150px;height: 160px;border: 1px solid #000">
                    </div>
                    <br>
                    <a type="submit" href="{{route('admin.category.index')}}" class="btn btn-danger m-t-15 waves-effect">BACK</a>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

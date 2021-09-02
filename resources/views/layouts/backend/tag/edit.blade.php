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
                    Edit Tag
                </h2>
            </div>
            <div class="body">
                <form action="{{route('admin.tag.update', $edit->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="email_address">Tag Name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="name" class="form-control" placeholder="Enter Tag Name" name="name" value="{{$edit->name}}">
                        </div>
                    </div>
                    <br>
                    <a type="submit" href="{{route('admin.tag.index')}}" class="btn btn-danger m-t-15 waves-effect">BACK</a>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

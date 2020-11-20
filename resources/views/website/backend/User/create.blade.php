@extends('website.backend.layouts.main')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Add User Name </h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{route('user.store')}}">
                @csrf

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">User Name<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="username" name="username" required="required" class="form-control ">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                @endif

            </form>
        </div>
    </div>
</div>
@endsection
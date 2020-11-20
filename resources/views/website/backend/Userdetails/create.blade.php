@extends('website.backend.layouts.main')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add User Details </h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data" method="POST" action="{{route('personal.store')}}">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Username<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">

                            <select class="form-control" name="username">
                                @foreach ($username as $user)
                                    <option  value="{{$user->id}}">{{$user->username}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Description<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                <textarea id="message" required="required" class="form-control" name="desc" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10">

                </textarea>


                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="email" id="email" name="email" required="required" class="form-control ">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Date:</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="date" class="form-control" name="dob" data-target="#reservationdate">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Image  Upload<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="img"  id="img"required="required" onchange="fileSelected();"/>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Website<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="Website" name="website" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label  class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Status</label>
                        <select class="form-control" name="status" style="width: 50%;" data-select2-id="25" tabindex="-1" aria-hidden="true">
                            <option data-select2-id="29">Active</option>
                            <option data-select2-id="31">Unactive</option>
                        </select><span class="required"></span>
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
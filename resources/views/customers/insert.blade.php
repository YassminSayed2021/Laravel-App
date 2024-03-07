@extends('admin.layout')
@section('title','Update Customer Data')

@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Manage <small>Customers</small></h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Update Customer</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
            @php
               Session::forget('success') 
            @endphp
        </div>
    @endif
    <form method="post" action="{{route('custStore')}}">
        @csrf
        <label for="name">Customer Name</label>
        <input type="text" name="Customer_name" value="{{old('Customer_name')}}" class="form-control @error('Customer_name') is-invalid @enderror"><br><br>
       @error('Customer_name')
       <div class="alert alert-danger">{{$message}}</div>
       @enderror
        <label for="email">Customer Email:</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"><br>
        @error('email')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <input type="submit" value="Add">
    </form>
@endsection
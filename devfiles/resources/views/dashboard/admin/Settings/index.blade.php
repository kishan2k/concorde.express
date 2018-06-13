@extends('layouts.layout1') 
@section('PageTitle', 'Admin Settings') 
@section('content')
<div class="col-lg-3 col-md-6">
    <div class="panel info-box panel-white">
        <div class="panel-body">
            <a href="settings/address">
                <button class="btn btn-info">Address Book</button>
            </a>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel info-box panel-white">
        <div class="panel-body">
            <a href="{{url('admin/settings/users')}}">
                <button class="btn btn-info">Users</button>
            </a>
        </div>
    </div>
</div>


@stop

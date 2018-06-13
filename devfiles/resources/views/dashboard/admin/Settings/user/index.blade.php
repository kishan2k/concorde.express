@extends('layouts.layout1')
@section('PageTitle', 'Users')
@section('content')
<?php
use App\user;
$users = user::all();
?>
<div class="panel panel-white">
    <div class="panel-heading clearfix">
        <h4 class="panel-title">Users  </h4>
        <a href="{{ url('/admin/settings/user/create') }}"><button class="btn btn-info">Add New</button></a>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Rate</th>
                    <th>Rate</th>
                    <th>Admin</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                <tr>
                    <td>{{ $user->name }}</td>
                    <th>{{ $user->company }}</th>
                    <th>£{{ $user->credit }}</th>
                    <td>{{ $user->rate * 100 }}</td>
                    <th>@if ($user->admin == true)
                        Yes
                        @else
                        No
                        @endif
                    </th>
                    <td>{{ $user->created_at }}</td>
                    <td>

                            <a href="{{url('admin/settings/users') }}/{{ $user->id }}" class="btn btn-info" role="button">View</a>
                            <a href="{{url('admin/settings/users') }}/{{ $user->id }}/edit" class="btn btn-primary" role="button">Edit</a>

                            <a href="{{url('admin/settings/users') }}/{{ $user->id }}/delete" class="btn btn-warning" role="button">Delete</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
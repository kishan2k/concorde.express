@extends('layouts.layout1') @section('PageTitle', 'Address Book') @section('content')

<?php use App\autoaddress; $autoaddresses=autoaddress::where( 'belongs_to', '=', Auth::user()->email)->get(); ?>

<div class="panel panel-white">
    <div class="panel-heading clearfix">
        <h4 class="panel-title">Striped rows</h4>
        <a href="{{ url('settings/address/create') }}"><button class="btn btn-info right">Add New</button></a>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Postcode</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autoaddresses as $address )
                <tr>
                    <th scope="row">{{ $address->name }}</th>
                    <td>{{ $address->company }}</td>
                    <td>{{ $address->address1 }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->postcode }}</td>
                    <td>{{ $address->country }}</td>

                    <td>

                        <div class="btn-group " role="group" aria-label="">
                            <a href="address/{{ $address->id }}" class="btn btn-info" role="button">View</a>
                            <a href="address/{{ $address->id }}/edit" class="btn btn-primary" role="button">Edit</a>
                            <a href="address/{{ $address->id }}/delete" class="btn btn-warning" role="button">Delete</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
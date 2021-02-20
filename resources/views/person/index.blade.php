@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-sm table-bordered table-striped">
                   <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>phone</th>
                    <th>country</th>
                    <th>image</th>
                    <th>Action</th>
                   </tr>
                   @foreach ($persons as $person)
                   <tr>
                       <td>{{ $person->id }}</td>
                       <td>{{ $person->name }}</td>
                       <td>{{ $person->phone }}</td>
                       <td>{{ $person->country }}</td>
                       <td><img src="{{ $person->image }}" alt="" width="64"></td>
                       <th><a href="">Edit</a></th>
                   </tr>

                   @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

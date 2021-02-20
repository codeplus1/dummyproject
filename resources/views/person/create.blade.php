@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    Add New Contact
                </div>
                <div class="card-body">
                    <form action="/persons" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input id="name" class="form-control" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Contact</label>
                            <input id="phone" class="form-control" type="text" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input id="country" class="form-control" type="text" name="country">
                        </div>
                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input id="image" class="form-control-file" type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

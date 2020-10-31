@extends('layouts.main')
@section('content')

@if (session('successMsg'))
<div class="alert alert-success" role="alert">
{{session('successMsg')}}
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card mt-2">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">Student Details</div>
                        <button class="btn btn-sm btn-success" onClick="window.location='{{ route('create') }}'">Add New</button>
                    </div>
                </div>
                <div class="card-body" style="overflow: auto; height: 75vh;">
                    <table class="table">
                        <thead class="black white-text">
                            <tr>
                                <th></th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->first_name}}</td>
                                    <td>{{$row->last_name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>
                                        <form method="POST" id="delete-form-{{$row->id}}" action="{{ route('delete', $row->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('delete')}}
                                        </form>
                                        <div class="row">
                                            <button onClick="window.location='{{ route('edit', $row->id) }}'" class="btn btn-sm btn-primary">Edit</button>
                                            <button onClick="if(confirm('Are you sure to delete this data?')) {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$row->id}}').submit();
                                            } else {
                                                event.preventDefault();
                                            }" class="btn btn-sm btn-danger btn-link">Delete</button>
                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        <tbody>
                    </table>
                    <div style="height: 3rem">{{ $students->links() }}</div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
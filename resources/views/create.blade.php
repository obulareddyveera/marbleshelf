@extends('layouts.main')
@section('content')
<!-- Default form register -->
<div class="container mt-2">
<form class="text-center border border-light p-5" action="{{route('store')}}" method="post">
    {{ csrf_field() }}
    <p class="h4 mb-4">Add Student</p>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alerts">
                {{$error}}
            </div>
        @endforeach
    @endif
    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="firstName" class="form-control" placeholder="First name" name="firstName">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="lastName" class="form-control" placeholder="Last name" name="lastName">
        </div>
    </div>

    <!-- E-mail -->
    <input type="email" id="email" class="form-control mb-4" placeholder="E-mail" name="email">


    <!-- Phone number -->
    <input type="text" id="phone" class="form-control" placeholder="Phone number" name="phone">
    
    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Add Data</button>


</form>
<!-- Default form register -->
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$lista->name}}<a class="float-right btn btn-secondary" href="/listings">Kthehu</a></div>
                <a href="{{ url('dyn_pdf/pdf') }}" class="btn btn-danger">Convert into PDF</a>

                <div class="card-body">
                   <ul class="list-group">
                        <li class="list-group-item"> Emri: {{$lista->name}}</li>
                        <li class="list-group-item"> Last Name: {{$lista->last_name}}</li>
                        <li class="list-group-item"> DOB: {{$lista->dob}}</li>
                        <li class="list-group-item"> Gender: {{$lista->gender}}</li>
                        <li class="list-group-item"> Phone: {{$lista->phone}}</li>
                        <li class="list-group-item"> Email: {{$lista->email}}</li>
                        <li class="list-group-item"> Company Name: {{$lista->company_name}}</li>
                        
                   </ul>
                   <hr>


                </div>
            </div>
        </div>
    </div>

@endsection
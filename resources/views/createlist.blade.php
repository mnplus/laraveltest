@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Krijo nje Liste<a class="float-right btn btn-secondary" href="/dashboard">Kthehu</a></div>

                <div class="card-body">
                    {!!Form::open(['action' => 'ListaController@store', 'method' => 'POST']) !!}
                        {{Form::bsText('name','', ['placeholder' => 'Name'])}}
                        {{Form::bsText('last_name','', ['placeholder' => 'Last Name'])}}
                        {{Form::bsText('dob','', ['placeholder' => 'DOB'])}}
                        {{Form::label('gender', 'Gender')}}
                        <br>
                        {!! Form::radio('gender', 'm', true) !!} Female
                        {!! Form::radio('gender', 'f', false) !!} Male
                        {{Form::bsText('phone','', ['placeholder' => 'Phone Contact'])}}
                        {{Form::bsText('email','', ['placeholder' => 'name@domain.ext'])}}
                        {{Form::bsText('company_name','', ['placeholder' => 'Company Name'])}}
                        {{Form::bsSubmit('submit')}}
                    {!!Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
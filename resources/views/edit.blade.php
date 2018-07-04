@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ndrysho Listen <a class="float-right btn btn-secondary" href="/dashboard">Kthehu</a> </div>

                <div class="card-body">
                    {!!Form::open(['action' => ['ListaController@update', $lista->id], 'method' => 'POST']) !!}
                    {{Form::bsText('name','', ['placeholder' => 'Name'])}}
                        {{Form::bsText('last_name','', ['placeholder' => 'Last Name'])}}
                        {{Form::bsText('dob','', ['placeholder' => 'DOB'])}}
                        {{Form::label('gender', 'Gender')}}
                        @if ($lista->gender == 'm')
                        {!! Form::radio('gender', 'm', true, ['checked' => 'checked' ], array('id'=>'Male')) !!} Female
                        <br>
                        {!! Form::radio('gender', 'f', false, [], array('id'=>'Male')) !!} Male
                        @else 
                        {!! Form::radio('gender', 'm', false, [], array('id'=>'Female')) !!} Female
                        <br>
                        {!! Form::radio('gender', 'f', true, ['checked' => 'checked' ], array('id'=>'Female')) !!} Male
                        @endif
                        {{-- <input type="radio" id="sex" name="sex" value="1" @if(old('sex') ==  1) checked="checked" @endif /> Female
                        <input type="radio" id="sex" name="sex" value="0" @if(old('sex') ==  0) checked="checked" @endif /> Male --}}
                        
                        {{Form::bsText('phone','', ['placeholder' => 'Phone Contact'])}}
                        {{Form::bsText('email','', ['placeholder' => 'name@domain.ext'])}}
                        {{Form::bsText('company_name','', ['placeholder' => 'Company Name'])}}

                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::bsSubmit('Submit')}}
                    {!!Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard<span class="float-right"><a href="/listings/create" class="btn btn-success btn-xs">Shto liste</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Lista e tua</h3>
                    @if(count($lista))
                    <table class="table table-striped">
                        <tr>
                            <th> Kompania </th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($lista as $list)
                            <tr>
                                <td>{{$list->name}}</td>
                                <td><a class="float-right btn btn-default" href="/listings/{{$list->id}}/edit">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['ListaController@update', $list->id], 'method' => 'POST', 'class' => 'float-left', 'onsubmit' => 'return confirm("Do you really want to delete it")']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::bsSubmit('Fshi', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close() !!}
                                </td>
                            </tr> 
                        @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

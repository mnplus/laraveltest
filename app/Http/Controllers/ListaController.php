<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;

class ListaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','showlist']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Lista::orderBy('created_at', 'desc')->get();
        return view('lista')->with('lista', $lista);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createlist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email'
        ]);

        //Krijo nje liste te re
        $lista = new Lista;
        $lista->name = $request->input('name');
        $lista->last_name = $request->input('last_name');
        $lista->dob = $request->input('dob');
        // $lista->gender = Input::get('gender');
        $lista->gender =$request->input('gender');
        $lista->phone =$request->input('phone');
        $lista->email =$request->input('email');
        $lista->company_name = $request->input('company_name');

        $lista->user_id = auth()->user()->id;
        $lista->save();

        return redirect('dashboard')->with('success', 'Lista u shtua');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lista = Lista::find($id);
        return view('showlist')->with('lista', $lista);
    }
    /**
     * Function of the pdf.
     ***/


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lista = Lista::find($id);
        return view('edit')->with('lista', $lista);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email'
        ]);

        //Krijo nje liste te re

        $lista->name = $request->input('name');
        $lista->last_name = $request->input('last_name');
        $lista->dob = $request->input('dob');
        $lista->gender =$request->input('gender');
        $lista->phone =$request->input('phone');
        $lista->email =$request->input('email');
        $lista->company_name = $request->input('company_name');

        $lista->user_id = auth()->user()->id;
        $lista->save();

        return redirect('dashboard')->with('success', 'Lista u ndryshua');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

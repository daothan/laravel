<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RestfulRequest;
use Validator;
use App\Restful;

class ResfulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Restful::all();
       return view('restful.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restful.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestfulRequest $request)
    {
        $data = new Restful;

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->age = $request->input('age');

        if($data->save()){
            return redirect()->route('restful.index');
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "here is show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Restful::find($id);
        return view('restful.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = Restful::find($id);

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->age = $request->input('age');

        $rules=[
            'name' => 'required|max:50',
            'email' => 'required|email',
            'age' => 'required|integer'
        ];

        $messages=[
            'name.required' => 'Name can not null',
            'name.max' => 'Name must less than 50 charaters',

            'email.required' => 'Email can not null',
            'email.email' => 'Invalid email',

            'age.required' => 'Age can not null',
            'age.integer' => 'Age must be numeric'
        ];

        $validator = Validator::make($request->all(),$rules, $messages);

        if($validator -> fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            if($data->save()){
                return redirect()->route('restful.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Restful::findOrFail($id);
        $data -> delete();
        return redirect() -> route('restful.index');
    }
}

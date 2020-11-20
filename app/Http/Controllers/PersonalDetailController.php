<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Username;
use App\Personaldetail;

class PersonalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username=Username::all();
        $personaldetail=Personaldetail::all();
        //dd($personaldetail);
        return view('website.backend.Userdetails.index',compact('personaldetail','username'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $username=Username::all();
        return view('website.backend.Userdetails.create', compact('username'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = time().'.'.$request->img->extension();

        $request->img->move(public_path('images'), $image);
        Personaldetail::create([
            'description'=>$request->desc,
            'email'=>$request->email,
            'dob'=>$request->dob,
            'price'=>$request->price,
            'image'=>$image,
            'status'=>$request->status,
            'website'=>$request->website,
            'user_id'=>$request->username,



        ]);

        return redirect()->route('personal.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $username=Username::all();
        $personal=Personaldetail::find($id);
        //dd($productcategory);


        return view('website.backend.Userdetails.edit',compact('personal','username'));
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
        $personal=Personaldetail::find($id);
        $image = time().'.'.$request->img->extension();

        $request->img->move(public_path('images'), $image);
        $personal->update([
            'description'=>$request->desc,
            'email'=>$request->email,
            'dob'=>$request->dob,
            'price'=>$request->price,
            'image'=>$image,
            'status'=>$request->status,
            'website'=>$request->website,
            'user_id'=>$request->username,
        ]);
        return redirect()->route('personal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personal=Personaldetail::findorfail($id);
        if(is_null($personal)) {
            abort(404);
        }
        $personal->delete();
        return redirect()->route('personal.index');
    }
}

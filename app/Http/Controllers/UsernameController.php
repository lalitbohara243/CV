<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Username;
use Illuminate\Support\Str;

class UsernameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username=Username::all();
        return view('website.backend.User.index',compact('username'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.backend.User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'max:255'],
        ]);
        $slug=Str::slug($request->username,'-');
        Username::create([
            'username'=>$request->username,
            'slug'=>$slug
        ]);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $username=Username::find($id);
        //dd($productcategory);


        return view('website.backend.User.edit',compact('username'));
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
        $username=Username::find($id);

        $slug=Str::slug($request->username,'-');
        $username->update([
            'username'=>$request->username,
            'slug'=>$slug
        ]);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $username=Username::findorfail($id);
        if(is_null($username)) {
            abort(404);
        }
        $username->delete();
        return redirect()->route('user.index');
    }
}

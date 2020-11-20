<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Username;
use App\Personaldetail;
use App\Frontend;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Flash;


class FrontendController extends Controller
{
    public function index(){
        $username=Username::all();
        $personal=Personaldetail::all();
        return view('website.frontend.layouts.main',compact('username','personal'));
    }

    public function fonts(Request $request){

        $frontend=Frontend::all();

        Frontend::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,


        ]);
        Session::success('Feedback successfully given.');
        return redirect()->route('frontend.index');

    }
}

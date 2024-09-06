<?php

namespace App\Http\Controllers;
use App\Models\varieties;
use App\Models\reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MainPageController extends Controller
{
    public function mainPage()
    {
        $use = Auth::user();

        $result = varieties::all();
        $reviews = reviews::all();

        return view('welcome', ['varietie' => $result, 'reviews' => $reviews]);
    }
    public function reviews()
    {

        $result = reviews::all();
        return view('reviews', ['reviews' => $result]);
    }

    public function storereview(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'messge' => 'required',
        ]);
        $newreviws = new reviews();

        $newreviws->name = $request->name;
        $newreviws->phone = $request->phone;
        $newreviws->email = $request->email;
        $newreviws->subject = $request->subject;
        $newreviws->messge = $request->messge;
        $newreviws->save();
        return redirect('/');
    }

}

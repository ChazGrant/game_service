<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\User;

class MainController extends Controller
{
    public function home() {

        return view('home', [
            "users" => User::all()
        ]);
    }

    public function about() {
        return view('about');
    }

    public function reviews() {
        $reviews = new ContactModel();
        return view('reviews', ["reviews" => $reviews->all()]);
    }

    public function reviews_check(Request $request) {
        $valid = $request->validate([
            "email" => 'required|min:4|max:100',
            "subject" => 'required|min:4|max:100',
            "message" => 'required|min:15|max:500'
        ]);

        $review = new ContactModel();
        $review->email = $request->input("email");
        $review->subject = $request->input("subject");
        $review->message = $request->input("message");

        $review->save();

        return redirect()->route("reviews");
    }

    public function profile()
    {
        if (auth()->user())
            return view('profile');
        else
            return back();
    }

}

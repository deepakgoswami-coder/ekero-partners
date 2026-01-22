<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactQuery;

class WebSiteController extends Controller
{
    
    public function home() {
        return view('website.pages.home');
    }

    public function aboutUs() {
        return view('website.pages.aboutUs');
    }

    public function contact() {
        return view('website.pages.contact');
    }
    public function entrepreneur() {
        return view('website.pages.entrepreneur');
    }
    public function coach() {
        return view('website.pages.coach');
    }
    public function terms() {
        return view('website.pages.terms');
    }
    public function privacyPolicy() {
        return view('website.pages.privacy-policy');
    }

    public function contactUsStore(Request $request) {
         // 1. Validate
        $request->validate([
            'name'        => 'required|string|max:150',
            'email'       => 'required|email|max:150',
            'full_phone'  => 'required|string|max:20',
            'message'     => 'required|string',
        ]);

        // 2. Save to DB
        ContactQuery::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'mobile'  => $request->full_phone, // mapping here
            'message' => $request->message,
        ]);

         return redirect()->back()->with('success', 'Your query submitted successfully!');

    }

}

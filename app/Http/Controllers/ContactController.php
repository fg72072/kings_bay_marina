<?php

namespace App\Http\Controllers;

use App\Section;
use App\Setting;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $data['first_setting'] = Setting::where('section','contact-first')->first();
        $data['first_section'] = Section::where('section','contact-first')->first();
        $data['second_setting'] = Setting::where('section','contact-second')->first();
        $data['second_section'] = Section::where('section','contact-second')->first();
        $data['setting'] = Section::where('section','contact-setting')->first();
        return view('contact',$data);
    }

    public function contact(Request $req)
    {
        Mail::to($req->email)->send(new Contact($req));
        return back()->with('success','Thanks for contacting us we will back to you soon.');
    }
}

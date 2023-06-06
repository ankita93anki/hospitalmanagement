<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;

class HomeController extends Controller
{
    //
    public function index()
    {
        if(Auth::id())
        {

            return redirect('home');
        }
        else
        {
            $doctors = Doctor::all();
            return view('user.home',compact('doctors'));
        }

    }
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '0')
            {
                $doctors = Doctor::all();
                return view('user.home',compact('doctors'));
            }
            else
            {
                return view('admin.home');
            }
        }
        else
        {
           return redirect()->back();
        }
    }

    public function about()
    {
        return view('user.about');
    }

    public function doctorPage()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '0')
            {
                $doctors = Doctor::all();
                return view('user.doctorpage',compact('doctors'));
            }
            else
            {
                return view('user.home');
            }
        }
        else
        {
           return redirect()->back();
        }
    }
    public function appointment(Request $request)
    {
         $data = new Appointment;
         $data->name = $request->name;
         $data->email = $request->email;
         $data->date = $request->date;
         $data->phone = $request->number;
         $data->message = $request->message;
         $data->doctor = $request->doctor;
         $data->status = 'In-Progress';
         if(Auth::id())
         {
            $data->user_id = Auth::user()->id;
         }
         $data->save();
         return redirect()->back()->with('message','Appointment Request Successfully We will Contact You Soon.');
    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $appoint = Appointment::where('user_id', $userid)->get();
            return view('user.my_appointment',compact('appoint'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}

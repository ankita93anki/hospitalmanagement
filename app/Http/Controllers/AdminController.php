<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function addView()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == 1)
            {
                return view('admin.add_doctor');

            }
            else
            {
                 return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function upload(Request $request)
    {
       $doctor = new Doctor;
       $image= $request->file;
       $imagename = time().'.'.$image->getClientoriginalExtension();
       $request->file->move('doctorimage',$imagename);
       $doctor->image = $imagename;
       $doctor->name = $request->name;
       $doctor->phone = $request->number;
       $doctor->room = $request->room;
       $doctor->specialty = $request->speciality;
       $doctor->save();
       return redirect()->back()->with('message','Doctor Added Successfully');
    }

    public function showappointment()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == 1)
            {
               $data = Appointment::all();
               return view('admin.showappointment',compact('data'));
            }
            else
            {
                 return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function approved($id)
    {
          $data = Appointment::find($id);
          $data->status='approved';
          $data->save();
          return redirect()->back();
    }

    public function cancel($id)
    {
        $data = Appointment::find($id);
        $data->status='cancelled';
        $data->save();
        return redirect()->back();
    }

    public function showdoctor()
    {
        $data = Doctor::all();

        return view('admin.showdoctor',compact('data'));
    }

    public function updatedoctor($id)
    {
        $data = Doctor::find($id);
           return view('admin.update_doctor',compact('data'));
    }

    public function deletedoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function editdoctor(Request $request, $id)
    {
          $doctor = Doctor::find($id);
          $doctor->name = $request->name;
          $doctor->phone = $request->number;
          $doctor->specialty = $request->specialty;
          $doctor->room = $request->room;
          $image = $request->file;
          if($image)
          {
            $imagename = time().'.'.$image->getClientoriginalExtension();
            $request->file->move('doctorimage',$imagename);
            $doctor->image = $imagename;
          }
          $doctor->save();
          return redirect()->back()->with('message','Doctor Updated Successfully');

    }

    // public function sendMail($id)
    // {
    //     $data = Appointment::find($id);
    //     return view('admin.send_mail',compact('data'));
    // }
    // public function sendemail(Request $request, $id)
    // {
    //      $data = Appointment::find($id);
    //      $details = [
    //         'greeting' => $request->greeting,
    //         'body' => $request->body,
    //         'actionText' => $request->actionText,
    //         'actionUrl' => $request->actionUrl,
    //         'endPart' => $request->endPart,

    //      ];

    //      Notification::send($data,new SendEmailNotification($details));
    //      return redirect()->back();
    // }
}

<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use App\Course;
use App\Registration;
use App\Semester;
use App\Unit;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function academic_years(Request $request)
    {
        if ($request->isMethod('post')){
            $item = new AcademicYear();
            $item->name = $request->name;
            $item->save();
            Session::put('status', 'Item Saved');
            return back();
        }
        $items = AcademicYear::all();
        return view('years',compact('items'));
    }

    public function units(Request $request)
    {
        if ($request->isMethod('post')){
            $item = new Unit();
            $item->name = $request->name;
            $item->code = $request->code;
            $item->course = $request->course;
            $item->save();
            Session::put('status', 'Item Saved');
            return back();
        }
        $items = Unit::all();
        return view('units',compact('items'));
    }

    public function courses(Request $request)
    {
        if ($request->isMethod('post')){
            $item = new Course();
            $item->name = $request->name;
            $item->duration = $request->duration;
            $item->save();
            Session::put('status', 'Item Saved');
            return back();
        }
        $items = Course::all();
        return view('courses',compact('items'));
    }

    public function semesters(Request $request)
    {
        if ($request->isMethod('post')){
            $item = new Semester();
            $item->name = $request->name;
            $item->save();
            Session::put('status', 'Item Saved');
            return back();
        }
        $items = Semester::all();
        return view('semesters',compact('items'));
    }

    public function students(Request $request)
    {
        if ($request->isMethod('post')){

        }
        $items = User::whereType('student')->get();
        return view('student',compact('items'));
    }

    public function registration(Request $request)
    {
        if ($request->isMethod('post')){
            $item = new Registration();
            $item->student_id = $request->student_id;
            $item->unit_id = $request->unit_id;
            $item->a_year = $request->a_year;
            $item->semester = $request->semester;
            $item->status = '0';
            $item->save();
            Session::put('status', 'Your registration went through');
            return back();
        }
        $items = Registration::all();
        return view('registration',compact('items'));
    }

    public function enrollments(){
        $items = Registration::all();
        return view('enrollments', compact('items'));
    }

    public function enrollments_print(){
        $items = Registration::all();
        return view('enrollments_print', compact('items'));
    }
}

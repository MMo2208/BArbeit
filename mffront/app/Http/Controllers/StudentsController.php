<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    //
    public function index()
    {
      return view('students/index');
    }

    public function newStudent()
    {
      return view('students/newStudent');
    }

    public function create()
    {
      return view('students/create');
    }

    public function show($students_id)
    {
      return view('students/show');
    }
}

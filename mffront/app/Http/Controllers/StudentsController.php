<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admins as admins;

class StudentsController extends Controller
{

    /*public function __construct( Title $titles){
      $this->titles = $titles->all();
    }

    public function di() {
      dd($this->titles);
    }*/

    public function index()
    {

      $data = [];                     //data als leeres array definieren

      $obj = new \stdClass;
      $obj->id = 1;
      $obj->title = 'mr';
      $obj->name = 'john';
      $obj->last_name = 'doe';
      $obj->email = 'john@domain.com';
      $data['students'][] = $obj;      //data wird als obj definiert

      $obj = new \stdClass;
      $obj->id = 2;
      $obj->title = 'ms';
      $obj->name = 'jane';
      $obj->last_name = 'doe';
      $obj->email = 'jane@another-domain.com';
      $data['students'][] = $obj;      //data wird als obj definiert

      return view('students/index', $data);  //pass data to view
    }

    public function newStudent( Request $request )
    {
      $data = [];
      $data['title'] = $request->input('title');
      $data['name'] = $request->input('name');
      $data['last_name'] = $request->input('last_name');
      $data['address'] = $request->input('address');
      $data['zip_code'] = $request->input('zip_code');
      $data['city'] = $request->input('city');
      $data['state'] = $request->input('state');
      $data['email'] = $request->input('email');



      //$data['titles'] = $this->$titles;
      $data['modify'] = 0;

      if( $request->isMethod('post') )
      {
        //dd($data);
        $this->validate(        //form input validation
          $request,
          [
            'name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'state' => 'required',
            'email' => 'required',
          ]
        );

        return redirect('students'); //process data
      }

      return view('students/form', $data);
    }

    public function create()
    {
      return view('students/create');
    }

    public function show($students_id)
    {
      $data = [];
      //$data['titles'] = $this->$titles;
      $data['modify'] = 1;
      return view('students/form', $data);
    }
}

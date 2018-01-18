<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MF_users as MF_users;

class AdminsController extends Controller
{
    //
    public function admin()
    {

            $data = [];                     //data als leeres array definieren

            $obj = new \stdClass;
            $obj->id = 1;
            $obj->title = 'mr';
            $obj->name = 'john';
            $obj->last_name = 'doe';
            $obj->email = 'john@domain.com';
            $data['users'][] = $obj;      //data wird als obj definiert

            $obj = new \stdClass;
            $obj->id = 2;
            $obj->title = 'ms';
            $obj->name = 'jane';
            $obj->last_name = 'doe';
            $obj->email = 'jane@another-domain.com';
            $data['users'][] = $obj;      //data wird als obj definiert

          //  $data = [];
          //  $data = ['titles'] = $this->$titles;

      return view('admin/overview', $data); //pass data to view
    }

    public function newUser( Request $request, MF_users $mf_users )
    {
      $data = [];
      $data['title'] = $request->input('title');
      $data['name'] = $request->input('name');
      $data['last_name'] = $request->input('last_name');
      $data['role'] = $request->input('role');
      $data['institution'] = $request->input('institution');
      $data['pers_nr'] = $request->input('pers_nr');
      $data['email'] = $request->input('email');


      if( $request->isMethod('post') )
      {
        //dd($data);
        $this->validate(        //form input validation
          $request,
          [
            'name' => 'required',
            'last_name' => 'required',
            'role' => 'required',
            'institution' => 'required',
            'pers_nr' => 'required',
            'email' => 'required',
          ]
        );

        $mf_users->insert($data);

        return redirect('users'); //process data
      }

      //$data['titles'] = $this->$titles;
      $data['modify'] = 0;


      return view('admin/form', $data);
    }

    public function create()
    {
      return view('admin/createuser');
    }

    public function alter()
    {
      return view('admin/alteruser');
    }

    public function show($users_id)
    {
      $data = [];
      //$data['titles'] = $this->$titles;
      $data['modify'] = 1;
      return view('admin/form', $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users as Users;

class AdminsController extends Controller
{
    //
    public function __construct( Users $Users )
    {
      $this->middleware('auth:admin');
      $this->Users = $Users;
    }

    public function index() {

      return view('admin/dashboard');
    }

    public function userList() {

      $data = [];                     //data als leeres array definieren

      $data['mf_users'] = $this->Users->all();

      return view('admin/list', $data);
    }


/*    public function admin()
    {

          $data = [];                     //data als leeres array definieren

          $data['mf_users'] = $this->Users->all();

          //  $data = ['titles'] = $this->$titles;

      return view(route('admin_view'), $data); //pass data to view
    }
*/

    public function newUser( Request $request, Users $Users )
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

        $Users->insert($data);

        return redirect('admin/list'); //process data
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

    public function show($users_id, Request $request)
    {
        $data = [];
        $data['users_id'] = $users_id;
        //$data['titles'] = $this->titles;
        $data['modify'] = 1;

        $Users_data = $this->Users->find($users_id);

        $data['title'] = $Users_data->title;
        $data['name'] = $Users_data->name;
        $data['last_name'] = $Users_data->last_name;
        $data['role'] = $Users_data->role;
        $data['institution'] = $Users_data->institution;
        $data['pers_nr'] = $Users_data->pers_nr;
        $data['email'] = $Users_data->email;

/* Volatile Data*/
        $request->session()->put('last_updated', $Users_data->name . ' ' . $Users_data->last_name );

        return view('admin/form', $data);
    }

    public function modify( Request $request, $users_id, Users $Users )
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

        $Users_data = $this->Users->find($users_id);

        //$data['titles'] = $this->$titles;
        $Users_data->title = $request->input('title');
        $Users_data->name = $request->input('name');
        $Users_data->last_name = $request->input('last_name');
        $Users_data->role = $request->input('role');
        $Users_data->institution = $request->input('institution');
        $Users_data->pers_nr = $request->input('pers_nr');
        $Users_data->email = $request->input('email');

        $Users_data->save();

        return redirect('admin/dashboard'); //process data
      }

      return view('admin/form', $data);
    }
}

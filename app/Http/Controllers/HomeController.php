<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('home');
    }

    public function getUsers() {
        $users = DB::table('users')->get();
        return view('users')->with('users', $users);
    }

    public function getUserById($id) {
        $user = DB::table('users')->where('id', '=', $id)->get();
        return view('profile')->with('user', $user);
    }

    public function deleteUser($id) {
        DB::table('users')->where('id', '=', $id)->delete();
    }

    public function updateUser(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $dateofbirth = $request->input('dateofbirth');
        $email = $request->input('email');
        $editid = $request->input('editid');
        if ($firstname !='' && $lastname !='' && $dateofbirth !='' && $email != '') {
            $data = array('firstname'=>$firstname,'lastname'=>$lastname,'dateofbirth'=>$dateofbirth,'email'=>$email);
            DB::table('users')->where('id', '=', $editid)->update($data);
        }
    }
}

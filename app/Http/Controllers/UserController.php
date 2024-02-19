<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function homepage()
    {
        return view("users.home-page");
    }

    public function index(Request $request)
    {
        if($request->ajax()){
           $data = User::select('*');
           return Datatables::of($data)
                  ->addIndexColumn()
                  ->addcolumn('action',function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                  })
                  ->rawColumns(['action'])
                  ->make(true);
        }
                 return view('users.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required',  
            'role' => 'required', 
            'password'=>'required'
        ]);

        $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->role = $request->role;
        $User->password = $request->password;

        $User->save();

        return back()->withSuccess('User Created');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $User = User::where('id',$id)->first();
        
        $User->name = $request->name;
        $User->email = $request->email;
        $User->role = $request->role;

        $User->save();

        return back()->withSuccess('User Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = user::where('id', $id)->first();
        $user->delete();
        return back()->withSuccess('User Deleted');
    }
}

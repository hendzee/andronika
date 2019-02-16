<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employee;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = User::role(['ADMIN','EMPLOYEE'])
            ->get();
        
        return view('user.index', compact('data_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->syncRoles($request->role);
        
        return redirect()->route('user.index')
            ->with('success', 'Status admin dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function formChangePassword(){
        return view('user.change-password');
    }

    public function actionChangePassword(Request $request){

        $user = User::find(\Auth::id());
        if (\Hash::check($request->current_password, $user->password)){
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('dashboard.index');
        }else{
            return redirect()->back()->withErrors(['error' => 'Password salah']);
        }
    }

    public function resetPassword($id){
        $user = User::find($id);
        $user->password = bcrypt('123456');
        $user->save();

        return redirect()->back();
    }
}

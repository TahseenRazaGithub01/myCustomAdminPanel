<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Helpers\helper as Helper;
use Input;

class UserController extends Controller
{
    /**
     * Only display the users tahseen raza comments , Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::select('id','name','email','gender')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.user.listing', compact('user'));
    }

}

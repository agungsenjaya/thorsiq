<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogKategori;
use App\User;
use App\UserInfo;
use Carbon\Carbon;
use DB,Session,Str,Validator,Auth,Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.home')->with('user', User::all())->with('blog',Blog::all());
    }
    
    public function user()
    {
        return view('admin.user')->with('user', User::all()); 
    }

    public function user_detail($id)
    {
        $user = User::find($id);
        $info = UserInfo::where('user_id', $user->id)->first();
        return view('admin.user_detail',compact('user','info'));
    }
}

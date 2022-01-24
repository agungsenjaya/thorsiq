<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Blog;
use App\User;
use App\UserInfo;
use App\Event;
use App\EventUser;
use Carbon\Carbon;
use DB,Session,Str,Validator,Auth,Hash;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('owner.home')->with('user', User::all())->with('blog',Blog::all());
    }

    public function user()
    {
        return view('owner.user')->with('user', User::all());
    }
    
    public function user_new()
    {
        return view('owner.user_new');
    }
    
    public function user_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => ['required','confirmed'],
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data update telah gagal');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $adm = Role::where('name', 'admin')->first();
            $data->attachRole($adm);
            if ($data) {
                Session::flash('success','User baru telah berhasil ditambahkan kedalam database');
                return redirect()->route('owner.user');
            }
        }
    }
    
    public function user_edit($id)
    {
        $data = User::find($id);
        return view('owner.user_edit',compact('data'));
    }
    
    public function user_update(Request $request, $id)
    {
        $data = User::find($id);
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data update telah gagal');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 

            if ($request->password) {
                $pass = Validator::make($request->all(),[
                    'password' => 'required|confirmed'
                ]);
                if ($pass->fails()) {
                    Session::flash('failed','Terjadi kesalahn saat memasukan data');
                    return redirect()->back()
                                ->withErrors($pass)
                                ->withInput();
                }else{
                    $data->password = Hash::make($request->password);
                }
            }

            $data->name = $request->name; 
            $data->email = $request->email; 
            $data->save();

            if ($data) {
                Session::flash('success','User telah berhasil diupdate');
                return redirect()->route('owner.user');
            }
        }
    }

    public function user_delete($id)
    {
        $data = User::find($id);
        $data->delete();
        if ($data) {
            Session::flash('success','User telah berhasil di hapus');
            return redirect()->route('owner.user');
        }
    }

    public function user_trash()
    {
        $data = User::onlyTrashed()->get();
    	return view('owner.trash',compact('data'));
    }

    public function user_restore($id)
    {
        $data = User::onlyTrashed()->where('id',$id);
    	$data->restore();
        if ($data) {
            Session::flash('success','User telah berhasil di restore');
            return redirect()->route('owner.user');
        }
    }

    public function user_detail($id)
    {
        $user = User::find($id);
        $info = UserInfo::where('user_id', $user->id)->first();
        return view('owner.user_detail',compact('user','info'));
    }

    public function event()
    {
        return view('owner.event')->with('event', Event::all())->with('eventuser', EventUser::all()); 
    }
    
    public function event_new()
    {
        return view('owner.event_new');
    }
    
    public function event_store(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'title' => 'required|unique:events',
            'status' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data update telah gagal');
            return redirect()->back()
                        ->withErrors($valid)
                        ->withInput();
        }else{ 
            $data = Event::create([
                'user_id' => Auth::user()->id,
                'title' => strtolower($request->title),
                'status' => $request->status,
                'date' => $request->date,
                'slug' => Str::slug(strtolower($request->title))
            ]); 
            if ($data) {
                Session::flash('success','User telah berhasil di restore');
                return redirect()->route('owner.event');
            }
        }
    }

}

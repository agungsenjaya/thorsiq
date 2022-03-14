<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo;
use App\User;
use App\Blog;
use App\BlogArchive;
use App\Event;
use App\EventUser;
use DB,Session,Uuid,Validator,Auth,Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $eve; 
    public function __construct()
    {
        $this->middleware('auth');
        if (Auth::check()) {
            $find = UserInfo::where('user_id', Auth::user())->first();
            if (!$find) {
                return redirect()->to('member.account');
            }
        }

        $this->eve = Event::find(1);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('member.index');
    }
    
    public function account()
    {
        return view('home');
    }

    public function account_update(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'user_id' => 'unique:user_infos',
        ]);
        if ($valid->fails()) {
            $data = UserInfo::where('user_id',$request->user_id)->first();
            if ($request->company_name) {
                $data->company_name = $request->company_name;
            }
            if ($request->vat) {
                $data->vat = $request->vat;
            }
            $data->phone = $request->phone;
            $data->telegram_id = $request->telegram_id;
            $data->twitter_id = $request->twitter_id;
            $data->phone_2 = $request->phone_2;
            $data->city = $request->city;
            $data->zip = $request->zip;
            $data->country = $request->country;
            $data->state = $request->state;
            $data->contract_address = $request->contract_address;
            $data->street = $request->street;
            $data->save();

            if ($data) {
                Session::flash('success','Data update success');
                return redirect()->back();
            }
        }else{
            $data = new UserInfo;
            $data->user_id = $request->user_id;
            if ($request->company_name) {
                $data->company_name = $request->company_name;
            }
            if ($request->vat) {
                $data->vat = $request->vat;
            }
            $data->phone = $request->phone;
            $data->telegram_id = $request->telegram_id;
            $data->twitter_id = $request->twitter_id;
            $data->phone_2 = $request->phone_2;
            $data->city = $request->city;
            $data->zip = $request->zip;
            $data->country = $request->country;
            $data->state = $request->state;
            $data->contract_address = $request->contract_address;
            $data->street = $request->street;
            $data->save();

            if ($data) {
                Session::flash('success','Data saving success');
                return redirect()->back();
            }
            

        }
    }

    public function account_password(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data saving failed');
            return redirect()->back();
        }else{
            $data = User::find(Auth::user()->id);
            $data->password = Hash::make($request->password); 
            $data->save();
            if ($data) {
                Session::flash('success','Data saving success');
                return redirect()->back();
            }
        }
    }

    public function blog()
    {
        return view('member.blog')->with('blog', Blog::all());
    }

    public function blog_view($id)
    {
        $data = Blog::where('slug', $id)->first();
        $archive = BlogArchive::where('blog_id', $data->id)->where('user_id', Auth::user()->id)->first();
        return view('member.blog_view',compact('data','archive'));
    }

    public function portofolio()
    {
        return view('member.portofolio');
    }

    public function stacking()
    {
        return view('member.stacking');
    }
    
    public function lottery()
    {
        return view('member.lottery');
    }
    
    public function exchange()
    {
        return view('member.exchange');
    }
    
    public function investment()
    {
        return view('member.investment'); 
    }

    public function blog_archive()
    {
        $data = BlogArchive::where('user_id', Auth::user()->id)->get();
        return view('member.archive',compact('data'));
    }

    public function blog_rearchive($id)
    {
        $data = BlogArchive::find($id);
        $data->delete();
        if ($data) {
            Session::flash('liveblog','Data saving success');
            return redirect()->back();
        }
        // return view('member.contact');
    }
    
    public function contact()
    {
        return view('member.contact');
    }

    public function event()
    {
        if ($this->eve->status == 'active') {
            return view('member.event');
        }else {
            Session::flash('warning','Private sale has been ended');
            return redirect()->route('index');
        }
    }
    
    public function event_store(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'user_id' => 'unique:event_users',
            'token' => 'required'
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Data saving failed');
            return redirect()->back();
        }else{
            $data = EventUser::create([
                'user_id' => $request->user_id,
                'token' => $request->token,
                'event_id' => 1,
            ]);
            if ($data) {
                Session::flash('success','Data saving success');
                return redirect()->back();
            }
        }
    }
}

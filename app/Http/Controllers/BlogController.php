<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogKategori;
use Carbon\Carbon;
use DB,Session,Str,Validator,Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index')->with('blog', Blog::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create')->with('blogkategori', BlogKategori::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'title' => 'required|unique:blogs',
            'img' => 'required|mimes:jpg,bmp,png',
            'content' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Terjadi kesalahn saat memasukan data');
            return redirect()->back()
                        ->withErrors($valid)
                        ->withInput();
        }else{
            $img = $request->img;
            $img_new = time().($img->getClientOriginalName());
            $img->move('upload/blog', strtolower($img_new));

            $detail=$request->input('content');
            $dom = new \DomDocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= "/upload/blog/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
            $detail = $dom->saveHTML();

            $data = Blog::create([
                'title' => strtolower($request->title),
                'img' => 'upload/blog/' . strtolower($img_new),
                'user_id' => Auth::user()->id,
                'content' => $detail,
                'date' => $request->date,
                'facebook' => $request->facebook,
                'blogkategori_id' => $request->blogkategori_id,
                'youtube' => $request->youtube,
                'twitter' => $request->twitter,
                'telegram' => $request->telegram,
                'link' => $request->link,
                'status' => 'active',
                'slug' => Str::slug(strtolower($request->title))
            ]);
            if ($data) {
                Session::flash('success','Artikel baru berhasil dimasukan kedalam database');
                return redirect()->back();
            }
        }
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
        $data = Blog::find($id);
        return view('blog.edit',compact('data'))->with('blogkategori', BlogKategori::all());
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
        $data = Blog::find($id);
        $valid = Validator::make($request->all(),[
            'title' => 'required',
            'content' => 'required'
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Terjadi kesalahn saat memasukan data');
            return redirect()->back()
                        ->withErrors($valid)
                        ->withInput();
        }else{
            
            if ($request->hasFile('img')) {
                $img = $request->img;
                $img_new = time(). $img->getClientOriginalName();
                $img->move('upload/blog', strtolower($img_new));
                $data->img = 'upload/blog/' . strtolower($img_new);
            }

            libxml_use_internal_errors(true);
            $detail=$request->input('content');
            $dom = new \DomDocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= "/upload/blog/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
            $detail = $dom->saveHTML();

            $data->title = strtolower($request->title);
            $data->date = $request->date;
            $data->link = $request->link;
            $data->facebook = $request->facebook;
            $data->telegram = $request->telegram;
            $data->twitter = $request->twitter;
            $data->youtube = $request->youtube;
            $data->content = $detail;
            $data->slug = Str::slug(strtolower($request->title));
            $data->save();

            if ($data) {
                Session::flash('success','Data berhasil diupdate kedalam database');
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Blog::find($id);
        $data->delete();
        if ($data) {
            Session::flash('success','Data berhasil dihapus pada database');
            return redirect()->route('owner.blog');
        }
    }
}

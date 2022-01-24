<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Event;
use App\EventUser;
use App\BlogArchive;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function blog_search($id)
    {
        $data = Blog::where('slug',$id)->first();
        if ($data) {
            return response()->json([
                'code' => 200,
                'data' => $data
            ]);
        }
    }

    public function blog_archive(Request $request)
    {
        $data = BlogArchive::where('blog_id',$request->blog_id)->where('user_id',$request->user_id)->first();
        if ($data) {
            return response()->json([
                'code' => 200,
                'data' => 'update'
            ]);
        }else{
            $insert = BlogArchive::create([
                'blog_id' => $request->blog_id,
                'user_id' => $request->user_id
            ]);
            if ($insert) {
                return response()->json([
                    'code' => 200,
                    'data' => 'insert'
                ]);
            }
        }
    }
    
    public function blog_rearchive(Request $request)
    {
        $data = BlogArchive::where('blog_id',$request->blog_id)->where('user_id',$request->user_id)->first();
        $data->delete();
        if ($data) {
            return response()->json([
                'code' => 200,
                'data' => 'delete'
            ]);
        }
    }

    public function event_status()
    {
        $data = Event::find(1);
        if ($data->status == 'active') {
            $data->status = 'deactive';
            $data->save();
            if ($data) {
                return response()->json([
                    'code' => 200,
                    'data' => 'deactive'
                ]);
            }
        }else{
            $data->status = 'active';
            $data->save();
            if ($data) {
                return response()->json([
                    'code' => 200,
                    'data' => 'active'
                ]);
            }

        }
    }
}

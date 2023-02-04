<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\Tag;
use App\Models\MemoTag;
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
     * Show the application dashboard.a
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $posts = $request->all();
        // TODO: エラー文の日本語化
        $request->validate(['content' => 'required']);
        
        DB::transaction(function() use($posts) {
            if (!empty($posts['content'])) 
            {
                $memo_id = Memo::insertGetId(['content' => $posts['content'], 
                                              'user_id' => \Auth::id()]);

                $tag_exists = Tag::where('user_id','=',  \Auth::id())
                                    ->where('name', '=', $posts['new-tag'])
                                    ->exists();
    
                if( (!empty($posts['new-tag']) || $posts['new-tag'] === '0') && !$tag_exists) {
                    $tag_id = Tag::insertGetId(['user_id' => \Auth::id(), 'name' => $posts['new-tag']]);
                    MemoTag::insert(['memo_id' => $memo_id, 'tag_id' => $tag_id]);
                }
    
                if (!empty($posts['tags'])) {
                    foreach($posts['tags'] as $tag) {
                        MemoTag::insert(['memo_id' => $memo_id, 'tag_id' => $tag]);
                    }
                }
            } 
        });
        return redirect( route('home') );
    }


    public function edit($id) 
    {
        $edit_memos = Memo::getEditMemo($id);

        $include_tags = [];
        foreach($edit_memos as $memo) {
            array_push($include_tags, $memo['tag_id']);
        }

        return view('edit', compact('edit_memos', 'include_tags'));
    }


    public function update(Request $request)
    {
        $posts = $request->all();
        $request->validate(['content' => 'required']);

        DB::transaction(function () use($posts) {
            Memo::where('id', $posts['memo_id'])->update(['content' => $posts['content']]);
            
            MemoTag::where('memo_id', '=', $posts['memo_id'])->delete();

            foreach($posts['tags'] as $tag) {
                MemoTag::insert(['memo_id' => $posts['memo_id'], 'tag_id' => $tag]);
            }

            $tag_exists = Tag::where('user_id','=',  \Auth::id())
                ->where('name', '=', $posts['new-tag'])
                ->exists();
    
            if( (!empty($posts['new-tag']) || $posts['new-tag'] === '0') && !$tag_exists) {
                $tag_id = Tag::insertGetId(['user_id' => \Auth::id(), 'name' => $posts['new-tag']]);
                MemoTag::insert(['memo_id' => $posts['memo_id'], 'tag_id' => $tag_id]);
        }
        });
        return redirect( route('home') );
    }


    public function destroy(Request $request)
    {
        $posts = $request->all();
        
        // 論理削除
        Memo::where('id', $posts['memo_id'])->update(['deleted_at' => date("Y-m-d H:i:s", time())]);

        return redirect( route('home') );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;
    
    public $errorsMessege = array();

    public function getMyMemo() {
        $query_tag = \Request::query('tag');

        $query = Memo::query('select * memos')
            ->where('user_id', '=', \Auth::id())
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'DESC');
        
        if ( !empty($query_tag) ) {
            $query->leftJoin('memo_tags', 'memos.id', '=', 'memo_tags.memo_id')
                  ->where('memo_tags.tag_id', '=', $query_tag);
        }

        $memos = $query->get();

        // 該当しないタグを指定した場合
        if (!isset($memos)) {
            $this->errorsMessege = "指定されたタグは存在しません。";
        }
        
        return [$memos, $this->errorsMessege]; 
    }


    protected function getEditMemo($memo_id) {
        $edit_memo = Memo::select('memos.*', 'tags.id AS tag_id')
            ->leftJoin('memo_tags', 'memos.id', '=', 'memo_tags.memo_id')
            ->leftJoin('tags', 'memo_tags.tag_Id', '=', 'tags.id')
            ->where('memos.id', '=', $memo_id)
            ->whereNull('memos.deleted_at')
            ->get();
        
        return $edit_memo;
    }

}

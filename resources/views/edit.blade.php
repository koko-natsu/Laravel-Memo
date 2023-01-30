@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        新規メモ作成
        <form class="card-type" action="{{ route('destroy') }}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{ $edit_memo['id'] }}" />
            <button type="submit">削除</button>
        </form>
    </div>
    <form class="card-body" action="{{ route('update') }}" method="POST">
        @csrf
        <input type="hidden" name="memo_id" value="{{ $edit_memo['id'] }}" />
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="メモを入力">
                {{ $edit_memo['content'] }}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">変更</button>
    </form>
</div>
@endsection

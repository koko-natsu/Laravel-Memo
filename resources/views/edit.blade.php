@extends('layouts.app')

@section('javascript')
<script src="/js/comfirm.js"></script>
@endsection


@section('content')
<div class="card">
    <div class="card-header  d-flex justify-content-between">
        メモを編集
        <form id="delete-form" action="{{ route('destroy') }}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{ $edit_memos[0]['id'] }}" />
            <i class="fa-solid fa-trash" onclick="deleteHandle(event);"></i>
        </form>
    </div>
    <div class="card-body my-card-body">
        <form action="{{ route('update') }}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{ $edit_memos[0]['id'] }}" />
            <div class="form-group">
                <textarea class="form-control mb-3" name="content" rows="3" placeholder="メモを入力">{{ $edit_memos[0]['content'] }}</textarea>
            </div>
    
            @include('common.errors')
    
        @foreach($tags as $tag)
            <div class="form-check form-check-inline mb-3">
                <input class="form-check-input" type="checkbox" name="tags[]" id="{{ $tag['id'] }}" value="{{ $tag['id'] }}"\
                {{ in_array($tag['id'], $include_tags) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $tag['id'] }}">
                    {{ $tag['name'] }}
                </label>
            </div>
        @endforeach
    
            <input type="text" class="form-control w-50 mb-3" name="new-tag" placeholder="新規タグを作成"> 
            <button type="submit" class="btn btn-primary">変更</button>
        </form>
    </div>
</div>
@endsection

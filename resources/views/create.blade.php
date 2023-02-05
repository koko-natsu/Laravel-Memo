@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">新規メモ作成</div>
        <div class="card-body my-card-body">
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea class="form-control mb-3" name="content" rows="3" \
                                                placeholder="メモを入力"></textarea>
                </div>
        
                @include('common.errors')
            
            @foreach($tags as $tag)
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="checkbox" name="tags[]" \
                                                    id="{{ $tag['id'] }}" value="{{ $tag['id'] }}"/>
                    <label for="{{ $tag['id'] }}" class="form-check-label">
                        {{ $tag['name'] }}
                    </label>
                </div>
            @endforeach
                <input type="text" class="form-control w-50 mb-3" name="new-tag" \
                                                     placeholder="新規タグを入力" />
                <button type="submit" class="btn btn-primary">保存</button>
            </form>
        </div>
    </div>
</div>
@endsection

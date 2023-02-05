
<div class="card">
    <div class="card-header d-flex justify-content-between">メモ一覧
    @if (Request::routeIs('edit'))
        <a href="{{ route('home')  }}"><i class="fa-solid fa-circle-plus"></i></a>
    @endif
    </div>
    <div class="card-body my-card-body">
        @foreach($memos as $memo)
            <a href="/edit/{{ $memo['id'] }}" class="card-text d-block ellipsis mb-2" >{{ $memo['content'] }}</a>
        @endforeach
    </div>
</div>
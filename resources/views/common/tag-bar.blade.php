
<div class="card">
    <div class="card-header">タグ一覧</div>
        <div class="card-body my-card-body">
            <a href="/" class="card-text d-block mb-2">すべて表示</a>
        @foreach($tags as $tag)
            <a href="/?tag={{ $tag['id'] }}" class="card-text d-block ellipsis mb-2" >{{ $tag['name'] }}</a>
        @endforeach
    </div>
</div>
<div class="col-md-2 p-0">
  <div class="card">
      <div class="card-header">タグ一覧</div>
      <div class="card-body">
          <div class="cord-body">
              <a href="/" class="card-text d-block">すべて表示</a>
          @foreach($tags as $tag)
              <a href="/?tag={{ $tag['id'] }}" class="card-text d-block" >{{ $tag['name'] }}</a>
          @endforeach
          </div>
      </div>
  </div>
</div>
<div class="col-md-4 p-0">
  <div class="card">
      <div class="card-header">メモ一覧</div>
      <div class="card-body">
          <div class="cord-body">
          @foreach($memos as $memo)
              <a href="/edit/{{ $memo['id'] }}" class="card-text d-block" >{{ $memo['content'] }}</a>
          @endforeach
          </div>
      </div>
  </div>
</div>
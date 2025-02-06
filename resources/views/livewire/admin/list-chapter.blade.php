<div>
    {{-- Success is as dangerous as failure. --}}

    <!-- Rounded Blocks -->
    <h2 class="content-heading">Title: {{$story->title}}</h2>
    <div class="row">
      <div class="col-md-12">
        <div class="block block-rounded">
          <div class="block-header block-header-default">
            <h3 class="block-title">Description <small>- {{$story->category->name}}</small></h3>
          </div>
          <div class="block-content">
            <p>{{$story->description}}.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- END Rounded Blocks -->
    <p>List of Chapters - {{ $story->chapters->count() }}</p>
    <ul class="list-group">
        @foreach ($story->chapters as $chapter)
            <a href="{{ url('admin/story/chapter/read/'.$chapter->slug) }}">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$chapter->title}}
                <span>{{ $chapter->created_at }}</span>
                </li>
            </a>
        @endforeach
    </ul>
    @if($story->is_published == 0)
        <a class="btn btn-secondary mt-2" href="{{ url('publish/story/'.$story->slug) }}">
            <i class="fa fa-fw fa-location-arrow opacity-50"></i> Happy!...Publish Story
        </a>
    @endif

</div>

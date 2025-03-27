<div>
    {{-- Do your work, then step back. --}}
    <h2 class="content-heading">{{ucfirst($status)}} Stories</h2>
    <table class="table">
        <thead class="thead-dark table-responsive">
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Chapters</th>
            <th scope="col">Creator</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($stories as $story)
            <tr>
                <td>{{$story->title}}</td>
                <td>{{@$story->category->name}}</td>
                <td>{{$story->chapters->count()}}</td>
                <td>{{$story->user->name}}</td>
                <td><a href="{{ url('admin/story/chapter/'.$story->slug) }}" class="btn btn-sm btn-secondary">View Chapters</a></td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="mt-4">
        {{ $stories->links() }}
    </div>
    


</div>

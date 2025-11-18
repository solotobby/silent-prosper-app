<div>
    {{-- Care about people's approval and you will be their prisoner. --}}


    {{-- <div class="bg-image" style="background-image: url('{{asset('src/assets/media/photos/photo13@2x.jpg')}}');"> --}}
    <div class="bg-image" style="background-image: url('{{ asset('storage/' . $chapterPreview->story->img) }}');">
        <div class="bg-black-75">
          <div class="content content-top content-full text-center">
            <h1 class="fw-bold text-white mt-5 mb-3">
              {{ $chapterPreview->title }}
            </h1>
            <h2 class="h3 fw-normal text-white-75 mb-5">{{$chapterPreview->story->title}}</h2>
            <p>
              <span class="badge rounded-pill bg-primary fs-base px-3 py-2 me-2 m-1">
                <i class="fa fa-user-circle me-1"></i> by  {{ $chapterPreview->user->name }}
              </span>
              {{-- <span class="badge rounded-pill bg-primary fs-base px-3 py-2 m-1">
                <i class="fa fa-clock me-1"></i> {{ readTime($chapterPreview->read_time) }} read
              </span> --}}
            </p>
          </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-sm-8 py-5">
          <!-- Story -->
           <article class="js-gallery story">
             {!! nl2br(e($chapterPreview->body)) !!}
           </article>
           <hr>
           <!-- END Story -->
        <div class="d-flex justify-content-between">
            <a href="{{ url('edit/story/chapter/'.$chapterPreview->slug) }}" class="btn btn-sm btn-primary">Edit Chapter</a>
            <a href="{{ url('write/'.$chapterPreview->story->slug) }}" class="btn btn-sm btn-secondary">Write New Chapter</a>
        </div>

           {{-- <a href="{{ url('edit/story/chapter/'.$chapterPreview->slug) }}" class="btn btn-sm btn-primary">Edit Chapter</a>
           <a href="{{ url('write/'.$chapterPreview->story->slug) }}" class="btn btn-sm btn-secondary">Write New Chapter</a> --}}
        </div>
    </div>


</div>

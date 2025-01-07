<div>
    {{-- Stop trying to control. --}}
    <h2 class="content-heading">Title: {{ $story->title }}</h2>
    <form wire:submit.prevent="post" enctype="multipart/form-data">
        <div class="block">
          <div class="block-header block-header-default">
            <a class="btn btn-alt-secondary" href="{{ url('profile/'.$story->user_id) }}">
              <i class="fa fa-arrow-left me-1"></i> My Stories
            </a>
            
          </div>
          <div class="block-content">
            <div class="row justify-content-center push">
                {{-- @if($story->is_book)
                    <div class="alert alert-info">
                        You're writing a Story, this is Chapter 1
                    </div>
                @endif --}}

                <div class="col-md-10">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                @if(!$story->is_book)
                    <div class="mb-4">
                        <label class="form-label" for="dm-post-add-title">Title</label>
                        <input type="text" class="form-control" id="dm-post-add-title" wire:model="title" value="{{ $story->title }}">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                @else
                    <div class="mb-4">
                        <label class="form-label" for="dm-post-add-title">Title</label>
                        <input type="text" class="form-control" id="dm-post-add-title" wire:model="title" placeholder="Chapter Title">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                @endif
              
                <div class="mb-4">
                  <label class="form-label">Body</label>
                  <textarea name="dm-post-add-body" rows="12" class="form-control" wire:model="body" required></textarea>
                  {{-- <textarea id="js-ckeditor" name="dm-post-add-body" wire:model="body"></textarea> --}}
                </div>

              </div>
            </div>
          </div>
          <div class="block-content bg-body-light">
            <div class="row justify-content-center push">
              <div class="col-md-10">
                <button type="submit" class="btn btn-alt-primary">
                  <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Submit Story
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>


    <script src="{{asset('src/assets/js/dashmix.app.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('src/assets/js/plugins/ckeditor/ckeditor.js')}}"></script>

    <!-- Page JS Helpers (CKEditor plugin) -->
    <script>
            Dashmix.onLoad(function () {
              CKEDITOR.config.height = '450px';
              Dashmix.helpers(['js-ckeditor']);
            });
    </script>



</div>

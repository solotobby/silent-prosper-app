<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <h2 class="content-heading">Story Details</h2>
        <!-- New Post -->
        <form wire:submit.prevent="saveStory" enctype="multipart/form-data">
          <div class="block">
            <div class="block-header block-header-default">
              <a class="btn btn-alt-secondary" href="{{ url('profile/'.auth()->user()->id) }}">
                <i class="fa fa-arrow-left me-1"></i> My Stories
              </a>
              
            </div>
            <div class="block-content">
              <div class="row justify-content-center push">
                <div class="col-md-10">

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                  <div class="mb-4">
                    <label class="form-label" for="dm-post-add-title">Title</label>
                    <input type="text" class="form-control" id="dm-post-add-title" wire:model="title" placeholder="Enter a title..">
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="dm-post-add-excerpt">Excerpt</label>
                    <textarea class="form-control" id="dm-post-add-excerpt" wire:model="description" rows="3" placeholder="Enter an excerpt.."></textarea>
                    <div class="form-text">Visible on blog post list as a small description of the post.</div>
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>

                  {{-- <input type="text" wire:model="is_book"> --}}

                  <div class="mb-4">
                    <label class="form-label" for="dm-post-add-title">Story Type</label>
                    <select wire:model="is_book" class="form-control" required>
                        <option value="">Select Story Type</option>
                        <option value="1">Book</option>
                        <option value="0">Short Story</option>
                       
                    </select>
                    @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>


                  <div class="mb-4">
                    <label class="form-label" for="dm-post-add-title">Category</label>
                    <select wire:model="category" id="category" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $cate)
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endforeach
                    </select>
                    @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>

                  <div class="mb-4">
                    <label class="form-label" for="dm-post-add-title">Rating</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="dm-post-add-active" wire:model="is_xrated">
                        <label class="form-check-label" for="dm-post-add-active">Set as Matured</label>
                    </div>
                  </div>

                  <div class="row mb-4">
                    <div class="col-xl-6">
                      <label class="form-label" for="dm-post-add-image">Featured Image</label>
                      <input class="form-control" type="file" wire:model="img" id="dm-post-add-image">
                      @error('img') <span class="text-danger">{{ $message }}</span> @enderror

                       @if ($img)
                        <div class="mt-2">
                          @if (is_object($img) && method_exists($img, 'temporaryUrl'))
                            <!-- New file uploaded: display the temporary preview -->
                            <img src="{{ $img->temporaryUrl() }}" alt="Image Preview" class="img-fluid">
                          @else
                            <!-- Existing image: display the stored image (adjust the path as needed) -->
                            <img src="{{  $img }}" alt="Current Image" class="img-responsive img-thumbnail" sizes="50">
                          @endif
                        </div>
                      @endif 

                    </div>
                  </div>
               
                </div>
              </div>
            </div>
            <div class="block-content bg-body-light">
              <div class="row justify-content-center push">
                <div class="col-md-10">
                  <button type="submit" class="btn btn-alt-primary">
                    <i class="fa fa-fw fa-check opacity-50 me-1"></i>    {{ $slug ? 'Update Post' : 'Continue' }}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <!-- END New Post -->

         <!-- Page JS Plugins -->
    <script src="{{ asset('src/assets/js/plugins/ckeditor/ckeditor.js')}}"></script>

    <!-- Page JS Helpers (CKEditor plugin) -->
    <script>
            Dashmix.onLoad(function () {
              CKEDITOR.config.height = '450px';
              Dashmix.helpers(['js-ckeditor']);
            });
    </script>

</div>

<div>
  
    <div class="row">
        <div class="card mb-4">

            <div class="card-body">
            <form>
                <div class="input-group">
                  <input type="text" class="form-control form-control-alt" placeholder="Search a book title...">
                  <button type="submit" class="btn btn-primary border-0">
                    <i class="fa fa-search opacity-50 me-1"></i>
                  </button>
                </div>
            </form>
            </div>

        </div>

         <!-- Cover Link Stories -->
         <h2 class="content-heading">Cover Link Stories</h2>
         <div class="row items-push">
            @foreach ($stories as $story)
                <div class="col-md-6 col-xl-4">
                <!-- Story #9 -->
                {{-- <a class="block block-rounded bg-image h-100 mb-0" style="background-image: url('assets/media/photos/photo9.jpg');" href="javascript:void(0)"> --}}
               
                <a class="block block-rounded bg-image h-100 mb-0" style="background-image: url({{asset('src/assets/media/photos/photo9.jpg')}});" href="{{url('show/'.$story->slug)}}">
                <div class="block-content bg-black-50">
                    <div class="mb-5 mb-sm-7 d-sm-flex justify-content-sm-between align-items-sm-center">
                    <p>
                        <span class="badge bg-primary fw-bold p-2 text-uppercase">
                        {{$story->category->name}}
                        </span>
                    </p>
                    <p class="fs-sm">
                        <span class="text-white fw-semibold me-1">
                        <i class="fa fa-fw fa-eye text-white-50"></i> 400
                        </span>
                        <span class="text-white fw-semibold me-1">
                        <i class="fa fa-fw fa-heart text-white-50"></i> 89
                        </span>
                        {{-- <span class="text-white fw-semibold me-1">
                        <i class="fa fa-fw fa-comments text-white-50"></i> 44
                        </span> --}}
                    </p>
                    </div>
                    <p class="fs-lg fw-bold text-white mb-1">
                   {{$story->title}}
                    </p>
                    <p class="fw-medium text-white-75">
                        {{$story->user->name}} &middot; 12 min
                    </p>
                </div>
                </a>
                <!-- END Story #9 -->
                </div>
            @endforeach

           
         </div>
         <!-- END Cover Link Stories -->

        {{-- <div class="col-md-12 col-sm-8">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @include('layouts.resources.stories', $stories)

        </div> --}}

    </div>

     <!-- Bootstrap Modal -->
     <div class="modal fade" id="storyModal" tabindex="-1" aria-labelledby="storyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="storyModalLabel">Create a Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Livewire form -->
                    <form wire:submit.prevent="post">
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" class="form-control" wire:model="content" rows="4" placeholder="Write something..."></textarea>
                            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="category">Category</label>
                            <select id="category" class="form-control" wire:model="category_id">
                                <option value="">Select a category</option>
                                {{-- @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach --}}
                            </select>
                            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function showModal() {
            const modal = new bootstrap.Modal(document.getElementById('storyModal'));
            modal.show();
        }

        function toggleComment(storyId) {
            const commentBox = document.getElementById(`comment-${storyId}`);
            commentBox.style.display = commentBox.style.display === 'none' ? 'block' : 'none';
        }

        // Close modal when Livewire triggers 'close-modal' event
        window.addEventListener('close-modal', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('storyModal'));
            modal.hide();
        });
    </script>
</div>

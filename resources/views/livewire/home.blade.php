<div>
  
    <div class="row">
        <div class="col-md-8 col-sm-8">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif


            <div class="card mb-4">

                <div class="card-body">
                <form action="db_social_compact.html" method="POST" onsubmit="return false;">
                    <div class="input-group">
                      <input type="text" class="form-control form-control-alt" placeholder="What’s happening?" 
                      onclick="showModal()">
                      {{-- <button type="submit" class="btn btn-primary border-0">
                        <i class="fa fa-pencil-alt opacity-50 me-1"></i> Post
                      </button> --}}
                    </div>
                </form>
                </div>

                {{-- <form wire:submit.prevent="post">
                <div class="card-body">
                    <textarea wire:model="content" name="content" class="form-control form-control-alt @error('content') is-invalid @enderror" placeholder="It is a safe and anonymous to share your sexual experience" required></textarea>
                    @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                
                <div class="card-footer">
                    <button class="btn btn-primary btn-block"> <i class="fa fa-pencil-alt opacity-50 me-1"></i> Post</button>
                </div>
                </form> --}}
            </div>

            @include('layouts.resources.stories', $stories)

        </div>

        <div class="col-md-4 col-sm-4">
            srhdfgjdghj
        </div>

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

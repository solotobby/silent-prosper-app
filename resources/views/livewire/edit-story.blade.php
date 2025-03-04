<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <h2 class="content-heading">Edit Story</h2>

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="block">
          <div class="block-header block-header-default">
            <a class="btn btn-alt-secondary" href="{{ url('profile/'.auth()->user()->username) }}">
              <i class="fa fa-arrow-left me-1"></i> My Stories
            </a>
            
          </div>
          <div class="block-content">
            <div class="row justify-content-center push">
              <div class="col-md-10">
                <div class="mb-4">
                  <label class="form-label" for="dm-post-add-title">Title</label>
                  <input type="text" class="form-control" id="dm-post-add-title" wire:model="title" placeholder="Enter a title.." value="{{ $story->title }}">
                  @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                  <label class="form-label" for="dm-post-add-excerpt">Excerpt</label>
                  <textarea class="form-control" id="dm-post-add-excerpt" wire:model="description" rows="3" placeholder="Enter an excerpt.."></textarea>
                  <div class="form-text">Visible on blog post list as a small description of the post.</div>
                  @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                  <label class="form-label" for="dm-post-add-title">Story Type</label>
                  <select wire:model="is_book" class="form-control" required>
                      <option value="">Select Story Type</option>
                      <option value="1">Set as a Book</option>
                      <option value="0">Set as Short Story</option>
                     
                  </select>
                  @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                </div>


                <div class="mb-4">
                  <label class="form-label" for="dm-post-add-title">Category</label>
                  <select wire:model="category" class="form-control" required>
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
                      <input class="form-check-input" type="checkbox" value="1" id="dm-post-add-active" wire:model="is_xrated">
                      <label class="form-check-label" for="dm-post-add-active">Set as Matured</label>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-xl-6">
                    <label class="form-label" for="dm-post-add-image">Featured Image</label>
                    <input class="form-control" type="file" wire:model="img" id="dm-post-add-image">
                    @error('img') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>
             
              </div>
            </div>
          </div>
          <div class="block-content bg-body-light">
            <div class="row justify-content-center push">
              <div class="col-md-10">
                <button type="submit" class="btn btn-alt-primary">
                  <i class="fa fa-fw fa-check opacity-50 me-1"></i> Continue
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>


</div>

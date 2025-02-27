<div>
  
    <div class="row">
        <div class="card mb-4">

            <div class="card-body">
           
                <div class="input-group">
                  <input type="text"
                  wire:model.live="q"
                  class="form-control form-control-alt" 
                  placeholder="Search a book title...">

                  {{-- <button type="submit" class="btn btn-primary border-0">
                    <i class="fa fa-search opacity-50 me-1"></i>
                  </button> --}}
                </div>
            
            </div>

        </div> 

         <!-- Cover Link Stories -->
         {{-- <h2 class="content-heading">Cover Link Stories</h2> --}}

          <!-- Loading Indicator -->
    <div wire:loading class="text-gray-500 mb-4">
        Searching...
    </div>

 

         <div class="row items-push">
            @if($stories->count())
                @foreach ($stories as $story)
                    <div class="col-md-6 col-xl-4">
                    <!-- Story #9 -->
                    {{-- <a class="block block-rounded bg-image h-100 mb-0" style="background-image: url('assets/media/photos/photo9.jpg');" href="javascript:void(0)"> --}}
                
                    <a class="block block-rounded bg-image h-100 mb-0" style="background-image: url({{asset($story->img)}});" href="{{url('show/'.$story->slug)}}">
                    <div class="block-content bg-black-50">
                        <div class="mb-5 mb-sm-7 d-sm-flex justify-content-sm-between align-items-sm-center">
                        <p>
                            <span class="badge bg-primary fw-bold p-2 text-uppercase">
                            {{$story->category->name}}
                            </span>
                        </p>
                        <p class="fs-sm">
                            <span class="text-white fw-semibold me-1">
                                <i class="fa fa-fw fa-eye text-white-50"></i> {{ $story->views_count }}
                            </span>
                            <span class="text-white fw-semibold me-1">
                                <i class="fa fa-fw fa-heart text-white-50"></i> {{ $story->likes_count }}
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

                <div class="mt-4">
                    {{ $stories->links() }}
                </div>
                
            @else 
                <div class="alert alert-info">There are no stories</div>
            @endif

            

           
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

    @if(auth()->user()->gender == 'Not-Yet-Decided')
    <!-- Vertically Centered Block Modal -->
    {{-- <div class="modal" id="modal-block-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true"> --}}
    <div class="modal fade" id="modal-onboarding" tabindex="-1" data-bs-backdrop="static" 
        data-bs-keyboard="false"  role="dialog" aria-labelledby="modal-onboarding" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
              <div class="block-header bg-primary-dark">
                <h3 class="block-title">Kindly Select your Gender</h3>
                <div class="block-options">
                  {{-- <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-fw fa-times"></i>
                  </button> --}}
                </div>
              </div>
              <div class="block-content">
                <form  wire:submit.prevent="updateGender" >
                    <div class="mb-3">
                        <label class="form-label" for="dm-post-adds">Gender</label>
                        <br>
                        <select wire:model="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        {{-- <input type="radio" wire:model="gender" value="Male" id="checkbox1" /> 
                        <label aria-colspan="checkbox1" for="checkbox1">
                            Male </label>
                        
                        <input type="radio"  wire:model="gender" value="Female" id="checkbox2" /> 
                        <label aria-colspan="checkbox2" for="checkbox2">Female</label> --}}
                        
                    </div>
                   
                
              </div>
              <div class="block-content block-content-full text-end bg-body">
                {{-- <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>--}}
                <button type="submit" class="btn btn-sm btn-primary">Continue</button> 
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- END Vertically Centered Block Modal -->
    @endif



     

<!-- Page JS Code -->
<script src="{{asset('src/assets/js/pages/be_comp_onboarding.min.js')}}"></script>
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

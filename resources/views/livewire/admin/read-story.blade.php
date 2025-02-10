<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="col-lg-12">

         <div class="col-md-12">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">{{ $chapter->title }}</h3>
                <div class="block-options">
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                  {{-- <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                    <i class="si si-pin"></i>
                  </button> --}}
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                  </button>
                  {{-- <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                    <i class="si si-close"></i>
                  </button> --}}
                </div>
              </div>
              <div class="block-content">
                <p> {!! nl2br(e($chapter->body)) !!} </p>
              </div>
            </div>
         </div>

         <div class="d-flex justify-content-between">
            <a onclick="window.history.back();" class="btn btn-primary btn-sm">
                <i class="fa fa-fw fa-arrow-left opacity-50"></i> Previous Page
            </a>
            
            @if($nextChapter)
            {{-- http://localhost:8006/admin/story/chapter/read/chapter-1-42661 --}}
            {{-- <button type="button" class="btn btn-secondary">Right Button</button> --}}
              <a href="{{ url('admin/story/chapter/read/'.$nextChapter->slug) }}" class="btn btn-primary mt-2 ">
                Continue to Next Chapter
              </a>
            @else
            
                <a  class="btn btn-primary mt-3 disabled">
                Story has ended
                </a>
            @endif

           
          </div>

         
         
       

         
          


    </div>
</div>

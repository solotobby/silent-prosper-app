<div>
    {{-- Stop trying to control. --}}

     <div class="row">
             <h2 class="content-heading">BookShelf - {{ $stories->count() }}</h2>
       
             @include('layouts.resources.stories', $stories)

</div>

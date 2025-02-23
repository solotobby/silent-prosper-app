<div>
    {{-- Stop trying to control. --}}

     <div class="row">
             <h2 class="content-heading">BookShelf - {{ $stories->count() }}</h2>
             <div class="col-xl-12">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @include('layouts.resources.stories', $stories)
             </div>

</div>

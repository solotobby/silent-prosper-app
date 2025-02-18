<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="block-content">
        <div class="row justify-content-center py-sm-3 py-md-5">
          <div class="col-sm-10 col-md-6">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session()->has('fail'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('fail') }}
                    </div>
                @endif

            <form action="" method="POST" wire:submit.prevent="saveCategory">
            
                
                <div class="mb-4">
                    <div class="form-group">
                        <label for="accountNumber">Category Name</label>
                        <input type="text" required class="form-control" id="accountNumber" wire:model="name" placeholder="Enter Category Name">
                    </div>
                    <div style="color: brown">@error('name') {{ $message }} @enderror</div>
                </div>
                <button type="submit" class="btn btn-sm btn-alt-primary mt-3">
                    <i class="fa fa-check opacity-50 me-1"></i> Submit
                </button>
         
            </form>

            <h2 class="content-heading">List of Category</h2>
            <table class="table">
                <thead class="thead-dark table-responsive">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $story)
                    <tr>
                        <td>{{$story->name}}</td>
                        <td>{{$story->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{-- {{ $categories->links() }} --}}
            </div>


          </div>
        </div>
    </div>

</div>

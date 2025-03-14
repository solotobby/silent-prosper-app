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
{{-- 
            <form wire:submit.prevent="postCategory" class="mb-4">
            
                
                <div class="mb-4">
                    <div class="form-group">
                        <label for="accountNumber">Category Name</label>
                        <input type="text" required class="form-control" id="accountNumber" wire:model="name" placeholder="Enter Category Name">
                    </div>
                    <div style="color: brown">@error('name') {{ $message }} @enderror</div>
                </div>
                <button type="submit" class="btn btn-sm btn-alt-primary">
                    <i class="fa fa-check opacity-50 me-1"></i> Save Category Name
                </button>
         
            </form> --}}

            <form wire:submit.prevent="saveSubCategory">
            
                <div class="mb-4">
                    <div class="form-group">
                        <label for="accountNumber">Select Category</label>
                        <select class="form-control" wire:model="category_id" required> 
                            <option value="">Selecte One</option>
                           
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach
                           
                        </select>
                        {{-- <input type="text" required class="form-control" id="accountNumber" wire:model="name" placeholder="Enter Category Name"> --}}
                    </div>
                    <div style="color: brown">@error('name') {{ $message }} @enderror</div>
                </div>

                <div class="mb-4">
                    <div class="form-group">
                        <label for="accountNumber">SubCategory Name</label>
                        <input type="text" required class="form-control" wire:model="subCategory_name" placeholder="Enter Category Name">
                    </div>
                    <div style="color: brown">@error('name') {{ $message }} @enderror</div>
                </div>
                <button type="submit" class="btn btn-sm btn-alt-primary">
                    <i class="fa fa-check opacity-50 me-1"></i> Save Sub Category Name
                </button>
         
            </form>

            <h2 class="content-heading">List of Category</h2>
            <table class="table">
                <thead class="thead-dark table-responsive">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">SubCategory Count</th>
                    <th scope="col">Status</th>
                    
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $story)
                    <tr>
                        <td>{{$story->name}}</td>
                        <td>{{$story->subCategory()->count()}}</td>
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

<div>
    {{-- Because she competes with no one, no one can compete with her. --}}


    <!-- Hero -->
    <div class="bg-image" style="background-image: url('{{asset('src/assets/media/photos/photo13@2x.jpg')}}');">
        <div class="bg-black-75">
          <div class="content content-full">
            <div class="py-5 text-center">
              <a class="img-link" href="">
                <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('src/assets/media/avatars/avatar10.jpg') }}" alt="">
              </a>
              <h1 class="fw-bold my-2 text-white">{{ auth()->user()->name }}</h1>
              <h2 class="h4 fw-bold text-white-75">
                <span>@</span>{{ auth()->user()->username }}
              </h2>
              <a class="btn btn-secondary" href="{{ url('profile/'.auth()->user()->username) }}">
                <i class="fa fa-fw fa-arrow-left opacity-50"></i> Back to Profile
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- END Hero -->

      <!-- Results -->
      <div class="block block-rounded mt-3">
        <ul class="nav nav-tabs nav-tabs-block" role="tablist">
          <li class="nav-item">
            <button class="nav-link active" id="search-classic-tab" data-bs-toggle="tab" data-bs-target="#search-classic" role="tab" aria-controls="search-classic" aria-selected="true">
              Basics
            </button>
          </li>
          {{--<li class="nav-item">
            <button class="nav-link" id="search-photos-tab" data-bs-toggle="tab" data-bs-target="#search-photos" role="tab" aria-controls="search-photos" aria-selected="false">
              Account
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link" id="search-customers-tab" data-bs-toggle="tab" data-bs-target="#search-customers" role="tab" aria-controls="search-customers" aria-selected="false">
              Subscriptions
            </button>
          </li>
           <li class="nav-item">
            <button class="nav-link" id="search-projects-tab" data-bs-toggle="tab" data-bs-target="#search-projects" role="tab" aria-controls="search-projects" aria-selected="false">
              Projects
            </button>
          </li> --}}
        </ul>
        <div class="block-content tab-content overflow-hidden">
          <!-- Classic -->
          <div class="tab-pane fade show active" id="search-classic" role="tabpanel" aria-labelledby="search-classic-tab">
           
                <div class="block-content">
                    <form wire:submit.prevent="updateSettings" enctype="multipart/form-data">
                    <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-user-circle text-muted me-1"></i> Your basic information
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Your account’s vital info. Your name and username will be publicly visible.
                            </p>
                        </div>
                        <div class="col-lg-8 ">

                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            {{-- <div class="col-lg-10 col-xl-5"> --}}

                        <div class="mb-4">
                            <label class="form-label" for="dm-profile-edit-name">Name</label>
                            <input type="text" class="form-control"  wire:model="name">
                            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="dm-profile-edit-username">Username</label>
                            <input type="text" class="form-control"  wire:model="username" readonly>
                            @error('username') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label" for="dm-profile-edit-email">Email Address</label>
                            <input type="email" class="form-control" id="dm-profile-edit-email" wire:model="email" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="dm-profile-edit-email">Gender</label>
                            <input type="email" class="form-control" id="dm-profile-edit-email" wire:model="gender" disabled>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="dm-profile-edit-email">Write something about you</label>
                            <textarea wire:model="about" class="form-control" rows="7"></textarea>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary">
                            <i class="fa fa-check-circle opacity-50 me-1"></i> Update Profile
                            </button>
                        </div>
                        
                       
                        {{-- <div class="mb-4">
                            <label class="form-label">Your Avatar</label>
                            <div class="push">
                            <img class="img-avatar" src="{{asset('src/assets/media/avatars/avatar10.jpg')}}" alt="">
                            </div>
                            <label class="form-label" for="dm-profile-edit-avatar">Choose a new avatar</label>
                            <input class="form-control" type="file" id="dm-profile-edit-avatar">
                        </div> --}}
                        </div>
                    </div>
                    <!-- END User Profile -->

                    

                    

                    <!-- Connections -->
                    {{-- <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-share-alt text-muted me-1"></i> Connections
                    </h2> --}}
                    {{-- <div class="row push">
                        <div class="col-lg-4">
                        <p class="text-muted">
                            You can connect your account to third party networks to get extra features.
                        </p>
                        </div>
                        <div class="col-lg-8 col-xl-7">
                        <div class="row mb-4">
                            <div class="col-sm-10 col-md-8 col-xl-6">
                            <a class="btn w-100 btn-alt-danger text-start" href="javascript:void(0)">
                                <i class="fab fa-fw fa-google opacity-50 me-1"></i> Connect to Google
                            </a>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-10 col-md-8 col-xl-6">
                            <a class="btn w-100 btn-alt-info text-start" href="javascript:void(0)">
                                <i class="fab fa-fw fa-twitter opacity-50 me-1"></i> Connect to Twitter
                            </a>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-10 col-md-8 col-xl-6">
                            <a class="btn w-100 btn-alt-primary bg-white d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>
                                <i class="fab fa-fw fa-facebook me-1"></i> John Doe
                                </span>
                                <i class="fa fa-fw fa-check me-1"></i>
                            </a>
                            </div>
                            <div class="col-sm-12 col-md-4 col-xl-6 mt-1 d-md-flex align-items-md-center fs-sm">
                            <a class="btn btn-sm btn-alt-secondary rounded-pill" href="javascript:void(0)">
                                <i class="fa fa-fw fa-pencil-alt opacity-50 me-1"></i> Edit Facebook Connection
                            </a>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-10 col-md-8 col-xl-6">
                            <a class="btn w-100 btn-alt-warning bg-white d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>
                                <i class="fab fa-fw fa-instagram me-1"></i> @john_doe
                                </span>
                                <i class="fa fa-fw fa-check me-1"></i>
                            </a>
                            </div>
                            <div class="col-sm-12 col-md-4 col-xl-6 mt-1 d-md-flex align-items-md-center fs-sm">
                            <a class="btn btn-sm btn-alt-secondary rounded-pill" href="javascript:void(0)">
                                <i class="fa fa-fw fa-pencil-alt opacity-50 me-1"></i> Edit Instagram Connection
                            </a>
                            </div>
                        </div>
                        </div>
                    </div> --}}
                    <!-- END Connections -->

                    

                    
                    </form>
                </div>
          </div>
          <!-- END Classic -->

          <!-- Photos -->
          <div class="tab-pane fade" id="search-photos" role="tabpanel" aria-labelledby="search-photos-tab">
            <div class="fs-3 fw-semibold pt-2 pb-4 mb-4 text-center border-bottom">
              <span class="text-primary fw-bold">36</span> photos found for <mark class="text-danger">inspiration</mark>
            </div>
            <div class="row g-sm push">
              <div class="col-md-6 col-lg-4 push">
                <img class="img-fluid" src="assets/media/photos/photo1.jpg" alt="">
              </div>
              <div class="col-md-6 col-lg-4 push">
                <img class="img-fluid" src="assets/media/photos/photo2.jpg" alt="">
              </div>
              <div class="col-md-6 col-lg-4 push">
                <img class="img-fluid" src="assets/media/photos/photo6.jpg" alt="">
              </div>
              <div class="col-md-6 col-lg-4 push">
                <img class="img-fluid" src="assets/media/photos/photo21.jpg" alt="">
              </div>
              <div class="col-md-6 col-lg-4 push">
                <img class="img-fluid" src="assets/media/photos/photo22.jpg" alt="">
              </div>
              <div class="col-md-6 col-lg-4 push">
                <img class="img-fluid" src="assets/media/photos/photo9.jpg" alt="">
              </div>
              <div class="col-md-6 col-lg-4 push">
                <img class="img-fluid" src="assets/media/photos/photo23.jpg" alt="">
              </div>
              <div class="col-md-6 col-lg-4 push">
                <img class="img-fluid" src="assets/media/photos/photo24.jpg" alt="">
              </div>
              <div class="col-md-6 col-lg-4 push">
                <img class="img-fluid" src="assets/media/photos/photo25.jpg" alt="">
              </div>
            </div>
            <nav aria-label="Photos Search Navigation">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                    <span aria-hidden="true">
                      <i class="fa fa-angle-double-left"></i>
                    </span>
                    <span class="visually-hidden">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="javascript:void(0)">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">4</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)" aria-label="Next">
                    <span aria-hidden="true">
                      <i class="fa fa-angle-double-right"></i>
                    </span>
                    <span class="visually-hidden">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- END Photos -->

          <!-- Customers -->
          <div class="tab-pane fade" id="search-customers" role="tabpanel" aria-labelledby="search-customers-tab">
            <div class="fs-3 fw-semibold pt-2 pb-4 mb-4 text-center border-bottom">
              <span class="text-primary fw-bold">10</span> results found for <mark class="text-danger">client</mark>
            </div>
            <table class="table table-striped table-borderless table-vcenter">
              <thead>
                <tr class="bg-body-dark">
                  <th class="d-none d-sm-table-cell text-center" style="width: 40px;">#</th>
                  <th class="text-center" style="width: 70px;"><i class="si si-user"></i></th>
                  <th>Name</th>
                  <th class="d-none d-sm-table-cell">Email</th>
                  <th class="d-none d-lg-table-cell" style="width: 15%;">Access</th>
                  <th class="text-center" style="width: 80px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="d-none d-sm-table-cell text-center">1</td>
                  <td class="text-center">
                    <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar14.jpg" alt="">
                  </td>
                  <td class="fw-semibold">
                    <a href="javascript:void(0)">Ryan Flores</a>
                  </td>
                  <td class="d-none d-sm-table-cell">
                    client1@example.com
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <span class="badge bg-primary">Personal</span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil-alt"></i>
                      </button>
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="d-none d-sm-table-cell text-center">2</td>
                  <td class="text-center">
                    <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar8.jpg" alt="">
                  </td>
                  <td class="fw-semibold">
                    <a href="javascript:void(0)">Betty Kelley</a>
                  </td>
                  <td class="d-none d-sm-table-cell">
                    client2@example.com
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <span class="badge bg-success">VIP</span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil-alt"></i>
                      </button>
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="d-none d-sm-table-cell text-center">3</td>
                  <td class="text-center">
                    <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar5.jpg" alt="">
                  </td>
                  <td class="fw-semibold">
                    <a href="javascript:void(0)">Lori Grant</a>
                  </td>
                  <td class="d-none d-sm-table-cell">
                    client3@example.com
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <span class="badge bg-success">VIP</span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil-alt"></i>
                      </button>
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="d-none d-sm-table-cell text-center">4</td>
                  <td class="text-center">
                    <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar2.jpg" alt="">
                  </td>
                  <td class="fw-semibold">
                    <a href="javascript:void(0)">Carol Ray</a>
                  </td>
                  <td class="d-none d-sm-table-cell">
                    client4@example.com
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <span class="badge bg-warning">Trial</span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil-alt"></i>
                      </button>
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="d-none d-sm-table-cell text-center">5</td>
                  <td class="text-center">
                    <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar14.jpg" alt="">
                  </td>
                  <td class="fw-semibold">
                    <a href="javascript:void(0)">Jack Estrada</a>
                  </td>
                  <td class="d-none d-sm-table-cell">
                    client5@example.com
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <span class="badge bg-info">Business</span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil-alt"></i>
                      </button>
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="d-none d-sm-table-cell text-center">6</td>
                  <td class="text-center">
                    <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar14.jpg" alt="">
                  </td>
                  <td class="fw-semibold">
                    <a href="javascript:void(0)">Thomas Riley</a>
                  </td>
                  <td class="d-none d-sm-table-cell">
                    client6@example.com
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <span class="badge bg-info">Business</span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil-alt"></i>
                      </button>
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="d-none d-sm-table-cell text-center">7</td>
                  <td class="text-center">
                    <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar1.jpg" alt="">
                  </td>
                  <td class="fw-semibold">
                    <a href="javascript:void(0)">Lori Moore</a>
                  </td>
                  <td class="d-none d-sm-table-cell">
                    client7@example.com
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <span class="badge bg-danger">Disabled</span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil-alt"></i>
                      </button>
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="d-none d-sm-table-cell text-center">8</td>
                  <td class="text-center">
                    <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar11.jpg" alt="">
                  </td>
                  <td class="fw-semibold">
                    <a href="javascript:void(0)">Jeffrey Shaw</a>
                  </td>
                  <td class="d-none d-sm-table-cell">
                    client8@example.com
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <span class="badge bg-primary">Personal</span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil-alt"></i>
                      </button>
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="d-none d-sm-table-cell text-center">9</td>
                  <td class="text-center">
                    <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar12.jpg" alt="">
                  </td>
                  <td class="fw-semibold">
                    <a href="javascript:void(0)">Brian Stevens</a>
                  </td>
                  <td class="d-none d-sm-table-cell">
                    client9@example.com
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <span class="badge bg-danger">Disabled</span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil-alt"></i>
                      </button>
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="d-none d-sm-table-cell text-center">10</td>
                  <td class="text-center">
                    <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar10.jpg" alt="">
                  </td>
                  <td class="fw-semibold">
                    <a href="javascript:void(0)">Jack Estrada</a>
                  </td>
                  <td class="d-none d-sm-table-cell">
                    client10@example.com
                  </td>
                  <td class="d-none d-lg-table-cell">
                    <span class="badge bg-primary">Personal</span>
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil-alt"></i>
                      </button>
                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <nav aria-label="Users Search Navigation">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                    <span aria-hidden="true">
                      <i class="fa fa-angle-double-left"></i>
                    </span>
                    <span class="visually-hidden">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="javascript:void(0)">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">4</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)" aria-label="Next">
                    <span aria-hidden="true">
                      <i class="fa fa-angle-double-right"></i>
                    </span>
                    <span class="visually-hidden">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- END Customers -->

          <!-- Projects -->
          <div class="tab-pane fade" id="search-projects" role="tabpanel" aria-labelledby="search-projects-tab">
            <div class="fs-3 fw-semibold pt-2 pb-4 mb-4 text-center border-bottom">
              <span class="text-primary fw-bold">6</span> projects found for <mark class="text-danger">HTML</mark>
            </div>
            <table class="table table-striped table-borderless table-hover table-vcenter">
              <thead>
                <tr class="bg-body-dark">
                  <th style="width: 50%;">Project</th>
                  <th class="d-none d-lg-table-cell text-center" style="width: 15%;">Status</th>
                  <th class="d-none d-lg-table-cell text-center" style="width: 15%;">Sales</th>
                  <th class="text-center" style="width: 20%;">Earnings</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <h4 class="h5 mt-3 mb-1">
                      <a href="javascript:void(0)">Web Application Framework</a>
                    </h4>
                    <p class="d-none d-sm-block text-muted">
                      Your web applications have never been so easy to create and publish.
                    </p>
                  </td>
                  <td class="d-none d-lg-table-cell text-center">
                    <span class="badge bg-success">Completed</span>
                  </td>
                  <td class="d-none d-lg-table-cell fs-xl text-center fw-semibold">1795</td>
                  <td class="fs-xl text-center fw-semibold">$ 21,987</td>
                </tr>
                <tr>
                  <td>
                    <h4 class="h5 mt-3 mb-1">
                      <a href="javascript:void(0)">WP Theme</a>
                    </h4>
                    <p class="d-none d-sm-block text-muted">
                      Create a fully functional website with just a few clicks.
                    </p>
                  </td>
                  <td class="d-none d-lg-table-cell text-center">
                    <span class="badge bg-warning">In Progress</span>
                  </td>
                  <td class="d-none d-lg-table-cell fs-xl text-center fw-semibold">1680</td>
                  <td class="fs-xl text-center fw-semibold">$ 11,350</td>
                </tr>
                <tr>
                  <td>
                    <h4 class="h5 mt-3 mb-1">
                      <a href="javascript:void(0)">Dashboard Template</a>
                    </h4>
                    <p class="d-none d-sm-block text-muted">
                      Explore new designs with this new and fresh dashboard admin template.
                    </p>
                  </td>
                  <td class="d-none d-lg-table-cell text-center">
                    <span class="badge bg-success">Completed</span>
                  </td>
                  <td class="d-none d-lg-table-cell fs-xl text-center fw-semibold">3500</td>
                  <td class="fs-xl text-center fw-semibold">$ 16,218</td>
                </tr>
                <tr>
                  <td>
                    <h4 class="h5 mt-3 mb-1">
                      <a href="javascript:void(0)">Flaticon Set</a>
                    </h4>
                    <p class="d-none d-sm-block text-muted">
                      A beatifully and and crafted icon set including more than 3000 icons.
                    </p>
                  </td>
                  <td class="d-none d-lg-table-cell text-center">
                    <span class="badge bg-success">Completed</span>
                  </td>
                  <td class="d-none d-lg-table-cell fs-xl text-center fw-semibold">2500</td>
                  <td class="fs-xl text-center fw-semibold">$ 18,800</td>
                </tr>
                <tr>
                  <td>
                    <h4 class="h5 mt-3 mb-1">
                      <a href="javascript:void(0)">iOS UI Kit</a>
                    </h4>
                    <p class="d-none d-sm-block text-muted">
                      Create your app wireframes easily with this new UI Kit featuring iOS based designs.
                    </p>
                  </td>
                  <td class="d-none d-lg-table-cell text-center">
                    <span class="badge bg-danger">Cancelled</span>
                  </td>
                  <td class="d-none d-lg-table-cell fs-xl text-center fw-semibold">2690</td>
                  <td class="fs-xl text-center fw-semibold">$ 10,002</td>
                </tr>
                <tr>
                  <td>
                    <h4 class="h5 mt-3 mb-1">
                      <a href="javascript:void(0)">Mobile App Framework</a>
                    </h4>
                    <p class="d-none d-sm-block text-muted">
                      Create your iOS and Android applications with this powerful and modern framework.
                    </p>
                  </td>
                  <td class="d-none d-lg-table-cell text-center">
                    <span class="badge bg-success">Completed</span>
                  </td>
                  <td class="d-none d-lg-table-cell fs-xl text-center fw-semibold">1980</td>
                  <td class="fs-xl text-center fw-semibold">$ 25,985</td>
                </tr>
              </tbody>
            </table>
            <nav aria-label="Projects Search Navigation">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                    <span aria-hidden="true">
                      <i class="fa fa-angle-double-left"></i>
                    </span>
                    <span class="visually-hidden">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="javascript:void(0)">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">4</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)" aria-label="Next">
                    <span aria-hidden="true">
                      <i class="fa fa-angle-double-right"></i>
                    </span>
                    <span class="visually-hidden">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- END Projects -->
        </div>
      </div>
      <!-- END Results -->


</div>

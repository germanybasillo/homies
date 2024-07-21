<x-tenant-app-layout>
   <style>
      .profile-image {
         border-radius: 50%;
         width: 70px;
         height: 70px;
         object-fit: cover;
      }
   </style>
   <x-slot name="header">
      <div class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0 text-dark"><span class="fa fa-user-tie"></span> Tenants Profile</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Tenant Profile</li>
                  </ol>
               </div>
            </div>
         </div>
   </x-slot>

   <div class="container-fluid">
      <div class="card card-info elevation-2">
         @if ($tenantprofiles->isEmpty())
         <div style="display: flex; flex-direction: column; align-items: center;">
             <a class="btn btn-sm elevation-2" href="/tenant/tenantprofiles/create" style="background-color: #05445E; color: #ddd;">
                 <i class="fa fa-user-plus"></i> Add Your Tenant Profile
             </a>
             <small style="color: #666; margin-top: 10px;">Note: You can only add one profile and edit it.</small>
         </div>
      @endif
         <br>
         <div class="col-md-12">
            @foreach($tenantprofiles as $tenantprofile)
               <div class="container py-4">
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="card mb-4">
                           <div class="card-body text-center">
                              @if($tenantprofile->profile)
                        @if(file_exists(public_path('storage/' . $tenantprofile->profile)))
                            <img src="{{ asset('storage/' . $tenantprofile->profile) }}" alt="User Image" class="profile-image">
                        @else
                            <img src="{{ asset($tenantprofile->profile) }}" alt="User Image" class="profile-image">
                        @endif
                    @else
                        <img id="preview" src="{{ asset('avatar.jpg') }}" alt="Preview" class="profile-image">
                    @endif
                              <h5 class="my-3">Tenant</h5>
                              {{-- <p class="text-muted mb-1">{{ $tenantprofile->contact }}</p>
                              <p class="text-muted mb-4">{{ $tenantprofile->address }}</p> --}}
                              <div class="d-flex justify-content-center mb-2">
                                 <a class="btn btn-sm btn-success" href="/tenant/tenantprofiles/{{$tenantprofile->id}}"><i
                                       class="fa fa-user-edit"></i></a>
                                 {{-- <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $tenantprofile->id }}"><i
                                       class="fa fa-trash-alt"></i></a> --}}
                              </div>
                           </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                           <div class="card-body p-0">
                              <ul class="list-group list-group-flush rounded-3">
                                 <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                 </li>
                                 <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg text-body"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                 </li>
                                 <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">@mdbootstrap</p>
                                 </li>
                                 <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                 </li>
                                 <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-8">
                        <div class="card mb-4">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                 </div>
                                 <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $tenantprofile->fname." ".$tenantprofile->mname." ".$tenantprofile->lname }}</p>
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                 </div>
                                 <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $tenantprofile->email }}</p>
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                 </div>
                                 <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $tenantprofile->contact }}</p>
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <p class="mb-0">Mobile</p>
                                 </div>
                                 <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $tenantprofile->contact }}</p>
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                 </div>
                                 <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $tenantprofile->address }}</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="card mb-4 mb-md-0">
                                 <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">assignment</span> Project Status
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                    <div class="progress rounded" style="height: 5px;">
                                       <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                    <div class="progress rounded" style="height: 5px;">
                                       <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                    <div class="progress rounded" style="height: 5px;">
                                       <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                    <div class="progress rounded" style="height: 5px;">
                                       <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                       <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="card mb-4 mb-md-0">
                                 <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">assignment</span> Project Status
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                    <div class="progress rounded" style="height: 5px;">
                                       <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                    <div class="progress rounded" style="height: 5px;">
                                       <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                    <div class="progress rounded" style="height: 5px;">
                                       <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                    <div class="progress rounded" style="height: 5px;">
                                       <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                       <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
    

            <!-- Delete Confirmation Modal -->
            <div id="deleteModal{{ $tenantprofile->id }}" class="modal animated rubberBand delete-modal" role="dialog">
               <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                     <form id="deleteForm{{ $tenantprofile->id }}" action="{{ route('tenant.tenantprofiles.destroy', $tenantprofile->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body text-center">
                           <img src="{{ asset('logo.png') }}" alt="Logo" width="50" height="46">
                           <h3>Are you sure you want to delete this Tenant Profile?</h3>
                           <div class="m-t-20">
                              <button type="button" class="btn btn-white" data-dismiss="modal" style="background-color: blue;color:white;border-color:blue;">Close</button>
                              <button type="submit" class="btn btn-danger">Delete</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>

            @endforeach
         </div>
      </div>
   </div>

</x-tenant-app-layout>

<x-tenant-app-layout>
   <style>
      .profile-image {
         border-radius: 50%;
         width: 120px;  /* Increased size */
         height: 120px; /* Increased size */
         object-fit: cover;
         margin-bottom: 20px; /* Add space below the image */
      }

      .card-body {
         text-align: center; /* Center-align all card content */
      }

      .card-body h5 {
         font-size: 1.5rem; /* Increased font size */
         margin-bottom: 20px; /* Add space below the name */
      }

      .card-body p {
         font-size: 1.2rem; /* Increased font size */
         margin-bottom: 10px; /* Add space between information rows */
         text-align: left; /* Align text to the left */
      }

      .container-fluid h1 {
         font-size: 2.5rem; /* Increased header size */
      }

      .breadcrumb-item a {
         font-size: 1.2rem; /* Increased breadcrumb size */
      }

      .breadcrumb-item.active {
         font-size: 1.2rem; /* Increased breadcrumb size */
      }

      .modal-body h3 {
         font-size: 1.8rem; /* Increased modal text size */
      }

      .modal-body button {
         font-size: 1.2rem; /* Increased modal button size */
         padding: 10px 20px; /* Increased modal button padding */
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
                  <div class="row justify-content-center">
                     <div class="col-lg-8">
                        <div class="card mb-4">
                           <div class="card-body">
                              <!-- Profile Image -->
                              @if($tenantprofile->profile)
                                 @if(file_exists(public_path('storage/' . $tenantprofile->profile)))
                                    <img src="{{ asset('storage/' . $tenantprofile->profile) }}" alt="User Image" class="profile-image">
                                 @else
                                    <img src="{{ asset($tenantprofile->profile) }}" alt="User Image" class="profile-image">
                                 @endif
                              @else
                                 <img id="preview" src="{{ asset('avatar.jpg') }}" alt="Preview" class="profile-image">
                              @endif

                              <!-- Tenant Name -->
                              <h5>Tenant</h5>

                              <!-- Tenant Information -->
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

                              <!-- Edit Button -->
                              <div class="d-flex justify-content-center mt-4">
                                 <a class="btn btn-sm btn-success" href="/tenant/tenantprofiles/{{$tenantprofile->id}}"><i class="fa fa-user-edit"></i> Edit</a>
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

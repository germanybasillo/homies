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
                <h1 class="m-0 text-dark"><span class="fa fa-user"></span> Tenant Profile</h1>
             </div>
             <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">Tenant Profile</li>
                </ol>
             </div>
             @if ($tenantprofiles->isEmpty())
             <a class="btn btn-sm elevation-2" href="/tenant/tenantprofiles/create" style="margin-top: 20px;margin-left: 10px;background-color: #05445E;color: #ddd;"><i
                   class="fa fa-user-plus"></i>
                Add New</a>
                @endif
          </div>
       </div>
</x-slot>

         <div class="row">
            <div class="col-lg-4">
               <div class="card mb-4">
                  @foreach($tenantprofiles as $tenantprofile)
                  <div class="card-body text-center">
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
                        <div class="d-flex justify-content-center mb-2">
                           <a class="btn btn-primary" href="/tenant/tenantprofiles/{{$tenantprofile->id}}"><i class="fa fa-user-edit"></i> Edit</a>
                        </div>
                     @endforeach
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
                  @foreach($tenantprofiles as $tenantprofile)
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
                        <hr>
                        <div class="row">
                           <div class="col-sm-3">
                              <p class="mb-0">Gender</p>
                           </div>
                           <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ $tenantprofile->gender }}</p>
                           </div>
                        </div>
                     @endforeach
                  </div>
               </div>
               @if (!$tenantprofiles->isEmpty())
               <div class="row">
                  <div class="col-md-6">
                     <h1 class="m-0 text-dark"><span class="fa fa-home"></span> Room @if ($rooms->isEmpty())<a href="/tenant/rooms/create">Add</a>@endif</h1><br>
                     <div class="card mb-4 mb-md-0">
                        @foreach($rooms as $room)
                        <div class="card-body">
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Room No</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">{{ $room->room_no}}</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Room Status</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">{{ $room->description}}</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Room Picture</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0"> @if($room->profile)
                                    @if(file_exists(public_path('storage/' . $room->profile)))
                                        <img src="{{ asset('storage/' . $room->profile) }}" width="100" style="border: 2px solid gray">
                                    @else
                                        <img src="{{ asset($room->profile) }}" width="100" style="border: 2px solid gray">
                                    @endif
                                    @else
                                    <img id="preview" src="{{ asset('room.jpg') }}"width="100" style="border: 2px solid gray">
                                    @endif</p>
                              </div>
                           </div>
                           @endforeach
                        </div>
                        @endif
                     </div>
                  </div>
                  @if (!$rooms->isEmpty())
                  <div class="col-md-6">
                     <h1 class="m-0 text-dark"><span class="fa fa-bed"></span> Bed @if ($beds->isEmpty())<a href="/tenant/beds/create">Add</a>@endif</h1><br>
                     <div class="card mb-4 mb-md-0">
                        @foreach($beds as $bed)
                        <div class="card-body">
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Bed No</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">{{ $bed->bed_no}}</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Daily Rate</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">{{ $bed->daily_rate}}</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Monthly Rate</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">{{ $bed->monthly_rate}}</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0"> Bed Status</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">  @if ($bed->bed_status == 'occupied')
                                    <span class="badge bg-warning">{{ $bed->bed_status }}</span>
                                @elseif ($bed->bed_status == 'available')
                                    <span class="badge bg-success">{{ $bed->bed_status }}</span>
                                @endif</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            @endif
         </div>
      </div>
</x-tenant-app-layout>

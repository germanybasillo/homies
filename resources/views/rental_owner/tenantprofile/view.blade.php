<x-owner-app-layout>
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
                        <li class="breadcrumb-item active">Tenants Profile</li>
                     </ol>
                  </div>
                  <a class="btn btn-sm elevation-2" href="/rental_owner/tenantprofiles/create" style="margin-top: 20px;margin-left: 10px;background-color: #05445E;color: #ddd;"><i
                        class="fa fa-user-plus"></i>
                     Add New</a>
               </div>
            </div>
    </x-slot>
    
    <div class="container-fluid">
        <div class="card card-info elevation-2">
           <br>
           <div class="col-md-12 table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                 <thead class="btn-cancel">
                    <tr>
                       <th>Profile</th>
                       <th>Tenant Info</th>
                       <th>Address</th>
                       <th>Action</th>
                    </tr>
                 </thead>
                 <tbody>
                    @foreach($tenantprofiles as $tenantprofile)
                    <tr>
                     <td>
                        @if($tenantprofile->profile)
                        @if(file_exists(public_path('storage/' . $tenantprofile->profile)))
                            <img src="{{ asset('storage/' . $tenantprofile->profile) }}" alt="User Image" class="profile-image">
                        @else
                            <img src="{{ asset($tenantprofile->profile) }}" alt="User Image" class="profile-image">
                        @endif
                    @else
                        <img id="preview" src="{{ asset('avatar.jpg') }}" alt="Preview" class="profile-image">
                    @endif
                  </td>
                       <td>
                          <p class="info">Name: <b>{{ $tenantprofile->fname." ".$tenantprofile->mname." ".$tenantprofile->lname }}</b></p>
                          <p class="info"><small>Contact: <b>{{$tenantprofile->contact}}</b></small></p>
                          <p class="info"><small>Email: <b>{{$tenantprofile->email}}</b></small></p>
                          <p class="info">
                           <small>Gender <b>
                              @if ($tenantprofile->gender == 'male')
                              <span>{{ $tenantprofile->gender }}</span>
                              @elseif ($tenantprofile->gender == 'female')
                              <span>{{ $tenantprofile->gender }}</span>
                              @endif
                           </b></small>
                       </p>
                       </td>
                       <td>{{$tenantprofile->address}}</td>
                       <td class="text-right">
                          <a class="btn btn-sm btn-success" href="/rental_owner/tenantprofiles/{{$tenantprofile->id}}"><i
                                class="fa fa-user-edit"></i></a>
                          <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$tenantprofile->id}}"><i
                                class="fa fa-trash-alt"></i></a>
                       </td>
                    </tr>                        
                    <div id="deleteModal{{$tenantprofile->id}}" class="modal animated rubberBand delete-modal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="deleteForm{{$tenantprofile->id}}" action="{{ route('rental_owner.tenantprofiles.destroy', $tenantprofile->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body text-center">
                                        <img src="{{asset('logo.png')}}" alt="Logo" width="50" height="46">
                                        <h3>Are you sure you want to delete this Tenant?</h3>
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
                 </tbody>
              </table>                    
            </div>
        </div>
    </div>
</div>

</x-owner-app-layout>

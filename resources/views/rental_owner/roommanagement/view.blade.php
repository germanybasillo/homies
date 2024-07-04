<x-owner-app-layout>
     <x-slot name="header">
        <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0 text-dark"><span class="fa fa-home"></span> Rooms</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Rooms</li>
                     </ol>
                  </div>
                  <a class="btn btn-sm elevation-2" href="/rental_owner/rooms/create" style="margin-top: 20px;margin-left: 10px;background-color: #05445E;color: #ddd;"><i
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
                       <th>Room Number</th>
                       <th>Room Description</th>
                       <th>Room Image</th>
                       <th>Action</th>
                    </tr>
                 </thead>
                 <tbody>
                    @foreach($rooms as $room)
                    <tr>
                       <td>{{$room->number}}</td>
                       <td>{{$room->description}}</td>
                       <td>
                        @if($room->profile)
                        @if(file_exists(public_path('storage/' . $room->profile)))
                            <img src="{{ asset('storage/' . $room->profile) }}" width="100" style="border: 2px solid gray">
                        @else
                            <img src="{{ asset($room->profile) }}" width="100" style="border: 2px solid gray">
                        @endif
                        @else
                        <img id="preview" src="{{ asset('room.jpg') }}"width="100" style="border: 2px solid gray">
                        @endif
                    </td>
                       <td class="text-right">
                          <a class="btn btn-sm btn-success" href="/rental_owner/rooms/{{$room->id}}"><i
                                class="fa fa-edit"></i></a>
                          <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                class="fa fa-trash-alt"></i></a>
                       </td>
                    </tr>
                    <div id="deleteModal{{$room->id}}" class="modal animated rubberBand delete-modal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="deleteForm{{$room->id}}" action="{{ route('rental_owner.rooms.destroy', $room->id) }}" method="post">
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
 
<x-owner-app-layout>
    <x-slot name="header">
        <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0 text-dark"><span class="fa fa-home"></span> Rooms Selected</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Rooms Selected</li>
                     </ol>
                  </div>
                  @if ($selecteds->isEmpty())
                  <a class="btn btn-sm elevation-2" href="/tenant/rooms/create" style="margin-top: 20px;margin-left: 10px;background-color: #05445E;color: #ddd;"><i
                        class="fa fa-user-plus"></i>
                     Add New</a>
                     @endif
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
                       <th>Room No</th>
                       <th>Room Description</th>
                       <th>Room Image</th>
                       <th>Action</th>
                    </tr>
                 </thead>
                 <tbody>
                    @foreach($selecteds as $selected)
                    <tr>
                       <td>{{$selected->room_no}}</td>
                       <td>{{$selected->description}}</td>
                       <td>
                        @if($selected->profile)
                        @if(file_exists(public_path('storage/' . $selected->profile)))
                            <img src="{{ asset('storage/' . $selected->profile) }}" width="100" style="border: 2px solid gray">
                        @else
                            <img src="{{ asset($selected->profile) }}" width="100" style="border: 2px solid gray">
                        @endif
                        @else
                        <img id="preview" src="{{ asset('room.jpg') }}"width="100" style="border: 2px solid gray">
                        @endif
                    </td>
                       <td class="text-right">
                          <a class="btn btn-sm btn-success" href="/rental_owner/selecteds/{{$selected->id}}"><i
                                class="fa fa-edit"></i></a>
                          <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$selected->id}}"><i
                                class="fa fa-trash-alt"></i></a>
                       </td>
                    </tr>
                    <div id="deleteModal{{$selected->id}}" class="modal animated rubberBand delete-modal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="deleteForm{{$selected->id}}" action="{{ route('rental_owner.selecteds.destroy', $selected->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body text-center">
                                        <img src="{{asset('logo.png')}}" alt="Logo" width="50" height="46">
                                        <h3>Are you sure you want to delete this Operator?</h3>
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

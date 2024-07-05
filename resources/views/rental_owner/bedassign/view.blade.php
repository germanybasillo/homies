
<x-owner-app-layout>

    <x-slot name="header">
        <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0 text-dark"><span class="fa fa-bed"></span> Bed Assignment</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Beds</li>
                     </ol>
                  </div>
                  <a class="btn btn-sm elevation-2" href="/rental_owner/bedassigns/create" style="margin-top: 20px;margin-left: 10px;background-color: #05445E;color: #ddd;"><i
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
                       <th>Tenant Name</th>
                       <th>Room No.</th>
                       <th>Bed No.</th>
                       <th>Date Start</th>
                       <th>Due Date</th>
                       <th>Action</th>
                    </tr>
                 </thead>
                 <tbody>
                     @foreach ($bedassigns as $bedassign)
                    <tr>
                       <td>{{$bedassign->name}}</td>
                       <td>{{$bedassign->room_no}}</td>
                       <td>{{$bedassign->bed_no}}</td>
                       <td>{{$bedassign->start_date}}</td>
                       <td>{{$bedassign->due_date}}</td>
                       <td class="text-right">
                          <a class="btn btn-sm btn-success" href="/rental_owner/bedassigns/{{$bedassign->id}}"><i
                                class="fa fa-edit"></i></a>
                          <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                class="fa fa-trash-alt"></i></a>
                       </td>
                    </tr>
                    @endforeach
                 </tbody>
              </table>
           </div>
        </div>
     </div>
  </section>
</div>
</div>
<div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
     <div class="modal-body text-center">
        <img src="../assets/img/sent.png" alt="" width="50" height="46">
        <h3>Are you sure want to delete this Operator?</h3>
        <div class="m-t-20">
           <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
           <button type="submit" class="btn btn-danger">Delete</button>
        </div>
     </div>
  </div>
</div>
</div>

    

    </x-owner-app-layout>
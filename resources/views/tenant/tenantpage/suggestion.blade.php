<x-tenant-app-layout>
<x-slot name="header">
<div class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1 class="m-0 text-dark"><span class="fa fa-envelope"></span> Suggestions</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Suggestions</li>
             </ol>
          </div>
          <a class="btn btn-sm elevation-2" href="add-suggestion.html" style="margin-top: 20px;margin-left: 10px;background-color: #05445E;color: #ddd;"><i
                class="fa fa-plus"></i>
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
                   <th>Suggestions</th>
                   <th>Date</th>
                   <th>Reply from owner</th>
                   <th>Status</th>
                   <th>Action</th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td>Repair Windows</td>
                   <td>Sept 06,2021</td>
                   <td>Noted</td>
                   <td><span class="badge bg-success">solve</span></td>
                   <td class="text-right">
                      <a class="btn btn-sm btn-info" href="#" data-toggle="modal" data-target="#edit"><i
                            class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                            class="fa fa-reply"></i></a>
                   </td>
                </tr>
                <tr>
                   <td>Wifi Connection</td>
                   <td>Sept 06,2021</td>
                   <td></td>
                   <td><span class="badge bg-danger">pending</span></td>
                   <td class="text-right">
                      <a class="btn btn-sm btn-info" href="#" data-toggle="modal" data-target="#edit"><i
                            class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                            class="fa fa-reply"></i></a>
                   </td>
                </tr>
             </tbody>
          </table>
       </div>
    </div>
 </div>
</div>
</div>



</x-tenant-app-layout>
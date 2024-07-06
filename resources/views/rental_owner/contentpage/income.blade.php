
<x-owner-app-layout>

    <x-slot name="header">
        <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0 text-dark"><span class="fa fa-chart-bar"></span> Income Reports</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Reports</li>
                     </ol>
                  </div>
               </div>
    </x-slot>
    <div class="container-fluid">
        <div class="card card-info elevation-2">
           <br>
           <div class="col-md-12 table-responsive">
             <div class="row">
               <div class="col-md-5">
               <div class="form-group">
                 <label>From</label>
                 <input type="month" name="number" class="form-control" placeholder="ex. 6000.00">
               </div></div>
               <div class="col-md-5">
                 <div class="form-group">
                   <label>To</label>
                   <input type="month" name="number" class="form-control" placeholder="ex. 6000.00">
                 </div></div>
                 <div class="col-md-2" style="margin-top: 30px;">
                   <div class="form-group">
                     <button class="btn btn-info">Search</button>
                   </div></div>
                 </div>
              <table id="example1" class="table table-bordered table-hover">
                 <thead class="btn-cancel">
                    <tr>
                       <th>Month</th>
                       <th>Income</th>
                    </tr>
                 </thead>
                 <tbody>
                   <tr>
                      <td>September</td>
                      <td>Php 5000.00</td>
                   </tr>
                   <tr>
                      <td>October</td>
                      <td>Php 5000.00</td>
                   </tr>
                   <tr>
                      <td>November</td>
                      <td>Php 5000.00</td>
                   </tr>
                   <tr>
                      <td>December</td>
                      <td>Php 5000.00</td>
                   </tr>
                   <tr>
                      <td><b>Total Income</b></td>
                      <td><b>Php 50,000.00</b></td>
                   </tr>
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
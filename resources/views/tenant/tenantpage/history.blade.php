<x-tenant-app-layout>
    <x-slot name="header">
        <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0 text-dark"><span class="fa fa-file"></span> Payments History</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Payments</li>
                     </ol>
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
                       <th>Invoice No.</th>
                       <th>Amount Paid</th>
                       <th>Date Of Payment</th>
                    </tr>
                 </thead>
                 <tbody>
                    <tr>
                       <td>IN-00012</td>
                       <td>1,500.00</td>
                       <td>Sept 30,2021</td>
                    </tr>
                    <tr>
                       <td>IN-000234</td>
                       <td>1,500.00</td>
                       <td>Sept 30,2021</td>
                    </tr>
                    <tr>
                       <td>IN-000122</td>
                       <td>1,500.00</td>
                       <td>Sept 30,2021</td>
                    </tr>
                    <tr>
                       <td></td>
                       <td><b>Total</b></td>
                       <td><b>5,000.00</b></td>
                    </tr>
                 </tbody>
              </table>
           </div>
        </div>
     </div>
</div>
</div>
    
   
   
   </x-tenant-app-layout>
   
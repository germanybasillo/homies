
<x-owner-app-layout>
    <x-slot name="header">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark"> Add New Bed</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Beds</li>
                  </ol>
                </div>
              </div>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <!-- form start -->
              <form role="form" id="quickForm" action="{{ route('rental_owner.beds.update', $bed->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Bed No.</label>
                    <input type="text" name="bed_no" class="form-control" placeholder="ex. BD-0001" value="{{$bed->bed_no}}">
                  </div></div>
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Daily Rate</label>
                    <input type="text" name="daily_rate" class="form-control" placeholder="ex. 120.00" value="{{$bed->daily_rate}}">
                  </div></div>
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Monthly Rate</label>
                    <input type="text" name="monthly_rate" class="form-control" placeholder="ex. 6000.00" value="{{$bed->monthly_rate}}">
                  </div></div>
                  <div class="col-md-8 offset-md-2">
                  
                    <label>Bed Status</label>
                    <div class="form-group">
                        <select class="form-control" name="bed_status">
                            <option value="occupied" {{ $bed->bed_status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                            <option value="available" {{ $bed->bed_status == 'available' ? 'selected' : '' }}>Available</option>
                        </select>
                </div></div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    
    
    </x-owner-app-layout>
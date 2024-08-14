
<x-owner-app-layout>

    <x-slot name="header">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Add New Assign Bed</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Bed Assigns</li>
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
              <form role="form" id="quickForm" action="{{ route('rental_owner.bedassign.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-8 offset-md-2">
                    <div class="form-group">
                      <label>Tenants</label>
                      <select name="tenantprofile_id" id="tenant" class="form-control">
                          <option value="" disabled selected>Select A Tenant Name</option> <!-- Default option -->
                          @foreach($tenantprofiles as $tenantprofile)
                              <option value="{{ $tenantprofile->id }}" {{ old('tenantprofile_id', $selectedTenantId ?? '') == $tenantprofile->id ? 'selected' : '' }}>
                                  {{ $tenantprofile->fname . ' ' . $tenantprofile->mname . ' ' . $tenantprofile->lname }}
                              </option>
                          @endforeach
                      </select>
                  </div>
                  </div>
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Room No.</label>
                    <input type="text" name="room_no" class="form-control" placeholder="ex. RM-0001">
                  </div></div>
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Bed No.</label>
                    <input type="text" name="bed_no" class="form-control" placeholder="ex. BD-0001">
                  </div></div>
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Date Start</label>
                    <input type="date" name="start_date" class="form-control" placeholder="ex. 120.00">
                  </div></div>
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Due date</label>
                    <input type="date" name="due_date" class="form-control" placeholder="ex. 6000.00">
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

<x-tenant-app-layout>
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
              <form role="form" id="quickForm" action="{{ route('tenant.bed.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Bed No.</label>
                    <select name="selectbed_id" id="selectbed" class="form-control" onchange="updateRoomDetails()">
                      <option value="" disabled selected>Select A Room Number</option>
                      @foreach($selectbeds as $selectbed)
                          <option value="{{ $selectbed->id }}" 
                                  data-status="{{ $selectbed->bed_status }}"
                                  data-daily-rate="{{ $selectbed->daily_rate }}" 
                                  data-monthly-rate="{{ $selectbed->monthly_rate }}"
                                  {{ old('selectbed_id', $selectbedId ?? '') == $selectbed->id ? 'selected' : '' }}>
                              {{ $selectbed->bed_no }}
                          </option>
                      @endforeach
                  </select>
                  </div></div>
                  <div class="col-md-8 offset-md-2" id="dailyRateContainer" style="display: none;">
                    <div class="form-group">
                    <label>Daily Rate</label>
                    <input id="daily_rate" name="daily_rate" class="form-control" readonly>
                  </div></div>
                  <div class="col-md-8 offset-md-2" id="monthlyRateContainer" style="display: none;">
                    <div class="form-group">
                    <label>Monthly Rate</label>
                    <input  id="monthly_rate" name="monthly_rate" class="form-control" readonly>
                  </div></div>
                  <div class="col-md-8 offset-md-2" id="bedStatusContainer" style="display: none;">
                    <label>Bed Status</label>
                    <input id="status" class="form-control" name="status" readonly>
                </div>
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
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
    function updateRoomDetails() {
    const selectbed = document.getElementById('selectbed');
    const statusInput = document.getElementById('status');
    const dailyRateInput = document.getElementById('daily_rate');
    const monthlyRateInput = document.getElementById('monthly_rate');
    const bedStatusContainer = document.getElementById('bedStatusContainer');
    const dailyRateContainer = document.getElementById('dailyRateContainer');
    const monthlyRateContainer = document.getElementById('monthlyRateContainer');
    
    const selectedOption = selectbed.options[selectbed.selectedIndex];
    
    const status = selectedOption.getAttribute('data-status');
    const dailyRate = selectedOption.getAttribute('data-daily-rate');
    const monthlyRate = selectedOption.getAttribute('data-monthly-rate');
    
    statusInput.value = status;
    dailyRateInput.value = dailyRate;
    monthlyRateInput.value = monthlyRate;

    bedStatusContainer.style.display = 'block';
    dailyRateContainer.style.display = 'block';
    monthlyRateContainer.style.display = 'block';
}
  
      document.getElementById('quickForm').addEventListener('submit', function(event) {
          event.preventDefault(); // Prevent the form from submitting immediately
  
          Swal.fire({
              icon: null, // Disable the default icon
              html: '<img src="{{ asset('logo.png') }}" alt="Logo" width="50" height="46"><br><h2>Are you sure?</h2>Do you want to save this bed?',
              showCancelButton: true,
              confirmButtonText: 'Yes, save it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
          }).then((result) => {
              if (result.isConfirmed) {
                  event.target.submit(); // If confirmed, submit the form
              }
          });
      });
      </script>
    </x-tenant-app-layout>
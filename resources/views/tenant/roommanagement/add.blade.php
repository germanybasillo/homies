<x-tenant-app-layout>
    <x-slot name="header">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Add New Room</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Rooms</li>
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
              <form role="form" id="quickForm" action="{{ route('tenant.room.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Room No.</label>
                    <input type="text" name="room_no" class="form-control" placeholder="ex. RM-0001" value="{{ old('room_no') }}">
                    @if ($errors->has('room_no'))
                    <span class="text-danger" style="color: red">{{ $errors->first('room_no') }}</span>
                    @endif 
                  </div></div>
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label>Description</label>
                    <input class="form-control" name="description" placeholder="ex. Neque porro quisquam est qui dolorem ipsum quia dolor sit amet"value="{{ old('description') }}">
                    @if ($errors->has('description'))
                    <span class="text-danger" style="color: red">{{ $errors->first('description') }}</span>
                    @endif 
                  </div></div>
                  <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Room Picture</label>
                    <input type="file" name="profile" class="form-control" accept=".png, .jpg, .jpeg" onchange="previewImage(event)" style="width: 10.3%;border:none;">
                </div>
                <img id="preview" src="{{ asset('room.jpg') }}" width="200" height="120" alt="Preview" class="profile-image">
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
      <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('preview');
        
            var reader = new FileReader();
            reader.onload = function(){
                preview.src = reader.result;
            };
        
            reader.readAsDataURL(input.files[0]);
        }
      </script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            document.getElementById('quickForm').addEventListener('submit', function(event) {
              event.preventDefault(); // Prevent the form from submitting immediately
      
              Swal.fire({
                  // title: 'Are you sure?',
                  // text: 'Do you want to save the changes?',
                  icon: null, // Disable the default icon
                  html: '<img src="{{ asset('logo.png') }}" alt="Logo" width="50" height="46"><br><h2>Are you sure?</h2>Do you want to save this room?',
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
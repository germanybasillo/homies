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
                                <select name="tenantprofile_id" id="tenant" class="form-control" onchange="updateRoomDetails()">
                                    <option value="" disabled selected>Select A Room Number</option>
                                    @foreach($selecteds as $selected)
                                        <option value="{{ $selected->id }}" 
                                                data-description="{{ $selected->description }}" 
                                                data-profile="{{ asset('storage/' . $selected->profile) }}" 
                                                {{ old('selected_id', $selectedTenantId ?? '') == $selected->id ? 'selected' : '' }}>
                                            {{ $selected->room_no }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
            
                        <!-- Room description field -->
                        <div id="room-details" class="col-md-8 offset-md-2" style="display: none;">
                          <!-- Room description field -->
                          <div class="form-group">
                              <label>Description</label>
                              <input id="description" class="form-control" name="description" 
                                     placeholder="ex. Neque porro quisquam est qui dolorem ipsum quia dolor sit amet" 
                                     value="{{ old('description') }}" readonly>
                              @if ($errors->has('description'))
                                  <span class="text-danger" style="color: red">{{ $errors->first('description') }}</span>
                              @endif 
                          </div>

                              <!-- Room picture field -->
                        <div class="col-md-8 offset-md-2">
                          <div class="form-group">
                              <label for="exampleInputPassword1">Room Picture</label>
                              <input type="file" name="profile" class="form-control" accept=".png, .jpg, .jpeg" onchange="previewImage(event)" style="width: 10.3%;border:none;">
                          </div>
                          <img id="preview" src="{{ asset('room.jpg') }}" width="200" height="120" alt="Preview" class="profile-image">
                      </div>
                    </div>

                        <!-- Room start date field -->
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control" placeholder="ex. 120.00" value="{{ old('start_date') }}">
                            </div>
                        </div>
            
                        <!-- Room due date field -->
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group">
                                <label>Due Date</label>
                                <input type="date" name="due_date" class="form-control" placeholder="ex. 6000.00" value="{{ old('due_date') }}">
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

<script>
  function updateRoomDetails() {
      var select = document.getElementById('tenant');
      var selectedOption = select.options[select.selectedIndex];
      
      // Get the room details section
      var roomDetails = document.getElementById('room-details');

      if (select.value) {
          // Show the room details section if a room is selected
          roomDetails.style.display = 'block';

          // Update the description
          var description = selectedOption.getAttribute('data-description');
          document.getElementById('description').value = description || '';

          // Update the profile image preview
          var profile = selectedOption.getAttribute('data-profile');
          var previewImage = document.getElementById('preview');
          if (profile) {
              previewImage.src = profile;
          } else {
              previewImage.src = "{{ asset('room.jpg') }}"; // Default image
          }
      } else {
          // Hide the room details section if no room is selected
          roomDetails.style.display = 'none';
      }
  }

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
</x-tenant-app-layout>
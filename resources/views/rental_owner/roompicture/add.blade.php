<x-owner-app-layout>
    <x-slot name="header">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Add New RoomSelected</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">RoomSelecteds</li>
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
              <form role="form" id="quickForm" action="{{ route('rental_owner.selecteds.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label>Room Pictures</label>
                        <div class="d-flex flex-wrap">
                          <input type="file" name="profile[]" id="profile" class="form-control mb-2" accept=".png, .jpg, .jpeg" multiple style="border:none; width: auto;" onchange="validateAndPreviewImages(event)">
                        </div>
                        <div id="previews" class="d-flex flex-wrap">
                          <!-- Image previews will be inserted here -->
                      </div>
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
        function validateAndPreviewImages(event) {
            const input = event.target;
            const files = input.files;

            if (files.length !== 6) {
                alert('Please select exactly 6 images.');
                input.value = ''; // Clear the input
                return;
            }

            previewImages(input);
        }

        function previewImages(input) {
            const previewsContainer = document.getElementById('previews');
            previewsContainer.innerHTML = ''; // Clear previous previews

            Array.from(input.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.width = 200;
                    img.height = 120;
                    img.classList.add('profile-image');
                    previewsContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
</x-owner-app-layout>
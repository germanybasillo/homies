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
                        <label for="exampleInputPassword1">Room Pictures</label>
                        <div class="image-grid">
                            <div class="image-item">
                                <input type="file" id="imageUpload1" name="profile" class="form-control" accept=".png, .jpg, .jpeg" onchange="previewImage(event, 1)" style="border:none;">
                                <img id="preview1" src="{{ asset('room.jpg') }}" width="200" height="120" alt="Preview 1" class="profile-image">
                            </div>
                            <div class="image-item">
                                <input type="file" id="imageUpload2" name="profile" class="form-control" accept=".png, .jpg, .jpeg" onchange="previewImage(event, 2)" style="border:none;">
                                <img id="preview2" src="{{ asset('room.jpg') }}" width="200" height="120" alt="Preview 2" class="profile-image">
                            </div>
                            <div class="image-item">
                                <input type="file" id="imageUpload3" name="profile" class="form-control" accept=".png, .jpg, .jpeg" onchange="previewImage(event, 3)" style="border:none;">
                                <img id="preview3" src="{{ asset('room.jpg') }}" width="200" height="120" alt="Preview 3" class="profile-image">
                            </div>
                            <div class="image-item">
                                <input type="file" id="imageUpload4" name="profile" class="form-control" accept=".png, .jpg, .jpeg" onchange="previewImage(event, 4)" style="border:none;">
                                <img id="preview4" src="{{ asset('room.jpg') }}" width="200" height="120" alt="Preview 4" class="profile-image">
                            </div>
                            <div class="image-item">
                                <input type="file" id="imageUpload5" name="profile" class="form-control" accept=".png, .jpg, .jpeg" onchange="previewImage(event, 5)" style="border:none;">
                                <img id="preview5" src="{{ asset('room.jpg') }}" width="200" height="120" alt="Preview 5" class="profile-image">
                            </div>
                            <div class="image-item">
                                <input type="file" id="imageUpload6" name="profile" class="form-control" accept=".png, .jpg, .jpeg" onchange="previewImage(event, 6)" style="border:none;">
                                <img id="preview6" src="{{ asset('room.jpg') }}" width="200" height="120" alt="Preview 6" class="profile-image">
                            </div>
                        </div>
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
        function previewImage(event, num) {
            const input = event.target;
            const preview = document.getElementById(`preview${num}`);
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <style>
      .image-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 185px; /* Adjust the gap between items as needed */
}

.image-item {
    text-align: center;
}

.profile-image {
    margin-top: 10px;
    border: 1px solid #ddd;
    padding: 5px;
    background-color: #f9f9f9;
}

    </style>
</x-owner-app-layout>
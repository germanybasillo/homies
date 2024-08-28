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
                          @for ($i = 1; $i <= 6; $i++)
                          <div class="image-item" id="image-container{{ $i }}">
                              <input type="file" id="imageUpload{{ $i }}" name="profile{{ $i }}" class="form-control" accept=".png, .jpg, .jpeg" onchange="previewImage(event, {{ $i }})" style="border:none;">
                              <div class="image-container">
                                  <img id="preview{{ $i }}" src="{{ asset('room.jpg') }}" alt="Preview {{ $i }}" class="profile-image">
                                  <button type="button" class="add-caption-btn" onclick="addCaption({{ $i }})" style="display: none;">+</button>
                                  <span id="caption{{ $i }}" class="caption-text"></span>
                              </div>
                          </div>
                      @endfor
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
        function previewImage(event, index) {
            const input = event.target;
            const preview = document.getElementById('preview' + index);
            const button = document.querySelector(`#image-container${index} .add-caption-btn`);
            const fileInput = document.getElementById('imageUpload' + index);
    
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    button.style.display = 'block'; // Show the button when an image is uploaded
                    fileInput.style.display = 'none'; // Hide the file input field when an image is uploaded
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                button.style.display = 'none'; // Hide the button if no file is selected
                fileInput.style.display = 'block'; // Show the file input field if no file is selected
            }
        }
    
        function addCaption(index) {
            const caption = prompt('Enter a caption for the image:');
            if (caption !== null && caption.trim() !== '') {
                const button = document.querySelector(`#image-container${index} .add-caption-btn`);
                const captionText = document.getElementById('caption' + index);
                
                // Hide the button
                button.style.display = 'none';
                // Display the caption
                captionText.textContent = caption;
                captionText.style.display = 'block';
            }
        }
    </script>
    
    <style>
        .image-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns layout */
            gap: 20px; /* Adjust the gap between items as needed */
            padding: 10px; /* Add some padding around the grid */
        }
    
        .image-item {
            text-align: center;
            position: relative;
        }
    
        .image-container {
            position: relative;
            display: inline-block;
        }
    
        .profile-image {
            width: 100%; /* Set image width to fill the container */
            height: auto; /* Maintain aspect ratio */
            border: 1px solid #ddd;
            padding: 5px;
            background-color: #f9f9f9;
            margin-top: 10px; /* Space above the image */
        }
    
        .add-caption-btn {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px; /* Adjust size of the button */
            height: 40px; /* Adjust size of the button */
            display: none; /* Initially hidden */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px; /* Adjust font size of the icon */
            cursor: pointer;
        }
    
        .caption-text {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 5px;
            border-radius: 3px;
            font-size: 14px;
            white-space: nowrap;
            display: none; /* Hidden by default, shown when set */
        }
    
        /* Media query for tablets */
        @media (max-width: 768px) {
            .image-grid {
                grid-template-columns: repeat(2, 1fr); /* 2 columns layout for tablets */
            }
        }
    </style>
</x-owner-app-layout>
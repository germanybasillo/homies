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
                                <select name="selected_id" id="selected" class="form-control" onchange="updateRoomDetails()">
                                    <option value="" disabled selected>Select A Room Number</option>
                                    @foreach($selecteds as $selected)
                                        <option value="{{ $selected->id }}" 
                                                data-description="{{ $selected->description }}" 
                                                {{ old('selected_id', $selectedRoomId ?? '') == $selected->id ? 'selected' : '' }}>
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
                              <input id="description" class="form-control" name="description" readonly>
                          </div>

                              <!-- Room picture field -->
                        <div class="col-md-8 offset-md-2">
                          <div class="form-group">
                              <label for="exampleInputPassword1">Room Picture</label>
                              <div id="room-pictures">
                                @foreach($selecteds as $selected)
                                <div class="slideshow-container" data-id="{{ $selected->id }}" style="display: none;">
                                    @php
                                        $profiles = [
                                            ['profile' => 'profile1', 'caption' => 'caption1'],
                                            ['profile' => 'profile2', 'caption' => 'caption2'],
                                            ['profile' => 'profile3', 'caption' => 'caption3'],
                                            ['profile' => 'profile4', 'caption' => 'caption4'],
                                            ['profile' => 'profile5', 'caption' => 'caption5'],
                                            ['profile' => 'profile6', 'caption' => 'caption6'],
                                        ];
                                    @endphp
                            
                                    @foreach ($profiles as $profile)
                                        @php
                                            $profilePath = $selected->{$profile['profile']};
                                            $captionText = $selected->{$profile['caption']};
                                            $imagePath = storage_path('app/public/' . $profilePath);
                                            $isImageExists = file_exists($imagePath);
                                        @endphp
                            
                                        @if ($profilePath)
                                            <div class="mySlides">
                                                <img 
                                                    src="{{ $isImageExists ? asset('storage/' . $profilePath) : asset($profilePath) }}" 
                                                    style="width:100%; height: auto; border: 2px solid gray; margin: 5px;">
                                                <div class="text">{{ $captionText }}</div>
                                            </div>
                                        @endif
                                    @endforeach
                            
                                    <!-- Next/previous controls -->
                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                </div>
                            @endforeach
                          </div>
                      </div>
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
        var select = document.getElementById('selected');
        var selectedOption = select.options[select.selectedIndex];
        
        // Get the room details section
        var roomDetails = document.getElementById('room-details');
        var roomImages = document.querySelectorAll('.room-images');
    
        if (select.value) {
            // Show the room details section if a room is selected
            roomDetails.style.display = 'block';
    
            // Update the description
            var description = selectedOption.getAttribute('data-description');
            document.getElementById('description').value = description || '';
    
            // Show/hide images based on the selected room ID
            roomImages.forEach((container) => {
                if (container.getAttribute('data-id') === select.value) {
                    container.style.display = 'block';
                } else {
                    container.style.display = 'none';
                }
            });
        } else {
            // Hide the room details section if no room is selected
            roomDetails.style.display = 'none';
            
            // Hide all images
            roomImages.forEach((container) => {
                container.style.display = 'none';
            });
        }
    }
    
    // Initialize the display based on the current selection
    document.addEventListener('DOMContentLoaded', () => {
        updateRoomDetails();
    });
    </script>

<script>
    let slideIndex = 1;

    function showSlides(n) {
        let slides = document.getElementsByClassName("mySlides");
        let i;
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slides[slideIndex-1].style.display = "block";  
    }

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Initialize the slideshow
        let containers = document.querySelectorAll('.slideshow-container');
        containers.forEach(container => {
            container.style.display = 'block'; // Make sure the container is visible
            showSlides(slideIndex);
        });
    });
</script>

<style>
    .slideshow-container {
        position: relative;
        max-width: 80%;
        margin: auto;
    }

    .mySlides {
        display: none;
    }

    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
    }

    .text {
    color: #f2f2f2; /* Text color */
    font-size: 20px; /* Font size */
    padding: 8px 12px; /* Padding around the text */
    position: absolute; /* Positioning relative to the parent container */
    bottom: 8px; /* Distance from the bottom of the container */
    left: 50%; /* Center horizontally */
    transform: translateX(-50%); /* Adjust for exact center */
    width: auto; /* Adjust width automatically */
    max-width: 100%; /* Prevent overflow */
    text-align: center; /* Center text horizontally */
    background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black background */
    border-radius: 5px; /* Rounded corners */
}
</style>
    
</x-tenant-app-layout>
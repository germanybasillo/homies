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
                          <input type="file" name="profile[]" id="profile" class="form-control mb-2" accept=".png, .jpg, .jpeg" multiple style="border:none; width: auto;">
                        </div>
                        <div class="slideshow-container" id="slideshow-container">
                          <!-- Image slides will be dynamically inserted here -->
                      </div>

                            <!-- Next and previous buttons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
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

      <style>
 .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
    height: 500px; /* Set a fixed height for the slideshow container */
    display: none; /* Hide slideshow container by default */
    overflow: hidden; /* Hide overflow to prevent images from spilling out */
}

.mySlides {
    display: none;
    width: 100%;
    height: 100%; /* Make each slide fill the container height */
    position: relative;
    display: flex; /* Use flexbox for centering */
    align-items: center; /* Center vertically */
    justify-content: center; /* Center horizontally */
}

.mySlides img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures images cover the container while maintaining aspect ratio */
}

.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    margin-top: -22px;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    display: none; /* Hide navigation arrows by default */
}

.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
}

.text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
}

.numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}


    </style>
  <script>
    let slideIndex = 1;

    function showSlides(n) {
        const slides = document.getElementsByClassName("mySlides");
        const prev = document.querySelector('.prev');
        const next = document.querySelector('.next');

        if (n > slides.length) { slideIndex = 1; }
        if (n < 1) { slideIndex = slides.length; }

        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        if (slides.length > 0) {
            slides[slideIndex - 1].style.display = "block";
            prev.style.display = 'block';
            next.style.display = 'block';
        }
    }

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function validateAndPreviewImages(event) {
        const input = event.target;
        const files = input.files;

        if (files.length !== 6) {
            alert('Please select exactly 6 images.');
            input.value = ''; // Clear the input
            return;
        }

        createSlideshow(input);
        document.getElementById('slideshow-container').style.display = 'block'; // Show slideshow container
    }

    function createSlideshow(input) {
        const slideshowContainer = document.getElementById('slideshow-container');
        slideshowContainer.innerHTML = ''; // Clear previous slideshow

        Array.from(input.files).forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function(e) {
                const slideDiv = document.createElement('div');
                slideDiv.classList.add('mySlides');

                const numberText = document.createElement('div');
                numberText.classList.add('numbertext');
                numberText.textContent = `${index + 1} / 6`;

                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100%';

                const captionText = document.createElement('div');
                captionText.classList.add('text');
                captionText.textContent = `Caption ${index + 1}`; // Customize the caption here

                slideDiv.appendChild(numberText);
                slideDiv.appendChild(img);
                slideDiv.appendChild(captionText);

                slideshowContainer.appendChild(slideDiv);

                // Show slides after all images have been read
                if (index === input.files.length - 1) {
                    showSlides(slideIndex = 1); // Automatically show the first image
                }
            };

            reader.readAsDataURL(file);
        });
    }

    document.getElementById('profile').addEventListener('change', validateAndPreviewImages);
</script>

</x-owner-app-layout>
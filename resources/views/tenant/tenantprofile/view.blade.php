<x-tenant-app-layout>
   <style>
      .profile-image {
         border-radius: 50%;
         width: 120px;  /* Increased size */
         height: 120px; /* Increased size */
         object-fit: cover;
         margin-bottom: 20px; /* Add space below the image */
      }

      .card-body {
         text-align: center; /* Center-align all card content */
      }

      .card-body h5 {
         font-size: 1.5rem; /* Increased font size */
         margin-bottom: 20px; /* Add space below the name */
      }

      .card-body p {
         font-size: 1.2rem; /* Increased font size */
         margin-bottom: 10px; /* Add space between information rows */
         text-align: left; /* Align text to the left */
      }

      .container-fluid h1 {
         font-size: 2.5rem; /* Increased header size */
      }

      .breadcrumb-item a {
         font-size: 1.2rem; /* Increased breadcrumb size */
      }

      .breadcrumb-item.active {
         font-size: 1.2rem; /* Increased breadcrumb size */
      }

      .modal-body h3 {
         font-size: 1.8rem; /* Increased modal text size */
      }

      .modal-body button {
         font-size: 1.2rem; /* Increased modal button size */
         padding: 10px 20px; /* Increased modal button padding */
      }
   </style>
<style>
   body {
     font-family: Arial;
     margin: 0;
   }
   
   * {
     box-sizing: border-box;
   }
   
   img {
     vertical-align: middle;
   }
   
   /* Position the image container (needed to position the left and right arrows) */
   .container {
     position: relative;
   }
   
   /* Hide the images by default */
   .mySlides {
     display: none;
   }
   
   /* Add a pointer when hovering over the thumbnail images */
   .cursor {
     cursor: pointer;
   }
   
   /* Next & previous buttons */
   .prev,
   .next {
     cursor: pointer;
     position: absolute;
     top: 55%;
     width: auto;
     padding: 16px;
     margin-top: -50px;
     color: white;
     font-weight: bold;
     font-size: 20px;
     border-radius: 0 3px 3px 0;
     user-select: none;
     -webkit-user-select: none;
   }
   
   /* Position the "next button" to the right */
   .next {
     right: 0;
     border-radius: 3px 0 0 3px;
   }
   
   /* On hover, add a black background color with a little bit see-through */
   .prev:hover,
   .next:hover {
     background-color: rgba(0, 0, 0, 0.8);
   }
   
   /* Number text (1/3 etc) */
   .numbertext {
     color: #f2f2f2;
     font-size: 12px;
     padding: 8px 12px;
     position: absolute;
     top: 0;
   }
   
   /* Container for image text */
   .caption-container {
     text-align: center;
     background-color: #222;
     padding: 2px 16px;
     color: white;
   }
   
   .row:after {
     content: "";
     display: table;
     clear: both;
   }
   
   /* Six columns side by side */
   .column {
     float: left;
     width: 16.66%;
   }
   
   /* Add a transparency effect for thumnbail images */
   .demo {
     opacity: 0.6;
   }
   
   .active,
   .demo:hover {
     opacity: 1;
   }
   </style>
<script>
   document.addEventListener("DOMContentLoaded", function() {
       let slideIndex = 1;
       showSlides(slideIndex);

       window.plusSlides = function(n) {
           showSlides(slideIndex += n);
       }

       window.currentSlide = function(n) {
           showSlides(slideIndex = n);
       }

       function showSlides(n) {
           let i;
           let slides = document.getElementsByClassName("mySlides");
           let captionText = document.querySelector(".caption");
           if (n > slides.length) { slideIndex = 1 }
           if (n < 1) { slideIndex = slides.length }
           for (i = 0; i < slides.length; i++) {
               slides[i].style.display = "none";
           }
           slides[slideIndex - 1].style.display = "block";
           if (captionText) {
               captionText.innerHTML = slides[slideIndex - 1].getAttribute("data-caption");
           }
       }
   });
</script>

   
<x-slot name="header">
   <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
               @foreach($tenantprofiles as $tenantprofile)
                <h1 class="m-0 text-dark"><span class="fa fa-user"></span> Tenant Profile</h1>
             </div>
             <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">Tenant Profile</li>
                </ol>
                @endforeach
             </div>
             {{-- @if ($tenantprofiles->isEmpty())
             <a class="btn btn-sm elevation-2" href="/tenant/tenantprofiles/create" style="margin-top: 20px;margin-left: 10px;background-color: #05445E;color: #ddd;"><i
                   class="fa fa-user-plus"></i>
                Add New</a>
                @endif --}}
          </div>
       </div>
       @if ($tenantprofiles->isEmpty())
       <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 70vh; text-align: center;">
         <h1 class="m-0 text-dark"><span class="fa fa-user"></span> Tenant Profile</h1><br>
         <a class="btn btn-sm elevation-2" href="/tenant/tenantprofiles/create" style="background-color: #05445E; color: #ddd; padding: 10px 20px; margin-bottom: 20px;">
             <i class="fa fa-user-plus"></i> Add New
         </a>
         <p style="max-width: 600px; color: #333;">
             Note: You can only edit once you have completed creating your tenant profile. After that, you can add your room, and finally, your bed.
         </p>
     </div>
    @endif
</x-slot>

         <div class="row">
            <div class="col-lg-4">
               <div class="card mb-4" style="margin-top: -20px;">
                  @foreach($tenantprofiles as $tenantprofile)
                  <div class="card-body text-center" style="height:316px;">
                        <!-- Profile Image -->
                        @if($tenantprofile->profile)
                           @if(file_exists(public_path('storage/' . $tenantprofile->profile)))
                              <img src="{{ asset('storage/' . $tenantprofile->profile) }}" alt="User Image" class="profile-image">
                           @else
                              <img src="{{ asset($tenantprofile->profile) }}" alt="User Image" class="profile-image">
                           @endif
                        @else
                           <img id="preview" src="{{ asset('avatar.jpg') }}" alt="Preview" class="profile-image">
                        @endif

                        <!-- Tenant Name -->
                        <h5>Tenant</h5>
                        <div class="d-flex justify-content-center mb-2">
                           <a class="btn btn-primary" href="/tenant/tenantprofiles/{{$tenantprofile->id}}"><i class="fa fa-user-edit"></i> Edit</a>
                        </div>
                     @endforeach
                  </div>
               </div>

               @php
               $alts = ['Kusina', 'School', 'Office', 'Cr', 'Background', 'Net'];
           @endphp
           
           @foreach ($rooms as $index => $room)
         <h1 class="m-0 text-dark"> <span class="fa fa-home"></span> Room Picture : <p class="caption" style="margin-top: -50px;margin-left:330px;"></p></h2>
               <div class="container">
                  <div class="card-body" style="margin-top:-20px;" >
                   @for ($i = 1; $i <= 6; $i++)
                       @php
                           $roomIndex = $i - 1;
                           $profilePath = isset($rooms[$roomIndex]) && $rooms[$roomIndex]->profile
                               ? 'storage/' . $rooms[$roomIndex]->profile
                               : 'room.jpg';
                           $altText = $alts[$roomIndex] ?? 'Default Room Image';
                           $captionText = $alts[$roomIndex] ?? 'Default Caption';
                       @endphp
                       <div class="mySlides" data-caption="{{ $captionText }}">
                           <img src="{{ asset($profilePath) }}" style="width:85%" alt="{{ $altText }}">
                       </div>
                   @endfor
                  </div>
                   
           
                   <a class="prev" onclick="plusSlides(-1)">❮</a>
                   <a class="next" onclick="plusSlides(1)">❯</a>
           
                   <div class="row">
                       {{-- @for ($i = 1; $i <= 6; $i++)
                           @php
                               $roomIndex = $i - 1;
                               $profilePath = isset($rooms[$roomIndex]) && $rooms[$roomIndex]->profile
                                   ? 'storage/' . $rooms[$roomIndex]->profile
                                   : 'room.jpg';
                               $altText = $alts[$roomIndex] ?? 'Default Room Image';
                           @endphp
                           <div class="column">
                               <img class="demo cursor" src="{{ asset($profilePath) }}" style="width:100%" onclick="currentSlide({{ $i }})" alt="{{ $altText }}">
                           </div>
                       @endfor --}}
                   </div>
               </div>
           @endforeach
            </div>

            <div class="col-lg-8">
               <div class="card mb-4" style="margin-top: -20px;">
                  @foreach($tenantprofiles as $tenantprofile)
                  <div class="card-body">
                        <div class="row">
                           <div class="col-sm-3">
                              <p class="mb-0">Full Name</p>
                           </div>
                           <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ $tenantprofile->fname." ".$tenantprofile->mname." ".$tenantprofile->lname }}</p>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-sm-3">
                              <p class="mb-0">Email</p>
                           </div>
                           <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ $tenantprofile->email }}</p>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-sm-3">
                              <p class="mb-0">Mobile</p>
                           </div>
                           <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ $tenantprofile->contact }}</p>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-sm-3">
                              <p class="mb-0">Address</p>
                           </div>
                           <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ $tenantprofile->address }}</p>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-sm-3">
                              <p class="mb-0">Gender</p>
                           </div>
                           <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ $tenantprofile->gender }}</p>
                           </div>
                        </div>
                     @endforeach
                  </div>
               </div>
               @if (!$tenantprofiles->isEmpty())
               <div class="row">
                  <div class="col-md-6">
                     <h1 class="m-0 text-dark"><span class="fa fa-home"></span> Room @if ($rooms->isEmpty())<a href="/tenant/rooms/create">Add</a>@endif</h1><br>
                     <div class="card mb-4 mb-md-0">
                        @foreach($rooms as $room)
                        <div class="card-body">
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Room No</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">{{ $room->room_no}}</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Room Status</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">{{ $room->description}}</p>
                              </div>
                           </div>
                           {{-- <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Room Picture</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0"> @if($room->profile)
                                    @if(file_exists(public_path('storage/' . $room->profile)))
                                        <img src="{{ asset('storage/' . $room->profile) }}" width="100" style="border: 2px solid gray">
                                    @else
                                        <img src="{{ asset($room->profile) }}" width="100" style="border: 2px solid gray">
                                    @endif
                                    @else
                                    <img id="preview" src="{{ asset('room.jpg') }}"width="100" style="border: 2px solid gray">
                                    @endif</p> --}}
                              {{-- </div>
                           </div> --}}
                           @endforeach
                        </div>
                        @endif
                     </div>
                  </div>
                  @if (!$rooms->isEmpty())
                  <div class="col-md-6">
                     <h1 class="m-0 text-dark"><span class="fa fa-bed"></span> Bed @if ($beds->isEmpty())<a href="/tenant/beds/create">Add</a>@endif</h1><br>
                     <div class="card mb-4 mb-md-0">
                        @foreach($beds as $bed)
                        <div class="card-body">
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Bed No</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">{{ $bed->bed_no}}</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Daily Rate</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">{{ $bed->daily_rate}}</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Monthly Rate</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">{{ $bed->monthly_rate}}</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0"> Bed Status</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">     @if ($bed->bed_status == 'occupied')
                                    <span class="badge bg-warning">{{ $bed->bed_status }}</span>
                                @elseif ($bed->bed_status == 'available')
                                    <span class="badge bg-success">{{ $bed->bed_status }}</span>
                                @endif</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            @endif
         </div>
      </div>
</x-tenant-app-layout>

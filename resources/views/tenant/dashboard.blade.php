<x-tenant-app-layout>
  @if (session('success') || session('login_success'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      // Directly running the script without DOMContentLoaded
      let title, text, redirectUrl;

      @if (session('success'))
        title = "Registration Successful!";
        text = "You will be redirected shortly.";
        redirectUrl = "{{ route('tenant.dashboard') }}";
      @elseif (session('login_success'))
        title = "Login Successful!";
        text = "You will be redirected shortly.";
        redirectUrl = "{{ route('tenant.dashboard') }}";
      @endif

      Swal.fire({
          title: title,
          text: text,
          icon: 'success',
          showConfirmButton: false, // Hide the confirm button
          timer: 2000, // Optionally, add a timer for automatic closure
          willClose: () => {
              // Redirect to the desired page after the alert is closed
              window.location.href = redirectUrl;
          }
      });
  </script>
@endif
    <x-slot name="header">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Tenant Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
    </x-slot>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Php 15,000.00</h3>

                <p>Balance</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Php 20,000.00<sup style="font-size: 20px"></sup></h3>

                <p>Payment History</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

      </div><!-- /.container-fluid -->

</x-tenant-app-layout>

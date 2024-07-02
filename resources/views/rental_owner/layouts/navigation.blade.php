 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="/">
           <i class="fas fa-sign-out-alt"></i>
        </a>
     </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="/logo.png" alt="Logo" width="230" height="50" style="margin-bottom:-120px;margin-top:-127px"
        style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">   
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./tenants.html" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Tenants Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./room-management.html" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Room Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./bed-management.html" class="nav-link">
              <i class="nav-icon fa fa-bed"></i>
              <p>
                Bed Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./bed-assignment.html" class="nav-link">
              <i class="nav-icon fa fa-bed"></i>
              <p>
                Bed Assignment
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./bill-rates.html" class="nav-link">
              <i class="nav-icon fa fa-money-bill"></i>
              <p>
                Utility Bills
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./invoice.html" class="nav-link">
              <i class="nav-icon fa fa-file-invoice"></i>
              <p>
                Invoice
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./payment-history.html" class="nav-link">
              <i class="nav-icon fa fa-file "></i>
              <p>
                Payment History
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./payments.html" class="nav-link">
              <i class="nav-icon fa fa-file-invoice"></i>
              <p>
                Payments 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./sms.html" class="nav-link">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                SMS Configuration 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./notice.html" class="nav-link">
              <i class="nav-icon fa fa-bell"></i>
              <p>
                Notice Board
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./suggestions.html" class="nav-link">
              <i class="nav-icon fa fa-file-invoice"></i>
              <p>
                Suggestions 
              </p>
            </a>
          </li>
          <li class="nav-header">REPORTS</li>
          <li class="nav-item">
            <a href="./income-report.html" class="nav-link">
              <i class="nav-icon fa fa-chart-bar"></i>
              <p>
                Income Report  
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./collectibles.html" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Collectibles 
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>

                <p>Number of Tenants</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0<sup style="font-size: 20px"></sup></h3>

                <p>Number of Rooms</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>0</h3>

                <p>Number of Beds</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024-2025 <a href="#">HOMIES</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Capstone</b> 2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
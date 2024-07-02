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
            <form method="POST" action="{{ route('rental_owner.logout') }}">
                @csrf
            <a class="nav-link" data-widget="fullscreen" href="route('rental_owner.logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
               <i class="fas fa-sign-out-alt"></i>
            </a>
        </form>
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
            <a href="/rental_owner/dashboard" class="nav-link">
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

  </div>
 
<!-- ./wrapper -->
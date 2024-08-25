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
               <i class="fas fa-sign-out-alt">Logout</i>
            </a>
        </form>
         </li>
        </ul>
      </nav>
      <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/rental_owner/dashboard" class="brand-link">
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
            <a href="/rental_owner/bedassigns" class="nav-link">
              <i class="nav-icon fa fa-bed"></i>
              <p>
                Bed Assignment
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/rental_owner/selecteds" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Room Selected
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/rental_owner/selectbeds" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Bed Selected
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/rental_owner/bills" class="nav-link">
              <i class="nav-icon fa fa-money-bill"></i>
              <p>
                Utility Bills
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rental_owner.invoice')}}" class="nav-link">
              <i class="nav-icon fa fa-file-invoice"></i>
              <p>
                Invoice
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rental_owner.payment')}}" class="nav-link">
              <i class="nav-icon fa fa-file-invoice"></i>
              <p>
                Payments 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rental_owner.paymenthistory')}}" class="nav-link">
              <i class="nav-icon fa fa-file "></i>
              <p>
                Payment History
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rental_owner.sms')}}" class="nav-link">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                SMS Configuration 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rental_owner.notice')}}" class="nav-link">
              <i class="nav-icon fa fa-bell"></i>
              <p>
                Notice Board
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rental_owner.suggestion')}}" class="nav-link">
              <i class="nav-icon fa fa-file-invoice"></i>
              <p>
                Suggestions 
              </p>
            </a>
          </li>
          <li class="nav-header">REPORTS</li>
          <li class="nav-item">
            <a href="{{route('rental_owner.income')}}" class="nav-link">
              <i class="nav-icon fa fa-chart-bar"></i>
              <p>
                Income Report  
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rental_owner.collectibles')}}" class="nav-link">
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
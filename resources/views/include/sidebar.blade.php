<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ url('/BPS.png') }}" alt="BPS logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Monitoring BPS</span><br>
      <span style="margin-left: 64px"></span>
      <span class="brand-text font-weight-light" style="font-size: 12pt">Kecamatan Srono</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @php
            $avatars = Auth::user()->avatars == '' ? 'user-default.jpg' : Auth::user()->avatars;
          @endphp
          <img src="{{ url('/assets/avatars/'.$avatars) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        @php
          $nama = Auth::user()->name;
          $nmarray = explode(' ',$nama);
          $sdbrarray = explode(' ',$title,-1);
          $sidebar_active = ucwords(preg_replace('/-/m', ' ', $title));
        @endphp
        <div class="info">
          <a href="{{ route('index.profil') }}" class="d-block">
            @if (count($nmarray) == 1)
            {{ $nmarray[0]}}
            @else
            {{ $nmarray[0]." ".$nmarray[1] }}
            @endif
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item {{ $title == "Dashboard" ? "menu-open":"" }}">
            <a href="{{ route('dashboard') }}" class="nav-link {{ $title == "Dashboard" ? "active" : "" }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item 
          @foreach ($sdbrarray as $sdbr )  
          {{ $sdbr == 'Sektor' ? 'menu-open' : '' }}
          @endforeach">
            <a href="#" class="nav-link @foreach ($sdbrarray as $sdbr )  
            {{ $sdbr == 'Sektor' ? 'active' : '' }}
            @endforeach">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left
                @foreach ($sdbrarray as $sdbr )  
                {{ $sdbr == 'Sektor' ? 'active' : '' }}
                @endforeach"></i></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('index.sektor.pertanian') }}" class="nav-link {{ $sidebar_active == "Sektor Pertanian" ? "active":"" }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sektor Pertanian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('index.sektor.perkebunan') }}" class="nav-link {{ $sidebar_active == "Sektor Perkebunan" ? "active":"" }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sektor Perkebunan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('index.sektor.perikanan') }}" class="nav-link {{ $sidebar_active == "Sektor Perikanan" ? "active":"" }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sektor Perikanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('index.sektor.peternakan') }}" class="nav-link {{ $sidebar_active == "Sektor Peternakan" ? "active":"" }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sektor Peternakan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ $title == "Deskripsi" ? "menu-open" : "" }}">
            <a href="#" class="nav-link {{ $title == "Deskripsi" ? "active" : "" }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('edit.deskripsi') }}" class="nav-link {{ $title == "Deskripsi" ? "active" : "" }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deskripsi</p>
                </a>
              </li>
              
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

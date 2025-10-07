<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle <?php echo e(request()->is(['karyawan', 'departemen']) ? 'show' : ''); ?>" 
      href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" 
      aria-expanded="<?php echo e(request()->is(['karyawan', 'departemen']) ? 'true' : ''); ?>" >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" 
        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
          <path d="M12 12l8 -4.5" />
          <path d="M12 12l0 9" />
          <path d="M12 12l-8 -4.5" />
          <path d="M16 5.25l-8 4.5" />
        </svg>
      </span>
      <span class="nav-link-title">
        Data Master
      </span>
    </a>
    <div class="dropdown-menu <?php echo e(request()->is(['yayasankaryawan', 'yayasandepartemen', 'yayasancuti']) ? 'show' : ''); ?>">
      <div class="dropdown-menu-columns">
        <div class="dropdown-menu-column">
          <a class="dropdown-item <?php echo e(request()->is(['yayasankaryawan']) ? 'active' : ''); ?>" href="/yayasankaryawan">
            Karyawan
          </a>
          <a class="dropdown-item <?php echo e(request()->is(['yayasandepartemen']) ? 'active' : ''); ?>" href="/yayasandepartemen">
            Departemen
          </a>
          <a class="dropdown-item <?php echo e(request()->is(['yayasancuti']) ? 'active' : ''); ?>" href="/yayasancuti">
            Cuti
          </a>
          <a class="dropdown-item <?php echo e(request()->is(['yayasankelas']) ? 'active' : ''); ?>" href="/yayasankelas">
            Kelas
          </a>
        </div>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo e(request()->is(['presensi/monitoring']) ? 'active' : ''); ?>" href="/presensi/monitoring" >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  
        stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
        class="icon icon-tabler icons-tabler-outline icon-tabler-heart-rate-monitor">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M3 4m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" />
          <path d="M7 20h10" />
          <path d="M9 16v4" />
          <path d="M15 16v4" />
          <path d="M7 10h2l2 3l2 -6l1 3h3" />
        </svg>
      </span>
      <span class="nav-link-title">
        Monitoring Presensi
      </span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo e(request()->is(['yayasanizinsakit']) ? 'active' : ''); ?>" href="/yayasanizinsakit" >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  
        stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
        class="icon icon-tabler icons-tabler-outline icon-tabler-chart-bar">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M3 13a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
          <path d="M15 9a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
          <path d="M9 5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
          <path d="M4 20h14" />
        </svg>
      </span>
      <span class="nav-link-title">
        Data Izin / Sakit
      </span>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle <?php echo e(request()->is(['presensi/laporan', 'presensi/rekap']) ? 'show' : ''); ?>" 
      href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" 
      aria-expanded="<?php echo e(request()->is(['laporan', 'rekap']) ? 'true' : ''); ?>" >
      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  
        stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
        class="icon icon-tabler icons-tabler-outline icon-tabler-file-description">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M14 3v4a1 1 0 0 0 1 1h4" />
          <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
          <path d="M9 17h6" />
          <path d="M9 13h6" />
        </svg>
      </span>
      <span class="nav-link-title">
        Laporan
      </span>
    </a>
    <div class="dropdown-menu <?php echo e(request()->is(['presensi/laporan', 'presensi/rekap']) ? 'show' : ''); ?>">
      <div class="dropdown-menu-columns">
        <div class="dropdown-menu-column">
          <a class="dropdown-item <?php echo e(request()->is(['presensi/laporan']) ? 'active' : ''); ?>" href="/presensi/laporan">
            Presensi
          </a>
          <a class="dropdown-item <?php echo e(request()->is(['presensi/rekap']) ? 'active' : ''); ?>" href="/presensi/rekap">
            Rekap Presensi
          </a>
        </div>
      </div>
    </div>
  </li>
  <?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/layouts/admin/menuyayasan.blade.php ENDPATH**/ ?>
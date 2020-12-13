<?php
    echo '<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Portfolio</div>
      </a>';

      echo '
      <hr class="sidebar-divider"/>

      <!-- Heading -->
      <div class="sidebar-heading">
        Lists
      </div>
      ';

      if($href == "projects.php"){
        echo '<li class="nav-item active">';
      } else {
        echo '<li class="nav-item">';
      }

      echo '
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProjects" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Projects</span>
        </a>
      ';

      if($href == "Projects.php"){
        echo '
          <div id="collapseProjects" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">';
      } else {
        echo '
          <div id="collapseProjects" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">';
      }
      
      echo '
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item active" href="/projects.php">Projects</a>
            </div>
          </div>
        </li>';

        if($href == "works.php"){
          echo '<li class="nav-item active">';
        } else {
          echo '<li class="nav-item">';
        }
  
        echo '
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWorks" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Works</span>
          </a>
        ';
  
        if($href == "works.php"){
          echo '
            <div id="collapseWorks" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">';
        } else {
          echo '
            <div id="collapseWorks" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">';
        }
        
            echo '
              <div class="bg-white py-2 collapse-inner rounded">
            
                <a class="collapse-item active" href="/works.php">Works</a>
              </div>
            </div>
          </li>';

      echo '

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->';
?>
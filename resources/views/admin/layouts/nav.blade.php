<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="{{ url('/admin/groups') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
          <p>
            Group Management
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/admin/semesters')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
          <p>
            Semester Mangement
          </p>
        </a>
      </li>

     
      </li>

      <li class="nav-item">
        <a href="{{url("/admin/courselists")}}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Course Management
          </p>
        </a>
    
      <li class="nav-item">
        <a href="{{ url('/admin/coursoffers') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
          <p>
            Course Offer Information
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/admin/facilitis') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
          <p>
            Teacher Information
          </p>
        </a>
      </li>
    
      
      <li class="nav-item">
        <a href="{{ url('/admin/exams') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
          <p>
            Examination Routine 
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{url("/admin/courses")}}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Result Mangament
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ url('/admin/gradpoints') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
              <p>
               Grad Point
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/resultinfos" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Result Information</p>
            </a>
          </li>
        </ul>
      </li>

    
   

    
    
    
  
    </ul>
  </nav>
   <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
   
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!-- Docs CTA -->
      

            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >

                <li class="nav-item">
                <a href="{{ route('personal.dashboard')}}" class="nav-link">
                <i class="fas fa-home nav-icon"></i>
                  <p>Главная</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('personal.liked.index')}}" class="nav-link">
                  <i class="fas fa-heart nav-icon"></i>
                  <p>Понравившиеся посты</p>
                </a>
              </li>

             <li class="nav-item">
                <a href="{{ route('personal.comment.index')}}" class="nav-link">
                  <i class="fas fa-comment nav-icon"></i>
                  <p>Комментарии</p>
                </a>
              </li>
          
             
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
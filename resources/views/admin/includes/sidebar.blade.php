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
                <a href="{{ route('admin.users.index')}}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                  <p>Пользователи</p>
                </a>
              </li>

             <li class="nav-item">
                <a href="{{ route('admin.posts.index')}}" class="nav-link">
                  <i class="far fa-clipboard nav-icon"></i>
                  <p>Посты</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{ route('admin.categories.index')}}" class="nav-link">
                  <i class="bi bi-card-list nav-icon"></i>
                  <p>Категории</p>
                </a>
              </li>
              <li class="nav-item">
                    <a href="{{ route('admin.tags.index')}}" class="nav-link">
                      <i class="fas fa-tags nav-icon"></i>
                      <p>Теги</p>
                    </a>
              </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
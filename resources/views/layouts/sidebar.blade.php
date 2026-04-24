<div class="navigation-menu-group">
    <div class="open" id="dashboards">
        <ul>
         <li class="navigation-divider">Dashboard</li>
         <li>
            <a href="{{route('admin.index')}}" data-toggle="tooltip" data-placement="right" title="Dashboard"
           data-nav-target="#dashboards">
           <i class="fa-solid fa-gauge-high"></i> &nbsp;Dashboard</a>
        </li>

         <li class="navigation-divider">Manage Website</li>

          <li>
            <a href="" data-toggle="tooltip" data-placement="right" title="Manage Projects"
            data-nav-target="#dashboards">
             <i class="fa-solid fa-hard-hat"></i>&nbsp; Manage Projects</a>
             <ul>
                 <li><a href="{{route('admin.project.create')}}">Add Project</a></li>
                 <li><a href="{{route('admin.project.index')}}">Manage Projects</a></li>
             </ul>
         </li>

        <li>
            <a href="" data-toggle="tooltip" data-placement="right" title="Manage Categories"
            data-nav-target="#dashboards">
             <i class="fa-solid fa-tags"></i>&nbsp; Manage Categories</a>
             <ul>
                 <li><a href="{{route('category.create')}}">Add Category</a></li>
                 <li><a href="{{route('category.index')}}">Manage Categories</a></li>
             </ul>
         </li>

         <li>
            <a href="" data-toggle="tooltip" data-placement="right" title="Manage Packages"
            data-nav-target="#dashboards">
             <i class="fa-solid fa-box-open"></i>&nbsp; Manage Packages</a>
             <ul>
                 <li><a href="{{route('admin.package.create')}}">Add Package</a></li>
                 <li><a href="{{route('admin.package.index')}}">Manage Packages</a></li>
             </ul>
         </li>

        <li>
            <a href="" data-toggle="tooltip" data-placement="right" title="Manage Products"
           data-nav-target="#dashboards">
            <i class="fa-solid fa-solar-panel"></i>&nbsp; Manage Products</a>
            <ul>
                <li><a href="{{route('product.create')}}">Add Product</a></li>
                <li><a href="{{route('product.index')}}">Manage Products</a></li>
            </ul>
        </li>

        <li>
            <a href="" data-toggle="tooltip" data-placement="right" title="Manage Services"
           data-nav-target="#dashboards">
            <i class="fa-solid fa-screwdriver-wrench"></i>&nbsp; Manage Services</a>
            <ul>
                <li><a href="{{route('admin.service.create')}}">Add Service</a></li>
                <li><a href="{{route('admin.service.index')}}">Manage Services</a></li>
            </ul>
        </li>

        <li>
            <a href="" data-toggle="tooltip" data-placement="right" title="Manage Blogs"
           data-nav-target="#dashboards">
            <i class="fa-solid fa-newspaper"></i>&nbsp; Manage Blogs</a>
            <ul>
                <li><a href="{{route('admin.blog.create')}}">Add Blog Post</a></li>
                <li><a href="{{route('admin.blog.index')}}">Manage Blogs</a></li>
            </ul>
        </li>

        <li class="navigation-divider">Orders &amp; Payments</li>
        <li>
            <a href="" data-toggle="tooltip" data-placement="right" title="View and Manage Orders"
            data-nav-target="#dashboards">
            <i class="fa-solid fa-chart-line"></i>&nbsp; Manage Sales</a>
             <ul>
                 <li><a href="{{route('admin.orders')}}">View Orders</a></li>
             </ul>
         </li>
         <li>
            <a href="" data-toggle="tooltip" data-placement="right" title="Manual Payment"
            data-nav-target="#dashboards">
            <i class="fa-solid fa-credit-card"></i>&nbsp; Manual Payment</a>
             <ul>
                 <li><a href="{{route('admin.manual.payments')}}">View Payments</a></li>
             </ul>
         </li>

        <li class="navigation-divider">Manage Users</li>
        <li>
            <a href="" data-toggle="tooltip" data-placement="right" title="View and Manage Users"
               data-nav-target="#dashboards">
               <i class="fa-solid fa-users"></i>&nbsp; Manage Users</a>
                <ul>
                      <li><a href="{{route('admin.users')}}">Manage Users</a></li>
                </ul>
            </li>
            <li>
                <a href="" data-toggle="tooltip" data-placement="right" title="Send Notifications to Users"
                   data-nav-target="#dashboards">
                   <i class="fa-solid fa-bell"></i>&nbsp; Notifications</a>
                    <ul>
                          <li><a href="{{route('admin.notify')}}">Send Notifications</a></li>
                    </ul>
                </li>
                <li>
                    <a href="" data-toggle="tooltip" data-placement="right" title="View Analytics"
                       data-nav-target="#dashboards">
                       <i class="fa-solid fa-chart-bar"></i>&nbsp; Analytics</a>
                        <ul>
                              <li><a href="{{route('admin.analytical')}}">View Analytics</a></li>
                        </ul>
                    </li>

        <li class="navigation-divider">Settings</li>
        <li>
            <a href="" data-toggle="tooltip" data-placement="right" title="Website Settings"
               data-nav-target="#dashboards">
                <i class="fa-solid fa-globe"></i>&nbsp; Website Settings</a>
                <ul>
                      <li><a href="{{route('admin.settings.index')}}">Manage Contents</a></li>
                </ul>
        </li>
        <li>
            <a href="" data-toggle="tooltip" data-placement="right" title="Manage Admin"
               data-nav-target="#dashboards">
                <i class="fa-solid fa-user-shield"></i>&nbsp; Manage Admin</a>
                <ul>
                      <li><a href="{{route('admin.profile')}}">Manage Admin</a></li>
                </ul>
          </li>

        </ul>
    </div>
</div>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="{{ asset('backend/assets/') }}/index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Super Admin </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ asset('backend/assets/') }}/index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    {{-- category manage --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecategory"
            aria-expanded="true" aria-controls="collapsecategory">
            <i class="fas fa-align-justify"></i>
            <span>Categories</span>
        </a>
        <div id="collapsecategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('category.create') }}">Add Category</a>
                <a class="collapse-item" href="{{ route('category.index') }}">Manage Categories</a>
            </div>
        </div>
    </li>

    {{-- Brand manage --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsebrand" aria-expanded="true"
            aria-controls="collapsebrand">
            <i class="fas fa-random"></i>
            <span>Brands</span>
        </a>
        <div id="collapsebrand" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('brands.create') }}">Add Brand</a>
                <a class="collapse-item" href="{{ route('brands.index') }}">Manage Brands</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseproduct"
            aria-expanded="true" aria-controls="collapseproduct">
            <i class="fas fa-shopping-cart"></i>
            <span>Product</span>
        </a>
        <div id="collapseproduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/product/create') }}">Add Product</a>
                <a class="collapse-item" href="{{ url('/product/manage') }}">Manage Product</a>
            </div>
        </div>
    </li>
    {{-- order manage --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/manage/order') }}">
            <i class="fas fa-random"></i>
            <span>Order manage</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
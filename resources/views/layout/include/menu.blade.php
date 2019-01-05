<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

            <li class="heading">
                <h3 class="uppercase">Admin Menu</h3>
            </li>            
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('dashboard.index') }}" class="nav-link ">
                            <span class="title">Menu</span>
                        </a>
                    </li>                                      
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-male"></i>
                    <span class="title">Klien</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('client.index') }}" class="nav-link ">
                            <span class="title">Daftar Klien</span>
                        </a>
                    </li>                                      
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-building-o"></i>
                    <span class="title">Project</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('project.index') }}" class="nav-link ">
                            <span class="title">Data Projek</span>
                        </a>
                    </li>                    
                </ul>
            </li>           
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cubes"></i>
                    <span class="title">Gudang</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route( 'warehouse.index' ) }}" class="nav-link ">
                            <span class="title">Data Gudang</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route( 'warehouse_purchase.index' ) }}" class="nav-link ">
                            <span class="title">Pembelian Barang</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route( 'warehouse_rent.index' ) }}" class="nav-link ">
                            <span class="title">Peminjaman Barang</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route( 'warehouse_sell.index' ) }}" class="nav-link ">
                            <span class="title">Penjualan Barang</span>
                        </a>
                    </li>
                </ul>                
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Karyawan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route( 'employee.index' ) }}" class="nav-link ">
                            <span class="title">Data Karyawan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route( 'employee_salary.index' ) }}" class="nav-link ">
                            <span class="title">Gaji Karyawan</span>
                        </a>
                    </li>
                </ul>                
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Mutasi Uang</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route( 'mutation.index' ) }}" class="nav-link ">
                            <span class="title">Data Mutasi</span>
                        </a>
                    </li>                    
                </ul>                
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
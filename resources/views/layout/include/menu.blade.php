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
            
            @hasanyrole('ADMIN|SUPER_ADMIN')
                <li class="nav-item {{ Route::is('dashboard.index') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="arrow {{ Route::is('dashboard.index') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{ Route::is('dashboard.index') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.index') }}" class="nav-link ">
                                <span class="title">Dashboard</span>
                            </a>
                        </li>                                      
                    </ul>
                </li>
                @can('admin_add', 'admin_edit', 'admin_delete')
                    <li class="nav-item  {{ Route::is('user.*') ? 'active' : '' }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-exclamation-triangle"></i>
                            <span class="title">Admin</span>
                            <span class="arrow {{ Route::is('user.*') ? 'open' : '' }}"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  {{ Route::is('user.*') ? 'active' : '' }}">
                                <a href="{{ route('user.index') }}" class="nav-link ">
                                    <span class="title">Admin</span>
                                </a>
                            </li>                                      
                        </ul>
                    </li>
                @endcan            
                <li class="nav-item {{ Route::is('company_cash.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="title">Kas</span>
                        <span class="arrow {{ Route::is('company_cash.*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{ Route::is('company_cash.*') ? 'active' : '' }}">
                            <a href="{{ route( 'company_cash.index' ) }}" class="nav-link ">
                                <span class="title">Pengeluaran</span>
                            </a>
                        </li>                    
                    </ul>                
                </li>
                <li class="nav-item {{ Route::is('private_money.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-credit-card"></i>
                        <span class="title">Uang Pribadi</span>
                        <span class="arrow {{ Route::is('private_money.*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{ Route::is('private_money.*') ? 'active' : '' }}">
                            <a href="{{ route( 'private_money.index' ) }}" class="nav-link ">
                                <span class="title">Data</span>
                            </a>
                        </li>                    
                    </ul>                
                </li>
                <li class="nav-item  {{ Route::is('client.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-male"></i>
                        <span class="title">Klien</span>
                        <span class="arrow {{ Route::is('client.*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{ Route::is('client.*') ? 'active' : '' }}">
                            <a href="{{ route('client.index') }}" class="nav-link ">
                                <span class="title">Daftar Klien</span>
                            </a>
                        </li>                                      
                    </ul>
                </li>
                <li class="nav-item  {{ Route::is('project.*') || Route::is('project_payment.*') || Route::is('project_payment_index')
                    || Route::is('project_payment_create') || Route::is('project_supply.*') || Route::is('project_supply_index')
                    || Route::is('project_supply_create') || Route::is('project_purchase.*') || Route::is('project_purchase_index')
                    || Route::is('project_purchase_create') || Route::is('project_worker.*') || Route::is('project_worker_index')
                    || Route::is('project_worker_create') || Route::is('worker_salary.*') || Route::is('worker_salary_index')
                    || Route::is('worker_salary_create') || Route::is('ps_transaction.*') || Route::is('ps_transaction_index')
                    || Route::is('ps_transaction_create') || Route::is('project_bonus.*') || Route::is('project_bonus_index')
                    || Route::is('project_bonus_create') ||  Route::is('worker_contract.*') || Route::is('worker_contract_index')
                    || Route::is('worker_contract_create') || Route::is('pct.*') || Route::is('pct_index')
                    || Route::is('pct_create')  ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-building-o"></i>
                        <span class="title">Project</span>
                        <span class="arrow {{ Route::is('project.*') || Route::is('project_payment.*') || Route::is('project_payment_index')
                            || Route::is('project_payment_create') || Route::is('project_supply.*') || Route::is('project_supply_index')
                            || Route::is('project_supply_create') || Route::is('project_purchase.*') || Route::is('project_purchase_index')
                            || Route::is('project_purchase_create') || Route::is('project_worker.*') || Route::is('project_worker_index')
                            || Route::is('project_worker_create') || Route::is('worker_salary.*') || Route::is('worker_salary_index')
                            || Route::is('worker_salary_create') || Route::is('ps_transaction.*') || Route::is('ps_transaction_index')
                            || Route::is('ps_transaction_create') || Route::is('project_bonus.*') || Route::is('project_bonus_index')
                            || Route::is('project_bonus_create') ||  Route::is('worker_contract.*') || Route::is('worker_contract_index')
                            || Route::is('worker_contract_create') || Route::is('pct.*') || Route::is('pct_index')
                            || Route::is('pct_create')  ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{ Route::is('project.*') || Route::is('project_payment.*') || Route::is('project_payment_index')
                            || Route::is('project_payment_create') || Route::is('project_supply.*') || Route::is('project_supply_index')
                            || Route::is('project_supply_create') || Route::is('project_purchase.*') || Route::is('project_purchase_index')
                            || Route::is('project_purchase_create') || Route::is('project_worker.*') || Route::is('project_worker_index')
                            || Route::is('project_worker_create') || Route::is('worker_salary.*') || Route::is('worker_salary_index')
                            || Route::is('worker_salary_create') || Route::is('ps_transaction.*') || Route::is('ps_transaction_index')
                            || Route::is('ps_transaction_create') || Route::is('project_bonus.*') || Route::is('project_bonus_index')
                            || Route::is('project_bonus_create') ||  Route::is('worker_contract.*') || Route::is('worker_contract_index')
                            || Route::is('worker_contract_create') || Route::is('pct.*') || Route::is('pct_index')
                            || Route::is('pct_create')  ? 'active' : '' }}">
                            
                            <a href="{{ route('project.index') }}" class="nav-link ">
                                <span class="title">Data Projek</span>
                            </a>
                        </li>                    
                    </ul>
                </li>           
                <li class="nav-item  {{ Route::is('warehouse.*') || Route::is('warehouse_rent.*') || Route::is('rent_payment.*')
                    || Route::is('rent_payment_create') || Route::is('warehouse_sell.*') 
                    || Route::is('repair_and_used.*') ? 'active' : '' }}">
                    
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-cubes"></i>
                        <span class="title">Gudang</span>
                        <span class="arrow {{ Route::is('warehouse.*') || Route::is('warehouse_rent.*') || Route::is('rent_payment.*')
                            || Route::is('rent_payment_create') || Route::is('warehouse_sell.*') 
                            || Route::is('repair_and_used.*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{ Route::is('warehouse.*') ? 'active' : '' }}">
                            <a href="{{ route( 'warehouse.index' ) }}" class="nav-link ">
                                <span class="title">Data Gudang</span>
                            </a>
                        </li>
                        <li class="nav-item  {{ Route::is('warehouse_rent.*') || Route::is('rent_payment.*') || Route::is('rent_payment_create')
                            ? 'active' : '' }}">
                            <a href="{{ route( 'warehouse_rent.index' ) }}" class="nav-link ">
                                <span class="title">Peminjaman Barang</span>
                            </a>
                        </li>
                        <li class="nav-item  {{ Route::is('warehouse_sell.*') ? 'active' : '' }}">
                            <a href="{{ route( 'warehouse_sell.index' ) }}" class="nav-link ">
                                <span class="title">Penjualan Barang</span>
                            </a>
                        </li>
                        <li class="nav-item  {{ Route::is('repair_and_used.*') ? 'active' : '' }}">
                            <a href="{{ route( 'repair_and_used.index' ) }}" class="nav-link ">
                                <span class="title">Barang Rusak / Dipakai</span>
                            </a>
                        </li>
                    </ul>                
                </li>
                <li class="nav-item {{ Route::is('employee.*') || Route::is('employee_salary.*')
                    || Route::is('salary_month.*') || Route::is('salary_month_detail.*')
                    || Route::is('smd_create') || Route::is('employee_transaction.*') || Route::is('employee_transaction_index')
                    || Route::is('employee_transaction_create') || Route::is('employee_bonus.*') || Route::is('employee_bonus_index')
                    || Route::is('employee_bonus_create')  ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">Karyawan</span>
                        <span class="arrow {{ Route::is('employee.*') || Route::is('employee_salary.*')
                            || Route::is('salary_month.*') || Route::is('salary_month_detail.*')
                            || Route::is('smd_create') || Route::is('employee_transaction.*') || Route::is('employee_transaction_index')
                            || Route::is('employee_transaction_create') || Route::is('employee_bonus.*') || Route::is('employee_bonus_index')
                            || Route::is('employee_bonus_create')  ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{ Route::is('employee.*') ? 'active' : '' }}">
                            <a href="{{ route( 'employee.index' ) }}" class="nav-link ">
                                <span class="title">Data Karyawan</span>
                            </a>
                        </li>
                        <li class="nav-item  {{ Route::is('employee_salary.*') ? 'active' : '' }}">
                            <a href="{{ route( 'employee_salary.index' ) }}" class="nav-link ">
                                <span class="title">Gaji Pokok</span>
                            </a>
                        </li>
                        <li class="nav-item  {{ Route::is('salary_month.*') || Route::is('salary_month_detail.*')
                            || Route::is('smd_create') || Route::is('employee_transaction.*') || Route::is('employee_transaction_index')
                            || Route::is('employee_transaction_create') || Route::is('employee_bonus.*') || Route::is('employee_bonus_index')
                            || Route::is('employee_bonus_create') ? 'active' : '' }}">
                            <a href="{{ route( 'salary_month.index' ) }}" class="nav-link ">
                                <span class="title">Gaji Bulanan</span>
                            </a>
                        </li>
                    </ul>                
                </li>
                <li class="nav-item  {{ Route::is('mutation.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-money"></i>
                        <span class="title">Mutasi Uang</span>
                        <span class="arrow {{ Route::is('mutation.*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{ Route::is('mutation.*') ? 'active' : '' }}">
                            <a href="{{ route( 'mutation.index' ) }}" class="nav-link ">
                                <span class="title">Data Mutasi</span>
                            </a>
                        </li>                    
                    </ul>                
                </li>
                <li class="nav-item  {{ Route::is('transportation.*') || Route::is('transaction_transportation.*')
                    || Route::is('transaction_transportation_index') || Route::is('transaction_transportation_create')  ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-truck"></i>
                        <span class="title">Transportasi</span>
                        <span class="arrow {{ Route::is('transportation.*') || Route::is('transaction_transportation.*')
                    || Route::is('transaction_transportation_index') || Route::is('transaction_transportation_create')  ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{ Route::is('transportation.*') || Route::is('transaction_transportation.*')
                    || Route::is('transaction_transportation_index') || Route::is('transaction_transportation_create')  ? 'active' : '' }}">
                            <a href="{{ route( 'transportation.index' ) }}" class="nav-link ">
                                <span class="title">Data Transportasi</span>
                            </a>
                        </li>                    
                    </ul>                
                </li>
            @endhasanyrole

            @hasanyrole('ADMIN|EMPLOYEE')
                <li class="nav-item  {{ Route::is('show_salary.*') || Route::is('show_salary_gaji')
                    || Route::is('show_salary_bonus') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-user"></i>
                        <span class="title">Profil</span>
                        <span class="arrow {{ Route::is('show_salary.*') || Route::is('show_salary_gaji')
                            || Route::is('show_salary_bonus') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{ Route::is('show_salary.*') || Route::is('show_salary_gaji')
                            || Route::is('show_salary_bonus') ? 'active' : '' }}">
                            <a href="{{ route( 'show_salary.index' ) }}" class="nav-link ">
                                <span class="title">Profil</span>
                            </a>
                        </li>                    
                    </ul>                
                </li>
            @endhasanyrole
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
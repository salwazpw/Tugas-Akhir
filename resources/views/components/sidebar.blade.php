<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('home') }}" class="brand-link">
        {{-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}        
        <i class="fa fa-gavel pl-3"></i>
        <span class="brand-text font-weight-light">Salwazpw Tender</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">                
                <li class="nav-item">
                    <a href="{{ route('home') }}/" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard                            
                        </p>
                    </a>                    
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-gavel"></i>
                        <p>
                            Tenders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tender.index') }}" class="nav-link">                            
                                <i class="fa fa-list nav-icon"></i>
                                <p>Ongoing</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index2.html" class="nav-link">                                
                                <i class="fa fa-history nav-icon"></i>
                                <p>History</p>
                            </a>
                        </li>                        
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vendor.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>
                            Vendors                            
                        </p>
                    </a>                    
                </li>                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Criteria
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('criteria.index') }}" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Master Data</p>
                            </a>
                        </li>                        
                    </ul>
                </li>                
            </ul>
        </nav>
    </div>
</aside>

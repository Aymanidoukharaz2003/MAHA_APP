<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{route('personnel.dashboard')}}"><i class="ti-home"></i><span
                       class="right-nav-text">Tableau de bord</span></a>
                   </li>
                   
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Management des projets </li> 
                    <!-- menu item Projets-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="fa-solid fa-clipboard-check"></i><span
                                    class="right-nav-text">Projets</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            
                            <li><a href="{{ route('personnel.projets', ['email' => Auth::user()->email]) }}">Liste Des Projets</a></li>                   
                        
                        </ul>
                    </li>

                    <!-- menu font Produit-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt"></i><span class="right-nav-text">Produits</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('personnel.produits', ['email' => Auth::user()->email]) }}">Listes Des produits</a> </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
&
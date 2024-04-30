<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{route('admin.dashboard')}}"><i class="ti-home"></i><span
                       class="right-nav-text">Tableau de bord</span></a>
                   </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Employés </li>
                    <!-- menu item Personnels-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="fa-solid fa-user-tie"></i><span
                                    class="right-nav-text">Personnels</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('admin.personnel') }}">Ajouter un personnel</a></li>
                            <li><a href="{{route('personnel.show')}}">Liste Des personnels</a></li>
                            
                        </ul>
                    </li>
                    <!-- menu item Consulteur-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-user"></i><span
                                    class="right-nav-text">Consulteurs</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('admin.consulteur') }}">Ajouter Consulteur </a> </li>
                            <li> <a href="{{ route('consulteur.show') }}">Liste Des consulteurs</a> </li>
                        </ul>
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
                            <li> <a href="{{ route('admin.projet') }}">Ajouter Projet</a> </li>
                            <li> <a href="{{ route('projet.show') }}">Listes Des Projets</a> </li>
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
                            <li> <a href="{{ route('admin.produit') }}">Ajouter Produit</a> </li>
                            <li> <a href="{{ route('produit.show') }}">Listes Des produits</a> </li>
                        </ul>
                    </li>
                    <!-- menu item Form-->
                    
                    <!-- menu item table -->
                   
                
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
&
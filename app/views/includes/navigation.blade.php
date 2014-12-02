        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::to('/index') }}">Leo's Website</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a data-toggle="collapse" data-parent="#side-menu" href="#collapseOne"  aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-sitemap fa-fw"></i> GM相關管理<span class="fa arrow"></span></a>
                            <!-- <a href="{{ URL::to('/index') }}"><i class="fa fa-sitemap fa-fw"></i> GM相關管理<span class="fa arrow"></span></a> -->
                            <ul id="collapseOne" class="nav nav-second-level collapse">
                                <li>
                                    <a href="{{ URL::to('PlatformAccount') }}">帳號管理 </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('PlatformGroup') }}">群組管理</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('PlatformConnection') }}">連線管理</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                        	<a data-toggle="collapse" data-parent="#side-menu" href="#collapseTwo"  aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-sitemap fa-fw"></i> 系統相關管理<span class="fa arrow"></span></a>
                        	<ul id="collapseTwo" class="nav nav-second-level collapse">
                                <li>
                                    <a href="{{ URL::to('PlatformAccount') }}">伺服器狀態查詢 </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('PlatformGroup') }}">即時系統廣播</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('PlatformConnection') }}">系統郵件發送</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                        	<a data-toggle="collapse" data-parent="#side-menu" href="#collapseThree"  aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-sitemap fa-fw"></i> 伺服器管理<span class="fa arrow"></span></a>
                        	<ul id="collapseThree" class="nav nav-second-level collapse">
                                <li>
                                    <a href="{{ URL::to('DBSetting') }}">資料庫設定 </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('PlatformGroup') }}">伺服器設定</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('PlatformConnection') }}">硬體資訊查詢</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('PlatformConnection') }}">伺服器環境</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                        	<a href="{{ URL::to('TemplatePage') }}">Template<span class="fa arrow"></span></a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">


        <!-- Sidebar -->
        <div class="sidebar">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="pt-3 nav-item">
                    <a href="{{route('personal.main.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Main
                        </p>
                    </a>
                </li>
                <li class="pt-3 nav-item">
                    <a href="{{route('personal.liked.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-heart"></i>
                        <p>
                            Liked posts
                        </p>
                    </a>
                </li>
                <li class="pt-3 nav-item">
                    <a href="{{route('personal.comment.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Comments
                        </p>
                    </a>
                </li>
            </ul>

        </div>
        <!-- /.sidebar -->
    </aside>

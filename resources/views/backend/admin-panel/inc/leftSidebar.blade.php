<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="{{ route('adminEditProfile', \Illuminate\Support\Facades\Auth::user()) }}" class="text-center font-weight-bold simple-text logo-normal">
            Welcome Back, <br>
            {{ SubStr(\Illuminate\Support\Facades\Auth::user()->name, -5) }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="active">
                <a href="{{ route('dashboard') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('index') }}" target="_blank">
                    <i class="fas fa-home"></i>
                    <p>MovieTalk</p>
                </a>
            </li>

            <li>
                <a href="{{ route('managePost') }}">
                    <i class="fas fa-cogs"></i>
                    <p>Manage Post</p>
                </a>
            </li>

            <li>
                <a href="{{ route('manageUser') }}">
                    <i class="fas fa-users-cog"></i>
                    <p>Manage User</p>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-edit"></i>
                    <p>Site Management</p>
                </a>
            </li>

            <li>
                <a href="{{ route('addCategory') }}">
                    <i class="fas fa-blog"></i>
                    <p>Add Category</p>
                </a>
            </li>
            <li>
                <a href="{{ route('categoryList') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>All Categories</p>
                </a>
            </li>
            <li>
                <a href="{{ route('addPostAdmin') }}">
                    <i class="fas fa-blog"></i>
                    <p>Add Post</p>
                </a>
            </li>
            <li>
                <a href="{{ route('BlogListAdmin') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>All Blog</p>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-user" aria-hidden="true"></i></i> Authentication</a>
	<ul class="nav-dropdown-items">
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon fa fa-user"></i> <span>Users</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon fa fa-group"></i> <span>Roles</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon fa fa-key"></i> <span>Permissions</span></a></li>
	</ul>
</li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('maincategory') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i>
Main Category</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i>
Category</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('gallery') }}"><i class="fa fa-picture-o" aria-hidden="true"></i>
Gallery</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('gallerydetail') }}"><i class="fa fa-picture-o" aria-hidden="true"></i>
Gallery Detail</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('post') }}"><i class="fa fa-suitcase" aria-hidden="true"></i>
Post</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>
Logout</a></li>
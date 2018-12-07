<div class="sidebar-container">
	<div class="sidemenu-container navbar-collapse collapse fixed-menu">
	    <div id="remove-scroll">
	        <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
	            <li class="sidebar-toggler-wrapper hide">
	                <div class="sidebar-toggler">
	                    <span></span>
	                </div>
	            </li>
	            <li class="sidebar-user-panel">
	                <div class="user-panel">
	                    <div class="row">
                            <div class="sidebar-userpic">
                                <img src="{{ asset('img/avatars').'/'.Auth::user()->avatar }}" class="img-responsive" alt=""> </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name"> {{Auth::user()->username}} </div>
                            <div class="profile-usertitle-job"> {{Auth::user()->role->title}} </div>
                        </div>
                        <div class="sidebar-userpic-btn">
					        <a class="tooltips" href="{{route('user.profile')}}" data-placement="top" data-original-title="Profile">
					        	<i class="material-icons">person_outline</i>
					        </a>
					        <a class="tooltips" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-placement="top" data-original-title="{{ __('Logout') }} ">
					        	<i class="material-icons">input</i>
					        </a>
					        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
					    </div>
	                </div>
	            </li>
	            <li class="nav-item">
	                <a href="{{route('admin.user.account-list')}}" class="nav-link">
	                    <i class="material-icons f-left">account_box</i>
	                    <span class="title">{{__('btn.account-manage')}}</span>
	                </a>
	            </li>

	            <li class="nav-item">
	                <a href="{{route('admin.user.permission-manage')}}" class="nav-link nav-toggle">
	                    <i class="material-icons">shopping_cart</i>
	                    <span class="title">{{__('btn.permission-manage')}}</span>
	                    {{-- <span class="arrow"></span> --}}
	                </a>
	            </li>
	            <li class="menu-heading m-t-20"></li>
	        </ul>
	    </div>
	</div>
</div>



{{-- Tên người dùng: {{Auth::user()->username}}
Avatar: <img src="{{ asset('img/avatars').'/'.Auth::user()->avatar }}">
Role: {{Auth::user()->role->title}} --}}
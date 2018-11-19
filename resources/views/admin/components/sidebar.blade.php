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
                                <img src="{{ asset('assets/img/dp.jpg') }}" class="img-responsive" alt=""> </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name"> John Deo </div>
                            <div class="profile-usertitle-job"> Manager </div>
                        </div>
                        <div class="sidebar-userpic-btn">
					        <a class="tooltips" href="user_profile.html" data-placement="top" data-original-title="Profile">
					        	<i class="material-icons">person_outline</i>
					        </a>
					        <a class="tooltips" href="email_inbox.html" data-placement="top" data-original-title="Mail">
					        	<i class="material-icons">mail_outline</i>
					        </a>
					        <a class="tooltips" href="chat.html" data-placement="top" data-original-title="Chat">
					        	<i class="material-icons">chat</i>
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
	            <li class="menu-heading">
	            	<span>-- Menu --</span>
	            </li>
				<li class="nav-item start">
					<a href="{{ route('admin.home') }}" class="nav-link">
						<i class="material-icons">dashboard</i>
						<span class="title">Dashboard</span>
						<span class="selected"></span>
					</a>
				</li>
	            <li class="nav-item">
	                <a href="{{route('admin.user.account-list')}}" class="nav-link">
	                    <i class="material-icons f-left">account_box</i>
	                    <span class="title">{{__('btn.account-manage')}}</span>
	                    {{-- <span class="arrow"></span> --}}
	                </a>
	            </li>

	            <li class="nav-item">
	                <a href="{{route('admin.user.permission-manage')}}" class="nav-link nav-toggle">
	                    <i class="material-icons">shopping_cart</i>
	                    <span class="title">{{__('btn.permission-manage')}}</span>
	                </a>
	            </li>
	        </ul>
	    </div>
	</div>
</div>
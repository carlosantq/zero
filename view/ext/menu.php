<?php
use B7KP\Library\Url;
use B7KP\Library\Route;
use B7KP\Library\Lang;
use B7KP\Core\App;
use B7KP\Utils\UserSession;
use B7KP\Entity\User;

?>
<header id="fh5co-header-section" role="header" class="" >
	<div class="container">
		
		<!-- START #fh5co-logo -->
		<h1 id="fh5co-logo" class="pull-left"><a href="<?php echo Route::url('home')?>"><?php echo App::get('name');?></a></h1>
		
		<!-- START #fh5co-menu-wrap -->
		<nav id="fh5co-menu-wrap" role="navigation">
			<ul class="sf-menu" id="fh5co-primary-menu">
				<li <?php if(Route::isCurRoute('home')): echo 'class="active"';endif;?> >
					<a href="<?php echo Route::url('home')?>"><?php echo Lang::get('home');?></a>
				</li>
				<li <?php if(Route::isCurRoute('about')): echo 'class="active"';endif;?>>
					<a href="<?php echo Route::url('about')?>"><?php echo Lang::get('about');?></a>
				</li>
				<?php 
				$user = UserSession::getUser($this->factory);
				if($user instanceof User)
				{
				?>
				<li>
					<a href="#" class="fh5co-sub-ddown">Charts</a>
					 <ul class="fh5co-sub-menu">
					 	<li><a href="left-sidebar.html">Left Sidebar</a></li>
					 	<li><a href="right-sidebar.html">Right Sidebar</a></li>
						<li><a href="#">HTML5</a></li>
						<li>
							<a href="#" class="fh5co-sub-ddown">JavaScript</a>
							<ul class="fh5co-sub-menu">
								<li><a href="#">jQuery</a></li>
								<li><a href="#">Zipto</a></li>
								<li><a href="#">Node.js</a></li>
								<li><a href="#">AngularJS</a></li>
							</ul>
						</li>
						<li><a href="#">CSS3</a></li> 
					</ul>
				</li>
				<?php
				}
				?>
				<?php
				if($user instanceof User)
				{
				?>
				<li>
					<a href="#" class="fh5co-sub-ddown"><?php echo $user->login;?></a>
					<ul class="fh5co-sub-menu">
					 	<li><a href="<?php echo Route::url('userprofile');?>"><?php echo Lang::get('prof');?></a></li>
					 	<li><a href="<?php echo Route::url('settings');?>"><?php echo Lang::get('sett');?></a></li>
						<li><a href="<?php echo Route::url('logout');?>"><?php echo Lang::get('logout');?></a></li>
					</ul>
				</li>
				<?php
				}
				else
				{
				?>
				<li <?php if(Route::isCurRoute('login')): echo 'class="active"';endif;?>>
					<a href="<?php echo Route::url('login')?>">Login</a>
				</li>
				<?php
				}
				?>
			</ul>
		</nav>

	</div>
</header>
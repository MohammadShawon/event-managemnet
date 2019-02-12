<?php
    //$siteInfo = \App\Settings::all();
?>
<style>
.main-header .main-menu {
    margin-right: 150px;
}
@media  only screen and (max-width: 770px) { 
    .fixed-header {
    position: inherit;
}
}

	
</style>

<!--Main Header-->
    <header class="main-header sticky-header">
        <div class="container clearfix">
            <div class="header-area">
                <div class="logo" style="padding: 5px 0px 5px;">
                    <figure>
                        <!-- <a href="index-2.html"><img src="<?php echo asset('public/frontend/images/logo.png'); ?>" alt=""></a> -->
                        <a href="<?php echo e(URL::to('/')); ?>"><img src="<?php echo e(URL::to('/')); ?>/<?php echo e($siteInfo[0]->logo); ?>" alt="" style="width: 145px;"></a>
                    </figure>
                </div>
                <nav class="main-menu">
                    <div class="navbar-header clearfix">
                        <!-- Toggle Button -->      
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>                    
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <?php if(!empty($globalparameterArr['menuArr'])): ?>
                                <?php $__currentLoopData = $globalparameterArr['menuArr']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hdmno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?php if(count($hdmno->submenu)>0): ?>dropdown <?php endif; ?> <?php if($hdmno->url=='hc' && Request::segment(1)==''): ?><?php echo e('current'); ?><?php endif; ?> <?php if(Request::segment(1)==$hdmno->url): ?><?php echo e('current'); ?><?php endif; ?>"><a href="<?php if($hdmno->order_id==1): ?><?php echo e(URL::to('/')); ?><?php else: ?><?php echo e(URL::to($hdmno->url)); ?><?php endif; ?>"><?php echo e($hdmno->name); ?></a>
                                        <?php if(count($hdmno->submenu)>0 && $hdmno->id!=8): ?>
                                            <ul>
                                                <?php $__currentLoopData = $hdmno->submenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($subMenuItem->status_id==1): ?>
                                                    <li><a href="<?php echo e(URL::to($subMenuItem->url)); ?>"><?php echo e($subMenuItem->name); ?></a></li>
                                                    <?php endif; ?>
                                                    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <!--for big pdf  -->
                                        <?php if($hdmno->id==5): ?>
                                            <li><a href="<?php echo e(asset('public/uploads/executive-committe/proceedings-of-the-technical-seminar.pdf')); ?>" target="_blank"><?php echo e('Technical Proceedings'); ?></a></li>
                                        <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                        
                                        
                                        
                                        <!-- for gallery -->
                                        <?php if($hdmno->id==8): ?>
                                        <?php
                                            $allEvents = \App\EventManagement::select('title','id')->whereNotNull('id')->orderBy('title', 'desc')->get();
                                            //echo "<pre>"; print_r($allEvents);
                                        ?>
                                            <?php if(count($allEvents)>0): ?>
                                            <ul>
                                                <?php $__currentLoopData = $allEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a href="<?php echo e(URL::to('gallery/front-gallery/'.$ale->id)); ?>"><?php echo e($ale->title); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </li>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <!-- logingMenu -->
                            
<?php $profile_pic = ''; ?>
                                <li class="dropdown">
                                    
                                      <a class="bdropdown-toggle desktop_login" data-toggle="dropdown" style="">
                                      <?php if(empty(Auth::guard('frontuser')->user())): ?>
                                        Login
                                      <?php else: ?>
                                        <!--<?php echo e(Auth::guard('frontuser')->user()->first_name); ?>-->
                                        <?php 
  $profile_pic = \App\FrontUserProfilePicCng::where("user_id",'=',Auth::guard('frontuser')->user()->id)->value('picture_name');
  
  if(empty($profile_pic)){
    $profile_pic = 'profile-pic.png';
  }
?>
                                        <img src="<?php echo asset('public/uploads/front-user-profile-pic/'.$profile_pic); ?>" style="max-width: 45px; max-height: 45px; border-radius: 50%; ">
                                      <?php endif; ?>
                                      </a>
                                      <ul style="background: #ffffff; padding: 10px; margin-top: -20px; border: solid 1px #eee;
    box-shadow: 0px 0px 2px #999;">
                                        
                                      <?php if(empty(Auth::guard('frontuser')->user())): ?>
                                        <li>
                                              <div class="row">
                                                <div class="col-md-12">
                                                    <form class="form" role="form" method="post" action="<?php echo e(URL::to('front/login')); ?>"  id="login-nav">
                                                        <div class="form-group">
                                                           <label class="sr-only" for="emailInput">Email address</label>
                                                           <input type="text" class="form-control" id="emailInput" name="email" placeholder="User ID" value="<?php echo e(old('email')); ?>" required style="border-radius:0px;">
                                                        </div>
                                                        <div class="form-group">
                                                           <label class="sr-only" for="passwordInput">Password</label>
                                                           <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required style="border-radius:0px;">
                                                        </div>
                                                        <!-- <div class="checkbox">
                                                           <label>
                                                           <input type="checkbox"> Remember me
                                                           </label>
                                                        </div> -->
                                                        <div class="form-group">
                                                           <button type="submit" class="btn btn-success btn-block" style="border-radius: 0px;">Sign in</button>
                                                        </div>
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                     </form>
                                                  </div>
                                               </div>

                                            </li>
                                            <li class="text-center" style="color: red;"><?php if(Session::has('error')): ?> <?php echo e(Session::get('error')); ?> <?php endif; ?></li>
                                            <li><a href="<?php echo e(URL::to('front/forget-password')); ?>" class="" style="width: 100%; text-align: center;">Forgot <u>password?</u></a>
                                            </li>
                                          <?php endif; ?>

                                          <?php if(!empty(Auth::guard('frontuser')->user())): ?>
                                          <li>
                                            <li class="text-center"><a href="<?php echo e(URL::to('front/front-user-dashboard')); ?>" style="padding-right: 0px; color: #e6296a;" onmouseover="this.style.backgroundColor = 'white'";>My Profile</a></li>
                                            
                                            <li class="text-center"><a href="<?php echo e(URL::to('front/front-user-edit-profile')); ?>" style="padding-right: 0px; color: #e6296a;" onmouseover="this.style.backgroundColor = 'white'";>Edit Profile</a></li>

                                            <li class="text-center">
                                                <a href="<?php echo e(route('logout')); ?>"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();" style="padding-right: 0px; color: #e6296a;" onmouseover="this.style.backgroundColor = '#fff'";>
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="<?php echo e(URL::to('front/logout')); ?>" method="post" style="display: none;">
                                                    <?php echo e(csrf_field()); ?>

                                                </form>
                                              </li>
                                            </li>
                                          <?php endif; ?>
                                  
                                        
                                      </ul>
                                    
                                </li>
                            
                        

                        </ul>
                    </div>                    
                </nav>
             <?php if(empty(Auth::guard('frontuser')->user())): ?>
                <div class="link-btn">
                    <a href="<?php echo e(URL::to('front/user-registration')); ?>" class="btn-style-one" title="Click Here">Pre Registration</a>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </header>
    <!--End Main Header -->
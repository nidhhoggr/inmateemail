<!DOCTYPE html>
<html lang="en">	
    <head>		
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       
        <title><?=Config::getVal('site_title')?></title>
        <!--[if IE 6]>
            <link rel="stylesheet" href="/css/bobo/ie6.css" />
        <![endif]--> 
        <!--[if IE 7]>
            <link rel="stylesheet" href="/css/bobo/ie7.css" />
        <![endif]-->
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <?php use_stylesheet('bobo/style.css') ?>
        <?php include_stylesheets() ?>
        <? if(myUser::getLoggedIn()->getUserType()):?>
        <?php include_javascripts() ?>
        <? endif;?>

    <script>
        var officers_url = '<?=sfConfig::get('sf_app_root_path') . sfConfig::get('sf_app_root_script')?>';
    </script>
    </head>
    <body>	
        <? if(myUser::getLoggedIn()->getUserType()):?>
        <div id="dialog" title="Your session is about to expire!">
            <p>
                <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 50px 0;"></span>
                You will be logged off in <span id="dialog-countdown" style="font-weight:bold"></span> seconds.
            </p>
            <p>Do you want to continue your session?</p>
        </div>
        <? endif;?>

        <div id="wrap">
            <div id="header">
                <a href="#" title="[ADD LINK TITLE]">
                    <!--img src="/images/logo.png" /-->
                </a>       	
                <h2><?=Config::getVal('site_title')?></h2>           	
                <div id="nav">
                    <ul id="nav-pages">
                        <? if($sf_user->isAuthenticated()): ?>
                          <li><a href="#" id="link-incoming">Incoming</a></li>
                          <li><a href="#" id="link-outgoing">Outgoing</a></li>
                          <li><a href="<?=url_for('sfGuardAuth/signout')?>" id="logout">Logout</a></li>
                        <? endif; ?>
                    </ul><!--end nav-pages-->
                </div><!--end nav-->
            </div><!--end header-->
            <div id="frontpage-content">      
    			
    			<div id="frontpage-intro">   	

                            <div id="account_banner">
                                <? if($sf_user->isAuthenticated()): ?>
                                <div id="account_holder">
                                    <?=myUser::getLoggedIn()?>
                                </div>
                                <div id="count_unscanned">
                                    Unscanned Emails:<span><?=Email::countUnscanned()?></span>
                                </div>
                                <? endif; ?>
                            </div>
                            <hr />
                            <div id="officer-content">
                              <?php echo $sf_content ?>
                            </div>

<!--
    					<a href="[ADD LINK TO PROJECT PAGE]" title="[ADD LINK TITLE]"><img class="featured-project-image" src="images/[ADD IMAGE FILE NAME]" alt="[ADD ALTERNATIVE TEXT]" /></a>
    					<a href="[ADD LINK TO PROJECT PAGE]" title="[ADD LINK TITLE]"><img class="featured-project-image" src="images/[ADD IMAGE FILE NAME]" alt="[ADD ALTERNATIVE TEXT]" /></a>
-->    				
    				 	
    			</div><!--end featured-projects--> 
    			    			
    		</div><!--end frontpage-content--> 
    		
    		<div id="footer">
				
				<p class="copyright">Copyright &copy; 2013 &middot; EmailForInmates &middot; All Rights Reserved</p>
				   
                </div><!--end footer-->
            
    	</div><!--end wrap-->	
    	
	</body>	
	
</html>

<!DOCTYPE html>
<html lang="en">	
    <head>		
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       
        <title>InmateEmail</title>
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
        <?php include_javascripts() ?>
        <script type="text/javascript">
        var inmates_url = '<?=sfConfig::get('sf_js_inmates_url')?>';
        </script>
    </head>
    <body>	
        <div id="wrap">
            <div id="header">
                <a href="#" title="[ADD LINK TITLE]">
                    <!--img src="/images/logo.png" /-->
                </a>       	
                <h2>Inmate Email</h2>           	
                <div id="nav">
                    <ul id="nav-pages">
                        <? if($sf_user->isAuthenticated()): ?>
                          <li><a href="#" id="back-inbox">Inbox</a></li>
                          <li><a href="#" id="back-outbox">Outbox</a></li>
                          <li><a href="#" id="back-contacts">Contacts</a></li>
                          <li><a href="sfGuardAuth/signout" id="logout">Logout</a></li>
                        <? endif; ?>
                    </ul><!--end nav-pages-->
                </div><!--end nav-->
            </div><!--end header-->
            <div id="frontpage-content">      
    			
    			<div id="frontpage-intro">   	
                            <div id="account_banner">
                                <? if($sf_user->isAuthenticated()): ?>
                                <div id="account_holder">
                                    <?=InmateTable::loggedIn()?>
                                </div>
                                <div id="account_balance">
                                    Balance: <span>$<?=InmateTable::getCurrentBalance()?></span>
                                </div>
                                <div id="pending_charges">
                                    Pending Charges: <span>$<?=Email::calculatePendingCharges()?></span>
                                </div>
                                <? endif; ?>
                            </div>    
                            <hr />             
                            <div id="inmate-content">
                              <?php echo $sf_content ?>
                            </div>
<!--
    					<a href="[ADD LINK TO PROJECT PAGE]" title="[ADD LINK TITLE]"><img class="featured-project-image" src="images/[ADD IMAGE FILE NAME]" alt="[ADD ALTERNATIVE TEXT]" /></a>
    					<a href="[ADD LINK TO PROJECT PAGE]" title="[ADD LINK TITLE]"><img class="featured-project-image" src="images/[ADD IMAGE FILE NAME]" alt="[ADD ALTERNATIVE TEXT]" /></a>
-->    				
    				 	
    			</div><!--end featured-projects--> 
    			    			
    		</div><!--end frontpage-content--> 
    		
    		<div id="footer">
				
				<p class="copyright">Copyright &copy; 2013 &middot; InmateEmail &middot; All Rights Reserved</p>
				   
                </div><!--end footer-->
            
    	</div><!--end wrap-->	
    	
	</body>	
	
</html>

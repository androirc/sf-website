<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
    <head>
        <title>AndroIRC - Android IRC Client</title>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="up">
            <div id="header">
                <div id="logo">
                    <img src="/images/logo.png" alt="AndroIRC" />
                    <span><em>Android IRC Client</em></span>
                </div>
            </div>
            <div id="menu"> 
            <?php if($sf_user->isAuthenticated()): ?>
                <ul> 
                    <li><a href="<?php echo url_for('article/index') ?>">Articles</a></li> 
                    <li><?php echo link_to('Users', 'sf_guard_user') ?></li> 
                    <li><a href="/">Back to the website</a>
                    <li><?php echo link_to('Logout', 'sf_guard_signout') ?></li> 
                </ul> 
            <?php endif; ?>
            </div> 
        </div>
        
        <div id="page">
                <?php echo $sf_content ?>
        </div>
    </body>
</html>
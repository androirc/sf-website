<!DOCTYPE html> 
<html> 
    <head> 
        <title><?php include_slot('title') ?> - AndroIRC (Android IRC Client)</title> 
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <meta name="google-site-verification" content="NxLzVTaSpM7YMWZ_DqGdF19nVKrNl4IcQxcT3jtACqw" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.css" />
        <link rel="stylesheet" href="/css/mobile.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.js"></script>
    </head> 
    <body> 
        <div data-role="page"> 
            <div data-role="header" data-theme="b" data-position="fixed">
                <h1><?php include_slot('title', 'Home') ?> - AndroIRC (Android IRC Client)</h1>
            </div> 
            <div data-role="content">
                <a href="<?php echo url_for('@format') ?>" data-role="button" data-icon="grid" rel="external">Switch to the normal version</a>
                <div id="logo">
                    <?php echo image_tag('logo.png') ?>
                </div>
                <?php echo $sf_content ?>   
            </div> 
            <div data-role="footer" data-theme="b" data-position="fixed">
                <div data-role="navbar">
                    <ul>
                        <li><a href="#">EULA</a></li>
                        <li><a href="http://market.android.com/details?id=com.androirc">Download</a></li>
                        <li><a href="#">Wiki</a></li>
                    </ul>
                </div>
            </div> 
        </div>
    </body>
</html>
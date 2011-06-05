<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
    <head>
        <title><?php include_slot('title', 'Home') ?> - AndroIRC (Android IRC Client)</title>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;"/> 
        
        <link rel="shortcut icon" href="/favicon.ico" />
        <link href="<?php echo url_for('@article_atom', true) ?>" type="application/atom+xml" rel="alternate" title="Last articles" />
        
        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/css/common.css" /> 
        <link rel="stylesheet" type="text/css" media="screen" href="/css/mobile.css" /> 
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    </head>
    <body>
        <div id="up">
            <div id="header">
                <div id="logo">
                    <a href="<?php echo url_for('@homepage') ?>">
                        <?php echo image_tag('logo.png') ?>
                    </a>
                    <span>Android IRC Client</span>
                </div>
            </div>
        </div>
        <div id="menu">
            <ul>
                <li><a href="http://market.android.com/details?id=com.androirc">Download</a></li>
                <li><?php echo link_to('EULA', '@eula') ?></li>
                <li class="last"><?php echo link_to('Beta', '@beta') ?></li>
            </ul>
        </div>
        <div id="content">
            <div id="switch">
                <a href="<?php echo str_replace('m.', 'www.', $sf_request->getUri()) ?>" class="button blue">Switch to the web version</a>
            </div>
            
            <?php echo $sf_content ?>
        </div>
        <div class="clear"></div>
        
        <div id="footer">
            Copyright &copy; AndroIRC.com. All rights reserved. Powered by <?php echo image_tag('symfony.gif', array('class' => 'famfamfam')) ?>
        </div>
        <script type="text/javascript">
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
        </script>
        <script type="text/javascript">
            try {
                var pageTracker = _gat._getTracker("UA-133630-2");
                pageTracker._trackPageview();
            } catch(err) {}
        </script>
    </body>
</html>
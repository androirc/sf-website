<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
    <head>
        <title><?php include_slot('title', 'Home') ?> - AndroIRC (Android IRC Client)</title>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;"/>

        <link rel="shortcut icon" href="/favicon.ico" />
        <link href="http://feeds.feedburner.com/AndroIRC" type="application/atom+xml" rel="alternate" title="Last articles" />

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
            <div id="ads">
            </div>

            <?php echo $sf_content ?>
        </div>
        <div class="clear"></div>

        <div id="footer">
            Copyright &copy; AndroIRC.com. All rights reserved. Powered by <?php echo image_tag('symfony.gif', array('class' => 'famfamfam')) ?>
        </div>
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-133630-5']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <script type="text/javascript">
            var admob_vars = {
                bgcolor: 'FFFFFF',
                text: '026995',
                pubid: '<?php echo sfConfig::get('app_admob_publisher_id') ?>',
                test: <?php echo sfConfig::get('app_admob_test_mode', true) ? 'true' : 'false' ?>,
                manual_mode: true
            };
        </script>
        <script type="text/javascript" src="http://mm.admob.com/static/iphone/iadmob.js"></script>
        <script type="text/javascript">
            _admob.fetchAd(document.getElementById('ads'));
        </script>
    </body>
</html>
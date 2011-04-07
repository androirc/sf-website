<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
    <head>
        <title><?php include_slot('title') ?> - AndroIRC (Android IRC Client)</title>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="up">
                <div id="header">
                    <div id="twitter">
                        <a href="http://twitter.com/androirc"><img src="/images/twitter.png" alt="Follow me on Twitter!" /></a>
                </div>
                <div id="informations">
                    <div id="last_tweet"><div style="text-align: center; margin-top: 20px;"><img src="/images/ajax-loader.gif"></div></div></p>
                </div>
                <div id="logo">
                    <img src="/images/logo.png" alt="AndroIRC" />
                    <span><em>Android IRC Client</em></span>
                </div>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="<?php echo url_for('@homepage') ?>">News</a></li>
                    <li><a href="http://wiki.androirc.com/">Wiki</a></li>
                    <li><a href="<?php echo url_for('@screenshots') ?>">Screenshots</a></li>
                    <li><a href="<?php echo url_for('@contact') ?>">Contact</a></li>
                    <li><a href="http://market.android.com/details?id=com.androirc">Download AndroIRC</a></li>
                    <li><a href="<?php echo url_for('@eula') ?>">EULA</a></li>
                    <li class="last"><a href="<?php echo url_for('@donate') ?>">Donate</a></li>
                </ul>
            </div>
        </div>
        
        <div id="page">
            <div id="content">
                <?php echo $sf_content ?>
            </div>
             <div id="sidebar"> 
                <ul> 
                    <li> 
                        <h2>Android Market</h2> 
                        <p>You can download AndroIRC directly from the Android Market or scan the following barcode.</p> 
                        <div style="text-align:center;"> 
                            <img src="http://chart.apis.google.com/chart?cht=qr&chs=170x170&chl=market://search?q=pname:com.androirc" alt="AndroIRC" /> 
                        </div> 
                        <div style="text-align:center;">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post"> 
        <input type="hidden" name="cmd" value="_s-xclick"> 
        <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----"> 
        <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"> 
        <img alt="" border="0" src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1"> 
    </form> 
    </div>
                    </li>
                    <li>
                        <h2>AndroIRC Team</h2>
                        <ul>
                            <li>MewT <em>(WebMaster)</em><p><a href="http://twitter.com/aerialls">@aerialls</a></p></li>
                            <li>S&eacute;bastien <em>(Lead Developper)</em><p><a href="http://twitter.com/blinkseb">@blinkseb</a></p></li>
                            <li>Maxx <em>(Graphic Designer)</em><p><a href="http://twitter.com/maxxmx">@MaxxMx</a></p></li>
                        </ul>
                    </li>
                    <li>
                        <div style="margin-top: -10px; text-align: center;">
                            <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/pages/AndroIRC/120342511371853" width="220" show_faces="true" stream="false" header="true"></fb:like-box>
                        </div>
                    </li>
                </ul>
            </div>  
        </div>
        
        <div style="clear:both;"></div>
        <div id="footer">
            <p>Copyright &copy; 2010 - 2011 AndroIRC.com. All rights reserved. Follow us on Twitter <a href="http://twitter.com/androirc">@androirc</a>. Powered by <img style="position: relative; top:3px; left: 2px;" src="/images/symfony.gif"></p>
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
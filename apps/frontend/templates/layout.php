<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
    <head>
        <title><?php include_slot('title') ?> - AndroIRC (Android IRC Client)</title>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css" />
        <?php include_stylesheets() ?>
        <link href="<?php echo url_for('@article_atom', true) ?>" type="application/atom+xml" rel="alternate" title="Last articles" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=mewt"></script>
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="up">
            <div id="header">
                <div id="twitter">
                    <a href="http://twitter.com/androirc">
                        <?php echo image_tag('twitter.png') ?>
                    </a>
                </div>
                <div id="informations">
                    <div id="last_tweet">
                        <div id="loader">
                            <?php echo image_tag('ajax-loader.gif') ?>
                        </div>
                    </div>
                </div>

                <div id="logo">
                    <?php echo image_tag('logo.png') ?>
                    <span><em>Android IRC Client</em></span>
                </div>
            </div>
            <div id="menu">
                <ul>
                    <li><?php echo link_to('News', '@homepage') ?></li>
                    <li><a href="http://wiki.androirc.com/">Wiki</a></li>
                    <li><?php echo link_to('Screenshots', '@screenshots') ?></li>
                    <li><?php echo link_to('Contact', '@contact') ?></li>
                    <li><a href="http://market.android.com/details?id=com.androirc">Download AndroIRC</a></li>
                    <li><?php echo link_to('EULA', '@eula') ?></li>
                    <li class="last"><?php echo link_to('Donate', '@donate') ?></li>
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
                        <div class="center"> 
                            <img src="http://chart.apis.google.com/chart?cht=qr&chs=170x170&chl=market://search?q=pname:com.androirc" alt="AndroIRC" /> 
                        </div> 
                        <div class="center">
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post"> 
                                <input type="hidden" name="cmd" value="_s-xclick" /> 
                                <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----" /> 
                                <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" /> 
                                <img alt="" border="0" src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1" /> 
                            </form> 
                        </div>
                    </li>
                    <li>
                        <h2>AndroIRC Team</h2>
                        <ul>
                            <li>
                                MewT <em>(WebMaster)</em>
                                <div class="author">
                                    <a href="http://twitter.com/aerialls">@aerialls</a>
                                </div>
                            </li>
                            <li>
                                S&eacute;bastien <em>(Lead Programmer)</em>
                                <div class="author">
                                    <a href="http://twitter.com/blinkseb">@blinkseb</a>
                                </div>
                            </li>
                            <li>
                                Maxx <em>(Graphic Designer)</em>
                                <div class="author">
                                    <a href="http://twitter.com/maxxmx">@MaxxMx</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div id="facebook">
                            <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/pages/AndroIRC/120342511371853" width="220" show_faces="true" stream="false" header="true"></fb:like-box>
                        </div>
                    </li>
                </ul>
            </div>  
        </div>

        <div class="clear"></div>
        <div id="footer">
            <div>
                <div class="cell">
                    <h2>Community</h2>
                    <p>You can join us on IRC. We're on <a href="irc://irc.epiknet.org">EpiKnet</a>, channel #AndroIRC</p>
                    <ul>
                        <li><?php echo image_tag('facebook_small.png', array('class' => 'famfamfam')) ?> <a href="http://facebook.com/androirc">Facebook page</a></li>
                        <li><?php echo image_tag('twitter_small.png', array('class' => 'famfamfam')) ?> <a href="http://twitter.com/androirc">Follow us on twitter</a></li>
                    </ul>
                        
                </div>
                <div class="cell">
                    <h2>Other pages</h2>
                    <ul>
                        <li><?php echo image_tag('marker.png', array('class' => 'famfamfam')) ?> <a href="<?php echo url_for('@beta') ?>">Participate to the lastest beta</a></li>
                        <li><?php echo image_tag('bug.png', array('class' => 'famfamfam')) ?> <a href="http://bugs.androirc.com/">Bug tracker website</a></li>
                        <li><?php echo image_tag('feed.png', array('class' => 'famfamfam')) ?> <a href="<?php echo url_for('@article_atom', true) ?>">RSS Feed</a></li>
                        <li><?php echo image_tag('coins.png', array('class' => 'famfamfam')) ?> <a href="<?php echo url_for('@donate') ?>">Make a donation</a></li>
                        <li><?php echo image_tag('mail-open.png', array('class' => 'famfamfam')) ?> <a href="<?php echo url_for('@contact') ?>">Contact us</a></li>
                    </ul>
                </div>
                <div class="cell">
                    <h2>Copyright</h2>
                    <p>
                        Copyright &copy; AndroIRC.com. All rights reserved. Powered by <?php echo image_tag('symfony.gif', array('class' => 'famfamfam')) ?>
                    </p>
                </div>
            </div>
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
        <script type="text/javascript">
            var addthis_config = {
                data_track_clickback : true,
                data_ga_tracker: pageTracker,
                ui_click: true,
                ui_cobrand: 'AndroIRC'
                
            }
            var addthis_share = {
                templates: {
                    twitter: '{{title}} - {{url}} (from @androirc)'
                }
            }
        </script>
    </body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
    <head>
        <title><?php include_slot('title') ?> - AndroIRC (Android IRC Client)</title>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <meta name="google-site-verification" content="NxLzVTaSpM7YMWZ_DqGdF19nVKrNl4IcQxcT3jtACqw" />

        <link rel="shortcut icon" href="/favicon.ico" />
        <link href="http://feeds.feedburner.com/AndroIRC" type="application/atom+xml" rel="alternate" title="Last articles" />

        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css" />
        <?php include_stylesheets() ?>

        <script async="async" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <script async="async" type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=mewt"></script>
        <?php include_javascripts() ?>

        <script async="async" type="text/javascript">
            (function ($) {
                $.fn.vAlign = function() {
                    return this.each(function(i){
                        var h = $(this).height();
                        var oh = $(this).outerHeight();
                        var mt = (h + (oh - h)) / 2;
                        $(this).css("margin-top", "-" + mt + "px");
                        $(this).css("top", "50%");
                        $(this).css("position", "absolute");
                    });
                };
            })(jQuery);
        </script>
    </head>
    <body>
        <div id="up">
            <div id="header">
                <div id="twitter_logo">
                    <a href="http://twitter.com/androirc">
                        <?php echo image_tag('twitter.png') ?>
                    </a>
                </div>
                <div id="twitter">
                    <div id="tweet">
                        <div id="tweet_text">
                            <div id="loader">
                                <?php echo image_tag('ajax-loader.gif') ?>
                            </div>
                        </div>
                        <div id="tweet_follow">
                            <a href="http://twitter.com/androirc" class="twitter-follow-button">Follow @androirc</a> <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
                        </div>
                    </div>
                </div>

                <div id="logo">
                    <a href="<?php echo url_for('@homepage', true) ?>">
                        <?php echo image_tag('logo.png') ?>
                    </a>
                    <span><em>Android IRC Client</em></span>
                </div>
            </div>
        </div>

        <div id="menu">
            <ul>
                <li><?php echo link_to('News', '@homepage') ?></li>
                <li><a href="http://wiki.androirc.com/">Wiki</a></li>
                <li><?php echo link_to('Screenshots', '@screenshots') ?></li>
                <li><?php echo link_to('Contact', '@contact') ?></li>
                <li><a href="http://market.android.com/details?id=com.androirc">Download</a></li>
                <li><?php echo link_to('EULA', '@eula') ?></li>
                <li class="last"><?php echo link_to('Donate', '@donate') ?></li>
            </ul>
        </div>

        <div id="space">
        </div>

        <div id="page">
            <div id="content">
                <?php if ('mobile' === $sf_user->getFrom()): ?>
                    <div id="switch_format">
                        <a class="button blue" href="<?php echo str_replace('www.', 'm.', $sf_request->getUri()) ?>">Come back to the mobile version</a>
                    </div>
                <?php endif ?>
                <?php echo $sf_content ?>
            </div>
            <div id="sidebar">
                <ul>
                    <li>
                        <h2>Android Market</h2>
                        <p>You can download AndroIRC directly from the Android Market or scan the following barcodes :</p>
                        <div class="app">
                            <div class="title">
                                AndroIRC
                            </div>
                            <img src="http://chart.apis.google.com/chart?cht=qr&chs=170x170&chl=market://search?q=pname:com.androirc" alt="AndroIRC" />
                        </div>
                        <div class="app">
                            <div class="title">
                                AndroIRC premium
                            </div>
                            <img src="http://chart.apis.google.com/chart?cht=qr&chs=170x170&chl=market://search?q=pname:com.androirc.premium" alt="AndroIRC" />
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
                                Julien Brochet <em>(WebMaster)</em>
                                <div class="author">
                                    <a href="http://twitter.com/aerialls">@aerialls</a>
                                </div>
                            </li>
                            <li>
                                Sébastien Brochet <em>(Programmer)</em>
                                <div class="author">
                                    <a href="http://twitter.com/blinkseb">@blinkseb</a>
                                </div>
                            </li>
                            <li>
                                Maxx Maury <em>(Graphic Designer)</em>
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
                <div class="column">
                    <h2>Community</h2>
                    <p>You can join us on IRC. We're on <a href="irc://irc.epiknet.org">EpiKnet</a>, channel #AndroIRC</p>
                    <ul>
                        <li><?php echo image_tag('facebook_small.png', array('class' => 'famfamfam')) ?> <a href="http://facebook.com/androirc">Facebook page</a></li>
                        <li><?php echo image_tag('twitter_small.png', array('class' => 'famfamfam')) ?> <a href="http://twitter.com/androirc">Follow us on twitter</a></li>
                    </ul>

                </div>
                <div class="column">
                    <h2>Other pages</h2>
                    <ul>
                        <li><?php echo image_tag('marker.png', array('class' => 'famfamfam')) ?> <a href="<?php echo url_for('@beta') ?>">Get involved! Download the latest beta</a></li>
                        <li><?php echo image_tag('bug.png', array('class' => 'famfamfam')) ?> <a href="http://bugs.androirc.com/">Bug tracker website</a></li>
                        <li><?php echo image_tag('feed.png', array('class' => 'famfamfam')) ?> <a href="http://feeds.feedburner.com/AndroIRC">RSS Feed</a></li>
                        <li><?php echo image_tag('coins.png', array('class' => 'famfamfam')) ?> <a href="https://market.android.com/details?id=com.androirc.premium">Download AndroIRC premium</a></li>
                        <li><?php echo image_tag('book_open.png', array('class' => 'famfamfam')) ?> <a href="http://translation.androirc.com/">Help us translating AndroIRC</a></li>
                        <li><?php echo image_tag('mail-open.png', array('class' => 'famfamfam')) ?> <a href="<?php echo url_for('@contact') ?>">Contact us</a></li>
                    </ul>
                </div>
                <div class="column">
                    <h2>Copyright</h2>
                    <p>
                        Copyright &copy; AndroIRC.com. All rights reserved. Powered by <?php echo image_tag('symfony.gif', array('class' => 'famfamfam')) ?>
                    </p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-133630-2']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
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

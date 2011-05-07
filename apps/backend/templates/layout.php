<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
    <head>
        <title>Backoffice - AndroIRC (Android IRC Client)</title>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <meta name="google-site-verification" content="NxLzVTaSpM7YMWZ_DqGdF19nVKrNl4IcQxcT3jtACqw" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css" />
        <?php include_stylesheets() ?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="up">
            <div id="header">
                <div id="logo">
                    <?php echo image_tag('logo.png') ?>
                    <span><em>Android IRC Client</em></span>
                </div>
            </div>
            <div id="menu">
                <?php if($sf_user->isAuthenticated()): ?>
                <ul>
                    <li><?php echo link_to('Article', 'article/index') ?></li>
                    <li><?php echo link_to('User', 'sf_guard_user') ?></li>
                    <li><?php echo link_to('Beta', 'beta/index') ?></li>
                    <li><?php echo link_to('Tip', 'tip/index') ?></li>
                    <li><?php echo link_to('Crash', 'crashreport/index') ?></li>
                    <li><?php echo link_to('QuickStart', 'quickstart/index') ?></li>
                    <li><?php echo link_to('ChangeLog', 'changelog/index') ?></li>
                    <li class="last"><?php echo link_to('Logout', 'sf_guard_signout') ?></li>
                </ul>
                <?php endif ?>
            </div>
        </div>

        <div id="page">
            <?php echo $sf_content ?>
        </div>
    </body>
</html>
<!DOCTYPE html> 
<html> 
    <head> 
        <title>AndroIRC (Android IRC Client)</title> 
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.js"></script>
    </head> 
    <body> 
        <div data-role="page" data-position="fixed"> 
            <div data-role="header" data-theme="b" >
                <h1>AndroIRC</h1>
            </div> 
            <div data-role="content">
                <?php echo $sf_content ?>   
            </div> 
            <div data-role="footer" data-theme="b" >
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
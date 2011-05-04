<?php slot('title', 'Home') ?>

<div id="ads"> 
    <script type="text/javascript"><!--
        google_ad_client = "pub-1704888906932150";
        /* AndroIRC */
        google_ad_slot = "8016140658";
        google_ad_width = 468;
        google_ad_height = 60;
        //-->
    </script> 
    <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js"> 
    </script> 
</div> 
<div class="center">
    <a href="<?php echo url_for('@donate') ?>"><?php echo image_tag('donate.png') ?></a>
</div>
        
<p>AndroIRC is an <strong>Android IRC client</strong> which can connect to several server (secured or not) at the same time. Features: supports <a href="http://www.mirc.com">mIRC</a> colors, auto join channels on startup, nickserv/sasl auth, logging, themes... You can see screenshots <a href="<?php echo url_for('@screenshots') ?>">here</a>! Feel free to contact us via the <a href="<?php echo url_for('@contact') ?>">online form</a>.
</p>

<?php foreach ($articles as $a): ?>
    <?php include_partial('article/article', array('a' => $a, 'showComments' => true)) ?>
<?php endforeach; ?> 

<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'androirc'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>
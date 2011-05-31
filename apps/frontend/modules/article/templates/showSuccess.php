<?php slot('title', $article->getTitle()) ?>
<?php use_helper('Text') ?>

<?php include_partial('article/article', array('article' => $article, 'sumup' => false)) ?>

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

<div id="disqus_thread"></div>

<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'androirc'; // required: replace example with your forum shortname

    // The following are highly recommended additional parameters. Remove the slashes in front to use.
    var disqus_identifier = <?php echo $article->getId() ?>;
    var disqus_url = '<?php echo url_for('article_show', $article, true) ?>';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
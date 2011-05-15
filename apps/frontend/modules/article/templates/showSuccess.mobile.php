<h2><?php echo $a->getTitle() ?></h2>
<span><?php echo $a->getDateTimeObject('created_at')->format('m/d/Y') ?>  | News posted by <?php echo $a->getSfGuardUser() ?></span>

<p><?php echo $a->getContent() ?></p>

<div id="disqus_thread"></div>

<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'androirc'; // required: replace example with your forum shortname

    // The following are highly recommended additional parameters. Remove the slashes in front to use.
    var disqus_identifier = <?php echo $a->getId() ?>;
    var disqus_url = '<?php echo url_for('article_show', $a, true) ?>';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
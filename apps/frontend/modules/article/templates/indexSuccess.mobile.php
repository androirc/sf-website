<?php use_helper('Text') ?>
<p>AndroIRC is an Android IRC client which can connect to several server (secured or not) at the same time. Features: supports mIRC colors, auto join channels on startup, nickserv/sasl auth, logging, themes... You can see screenshots here! Feel free to contact us via the online form.</p>

<?php foreach ($articles as $article): ?>
    <?php include_partial('article/article', array('article' => $article, 'sumup' => true)) ?>
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
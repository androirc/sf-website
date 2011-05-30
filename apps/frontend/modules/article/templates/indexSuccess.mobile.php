<?php use_helper('Text') ?>
<p>AndroIRC is an Android IRC client which can connect to several server (secured or not) at the same time. Features: supports mIRC colors, auto join channels on startup, nickserv/sasl auth, logging, themes... You can see screenshots here! Feel free to contact us via the online form.</p>

<?php foreach ($articles as $article): ?>
    <?php include_partial('article/article', array('article' => $article, 'showComments' => true)) ?>
<?php endforeach; ?> 

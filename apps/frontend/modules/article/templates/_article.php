<?php use_helper('Text') ?>
<div class="post">
    <div class="header">
        <h1><a href="<?php echo url_for('article_show', $a) ?>"><?php echo $a->getTitle() ?></a></h1>
        <p class="meta"><?php echo $a->getDateTimeObject('created_at')->format('m/d/Y') ?>  | News posted by <?php echo $a->getSfGuardUser() ?></p>
    </div>

    <div class="content">
        <?php echo auto_link_text(esc_raw($a->getContent())) ?>
    </div>

    <div class="footer">
        <div class="share addthis_toolbox addthis_default_style" 
             addthis:url="http://www.androirc.com<?php echo urlencode(url_for('article_show', $a)) ?>"
             addthis:title="<?php echo $a->getTitle() ?> - AndroIRC (Android IRC Client)">

            <a class="addthis_counter addthis_pill_style"></a>
            <a class="addthis_button_tweet" tw:via="androirc"></a>
            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
        </div>
        <?php if ($showComments) : ?>
            <div class="comments">
                <?php echo image_tag('comment.png') ?>
                <a href="<?php echo url_for('article_show', $a, true) ?>#disqus_thread" data-disqus-identifier="<?php echo $a->getId() ?>">Comments</a>
            </div>
        <?php endif ?>
    </div>
    <div class="clear"></div>
</div>
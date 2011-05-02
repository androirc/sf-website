<?php use_helper('Text') ?>
<div class="post">
    <h1><a href="<?php echo url_for('article_show', $a) ?>"><?php echo $a->getTitle() ?></a></h1>
    <p class="meta"><?php echo $a->getDateTimeObject('created_at')->format('m/d/Y') ?>  | News posted by <?php echo $a->getSfGuardUser() ?></p>
    <div class="entry">
        <p><?php echo auto_link_text(esc_raw($a->getContent())) ?></p>
        <div>
            <div class="share">
                <div class="addthis_toolbox addthis_default_style " addthis:url="<?php echo url_for('article_show', $a, true) ?>" addthis:title="<?php echo $a->getTitle() ?>">
                    <a class="addthis_button_tweet"></a>
                    <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
            </div>
            <?php if ($showComments) : ?>
                <div class="comments">
                    <?php echo image_tag('comment.png') ?>
                    <a href="<?php echo url_for('article_show', $a, true) ?>#disqus_thread" data-disqus-identifier="<?php echo $a->getId() ?>">Comments</a>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php use_helper('Text') ?>
<div class="post">
    <h2 class="title"><a href="<?php echo url_for('article_show', $a) ?>"><?php echo $a->getTitle() ?></a></h2>
    <p class="meta"><?php echo $a->getDateTimeObject('created_at')->format('m/d/Y') ?>  | News posted by <?php echo $a->getSfGuardUser() ?></p>
    <div class="entry">
        <p><?php echo auto_link_text(esc_raw($a->getContent())) ?></p>
        <div style="margin-top: 10px;">
            <div class="share" style="float: left;">
                <div class="addthis_toolbox addthis_default_style " addthis:url="<?php echo url_for('article_show', $a, true) ?>" addthis:title="<?php echo $a->getTitle() ?>">
                    <a class="addthis_button_tweet"></a>
                    <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript">
                    var addthis_config = 
                    {
                        "data_track_clickback":true
                    };
                    var addthis_share =
                    {
                        templates: {
                            twitter: '{{title}} {{url}} (from @androirc)'
                        }
                    }
                </script>
                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
            </div>
            <?php if($showComments) : ?>
            <div class="comments">
                <img src="/images/comment.png">
                <a href="<?php echo url_for('article_show', $a, true) ?>#disqus_thread" data-disqus-identifier="<?php echo $a->getId() ?>">Comments</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div style="clear: both;">&nbsp;</div>
</div>
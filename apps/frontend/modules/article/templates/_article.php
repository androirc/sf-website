<?php use_helper('Text', 'Thumbnail') ?>
<div class="article">
    <div class="title">
        <a href="<?php echo url_for('article_show', $article) ?>"><?php echo $article->getTitle() ?></a>
    </div>
    <div class="by">
        <?php echo $article->getDateTimeObject('created_at')->format('m/d/Y') ?>  | News posted by <?php echo $article->getSfGuardUser() ?>
    </div>

    <div class="content">
        <?php echo auto_link_text(androGenerateThumbnail(esc_raw($article->getContent()))) ?>
    </div>

    <div class="footer">
        <div class="share addthis_toolbox addthis_default_style" 
             addthis:url="<?php echo url_for('article_show', $article, true) ?>"
             addthis:title="<?php echo $article->getTitle() ?> - AndroIRC (Android IRC Client)">

            <a class="addthis_counter addthis_pill_style"></a>
            <a class="addthis_button_tweet" tw:via="androirc"></a>
            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
            <a class="addthis_button_google_plusone"></a>
        </div>
        <?php if ($sumup) : ?>
            <div class="comments">
                <?php echo image_tag('comment.png') ?>
                <a href="<?php echo url_for('article_show', $article, true) ?>#disqus_thread" data-disqus-identifier="<?php echo $article->getId() ?>">Comments</a>
            </div>
        <?php endif ?>
    </div>
    <div class="clear"></div>
</div>
<?php use_helper('Text') ?>
<div class="article">
    <div class="title"><?php echo $article->getTitle() ?></div>
    <div class="by">
        <?php echo $article->getDateTimeObject('created_at')->format('m/d/Y') ?>  | News posted by <?php echo $article->getSfGuardUser() ?>
    </div>
    <div class="content">
        <?php if ($sumup): ?>
            <?php echo auto_link_text(truncate_text(esc_raw($article->getContent()), 600)) ?>
            <a href="<?php echo url_for('article_show', $article, true) ?>">Read more</a>
        <?php else: ?>
            <?php echo auto_link_text(esc_raw($article->getContent())) ?>
        <?php endif ?>
    </div>

    <?php if ($sumup): ?>
        <div class="comments">
            <a href="<?php echo url_for('article_show', $article, true) ?>#disqus_thread" data-disqus-identifier="<?php echo $article->getId() ?>">Comments</a>
        </div>
    <?php endif ?>
</div>
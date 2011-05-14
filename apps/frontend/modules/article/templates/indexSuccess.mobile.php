<?php use_helper('Text') ?>
<p>AndroIRC is an Android IRC client which can connect to several server (secured or not) at the same time. Features: supports mIRC colors, auto join channels on startup, nickserv/sasl auth, logging, themes... You can see screenshots here! Feel free to contact us via the online form.</p>

<ul data-role="listview" style="margin-top:10px;" class="ui-listview">
    <?php foreach ($articles as $article): ?>
        <li>
            <a href="<?php echo url_for('article_show', $article) ?>" rel="external" class="ui-link-inherit">
                <h3 class="ui-li-heading"><?php echo $article->getTitle() ?></h3>
                <p class="ui-li-desc"><?php echo truncate_text($article->getContent(), 100) ?></p>
            </a>
        </li>
    <?php endforeach ?>
</ul>
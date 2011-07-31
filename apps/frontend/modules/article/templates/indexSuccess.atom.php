<?php echo '<?' ?>xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <title>AndroIRC</title>
    <subtitle>Latest Articles</subtitle>
    <link href="<?php echo url_for('@article_atom', true) ?>" rel="self" />
    <link href="<?php echo url_for('@homepage', true) ?>" />
    <author>
        <name>AndroIRC Team</name>
    </author>
    <id><?php echo sha1(url_for('@article_atom', true)) ?></id>

    <?php foreach ($articles as $article): ?>
        <entry>
            <title><?php echo $article->getTitle() ?></title>
            <link href="<?php echo url_for('article_show', $article, true) ?>" />
            <id><?php echo sha1(url_for('article_show', $article, true)) ?></id>
            <updated><?php echo gmstrftime('%Y-%m-%dT%H:%M:%SZ', $article->getDateTimeObject('created_at')->format('U')) ?></updated>
            <content type="html"><![CDATA[<?php echo $article->getContent() ?>]]></content>
            <author>
                <name><?php echo $article->getAuthor() ?></name>
            </author>
        </entry>
    <?php endforeach ?>
</feed>
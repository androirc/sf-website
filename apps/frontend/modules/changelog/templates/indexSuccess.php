<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
            body {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                color: #8A8A8A;
                line-height: 1.5;
            }

            h1 {
                color: #026995;
                font-size: 18px;
            }

            .new {
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <?php if ($changelog): ?>
            <h1>Changelog v<?php echo $changelog->getVersion() ?></h1>
            <ul>
                <?php foreach ($changelog->getChanges() as $change): ?>
                    <li>
                        <?php if ($change['key'] != ''): ?>
                            <strong><?php echo $change['key'] ?></strong>: 
                        <?php endif ?>
                        <?php echo $change['content'] ?>
                    </li>
                <?php endforeach ?>
            </ul>
        <?php else: ?>
            No change log for this version
        <?php endif ?>
    </body>
</html>
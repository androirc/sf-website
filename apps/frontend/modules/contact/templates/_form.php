<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div id="form">
    <?php foreach ($form as $widget): ?>
        <?php if (!$widget->isHidden()): ?>
            <div class="form_row">
                <?php echo $widget->renderLabel() ?>
                <div class="datas">
                    <?php echo $widget->render() ?>
                    <?php echo $widget->renderError() ?>
                </div>
            </div>
        <?php else: ?>
            <?php echo $widget->render() ?>
        <?php endif ?>
    <?php endforeach ?>

    <div class="submit">
        <input type="submit" id='submit' value="Send!" />
    </div>
</div>
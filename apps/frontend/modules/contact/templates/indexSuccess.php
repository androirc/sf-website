<?php slot('title','Contact') ?>

<?php if ($sf_user->hasFlash('notice')): ?>
<p class="notice-box">
    <?php echo $sf_user->getFlash('notice') ?>
</p>
<?php endif; ?>
<p>You can use this form to contact the team either to submit a bug or jsut to ask something.</p>
<form action="<?php echo url_for('@contact') ?>" method="POST">
    <?php include_partial('form', array('form' => $form)) ?>
</form>
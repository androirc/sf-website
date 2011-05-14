<h2><?php echo $a->getTitle() ?></h2>
<span><?php echo $a->getDateTimeObject('created_at')->format('m/d/Y') ?>  | News posted by <?php echo $a->getSfGuardUser() ?></span>

<p><?php echo $a->getContent() ?></p>
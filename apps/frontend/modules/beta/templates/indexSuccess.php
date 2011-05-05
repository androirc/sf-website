<?php slot('title','Beta') ?>

<h2>AnroIRC Beta version</h2>

<p>You can now download the last beta of AndroIRC! This file is not available in the Android Market because <strong>it still contains bugs</strong>. Keep in mind that it's just a beta release ;). If you find a bug, you can contact us at <a href="mailto:contact@androirc.com">contact@androirc.com</a> or just post a new ticket in <a href="http://bugs.androirc.com/">the bug tracker</a>. Thanks!</p>

<div id="beta">
    <?php if (false === $beta): ?>
    No beta right now... come back later!
    <?php else: ?>
   <a class="button blue" href="<?php echo url_for('beta_download')?>">Download the last beta of AndroIRC</a><br />
   <span>(Version <?php echo $beta->getVersion() ?> - <?php echo $beta->getDateTimeObject('created_at')->format('m/d/Y') ?>)</span>
   <?php endif ?>
</div>


  
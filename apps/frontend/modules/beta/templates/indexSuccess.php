<?php slot('title','Beta') ?>

<h2>AnroIRC Beta release</h2>




<p>VLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>

<div id="beta">
    <?php if (false === $beta): ?>
    No beta right now... come back later!
    <?php else: ?>
   <a class="button blue" href="<?php echo url_for('beta_download')?>">Download the last beta of AndroIRC</a><br />
   <span>(Version <?php echo $beta->getVersion() ?> - <?php echo $beta->getDateTimeObject('created_at')->format('m/d/Y') ?>)</span>
   <?php endif ?>
</div>


  
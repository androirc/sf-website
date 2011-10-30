<?php slot('title','Screenshots') ?>
<?php use_javascript('jquery.bxSlider.min.js', 'first') ?>

<script type="text/javascript">
    $(document).ready(function() {
        var slider = $('#slider').bxSlider({
            controls: false
        });

        $('.thumbs a').click(function(){
            var thumbIndex = $('.thumbs a').index(this);
            slider.goToSlide(thumbIndex);

            $('.thumbs a').removeClass('pager-active');
            $(this).addClass('pager-active');

            return false;
        });

        $('.thumbs a:first').addClass('pager-active');
    });
</script>

<ul id="slider">
    <?php for ($i = 1 ; $i <= 29 ; $i++): ?>
        <li>
            <div class="device">
                <?php echo image_tag('device/device-' . sprintf("%02d", $i) .'.png') ?>
            </div>
        </li>
    <?php endfor; ?>
</ul>

<div class="thumbs">
    <?php for ($i = 1 ; $i <= 29 ; $i++): ?>
        <a href="#"><?php echo image_tag('device/thumbnail/device-' . sprintf("%02d", $i) .'.png') ?></a>
    <?php endfor; ?>
</div>

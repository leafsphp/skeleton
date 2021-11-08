<div class="flex" style="width: calc(50% - 80px); padding: 30px;">
    <ion-icon name="<?php echo $icon; ?>"></ion-icon>
    <div class="ml-1">
        <h4><?php echo $title; ?></h4>
        <p class="mt-1">
            <?php echo $description; ?>
        </p>
        <a href="<?php echo $link; ?>" target="_blank" rel="noopener">
            <?php echo $linkText ?? $title; ?>
        </a>
    </div>
</div>

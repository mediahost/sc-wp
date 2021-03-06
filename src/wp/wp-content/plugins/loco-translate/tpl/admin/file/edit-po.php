<?php
/**
 * PO file editor
 */
$this->extend('editor');
$this->start('header');
?> 

    <h3 class="title">
        <span class="<?php echo $locale->getIcon()?>" lang="<?php echo $locale->lang?>"> </span>
        <span><?php $params->e('localeName')?>:</span>
        <span class="loco-meta">
            <span><?php echo esc_html_x('Updated','Modified time','loco')?>:</span>
            <span id="loco-po-modified"><?php $params->date('modified')?></span>
            &ndash;
            <span id="loco-po-status"></span>
        </span>
    </h3>

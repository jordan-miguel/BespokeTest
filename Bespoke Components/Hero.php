<?php

function tbhHeroShortcode($atts)
{

    $values = shortcode_atts(array(
        'images' => '',
        'first-line' => '',
        'second-line' => '',
        'video' => '',
        'link' => '',
    ), $atts);
    ob_start();
    ?>
    <div class="hero">
        <?
        $images = decode_shortcode_data($values['images']);
        if ($images): ?>
            <ul data-simple-slider>
                <?php foreach ($images as $image): ?>
                    <li>
                        <div class="image-16-8" style="background-image: url(<?= $image->url; ?>); "></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="hero-content">
            <div class="hero-content-first-line">
                <h1 class="header"><?= decode_shortcode_data($values['first-line']) ?></h1>

            </div>
            <h1 class="italic-header"><?= decode_shortcode_data($values['second-line']) ?></h1>

            <div class="hero-content-cta">
                <a class="hollow-button" href="<?= decode_shortcode_data($values['link']) ?>">Learn More</a>

            </div>

        </div>

        <?php if (count($images) > 1): ?>
            <div class="hero-controls">
                <i class="fa fa-chevron-left hero-controls__left" aria-hidden="true"></i>
                <i class="fa fa-chevron-right hero-controls__right" aria-hidden="true"></i>
            </div>
        <?php endif; ?>
    </div>
    <?php
    $component = ob_get_contents();
    ob_end_clean();
    return $component;
}

add_shortcode('tbhHero', 'tbhHeroShortcode');
<?php

// Nonsense (replace) Just outputs url as object with url param
function resolve_imageFromURL($url) {
	return (object)["url" => $url];
}

function tbhHeroShortcode($atts)
{

    $values = shortcode_atts(array(
        'images' => [],
        'first-line' => '',
        'second-line' => '',
        'video' => '',
        'link' => '',
    ), $atts);
    ob_start();
    ?>
    <div class="hero">
        <?php $images = decode_shortcode_data($values['images']); ?>
        <?php if (is_iterable($images)): ?>
            <ul data-simple-slider>
                <?php foreach ($images as $image): ?>
                    <?php $image = resolve_imageFromURL($image); ?>
                    <?php if (is_object($image)): /* How are images being passed? */?>
                    <li>
                        <div class="image-16-8" style="background-image: url(<?php echo $image->url; ?>); "></div>
                    </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="hero-content">
            <div class="hero-content-first-line">
                <h1 class="header"><?php echo decode_shortcode_data($values['first-line']) ?></h1>

            </div>
            <h1 class="italic-header"><?php echo decode_shortcode_data($values['second-line']) ?></h1>

            <div class="hero-content-cta">
                <a class="hollow-button" href="<?php echo decode_shortcode_data($values['link']) ?>">Learn More</a>

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

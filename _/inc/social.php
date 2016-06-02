<?php

function cabbagecms_share_bar() {

    $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    $pin_info = get_the_title() . ' - ' . get_the_content();
    $pindetails = strip_tags($pin_info);

    ?>

<ul class="cabbagecms-share" style="list-style:none;">
    <li class="g-share"><g:plusone size="medium" href="<?php the_permalink(); ?>?ref=googleplus"></g:plusone></li>
    <li class="fb-share"><div class="fb-share-button" data-href="<?php the_permalink(); ?>?ref=facebook" data-layout="button"></div></li>
    <li class="twitter-share"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-url="<?php echo wp_get_shortlink(); ?>&ref=t" data-counturl="<?php the_permalink(); ?>" data-via="<?php echo get_option('cabbagecms-twitter'); ?>">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script></li>
    <li class="pinterest-share-button"><a class="pin-it-button" href="//pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID).'?ref=pinterest'); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php echo $pindetails; ?>">Pin It</a></li><!-- end pinit -->
    <li class="linkedin-button"><script src="//platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-counter="right" data-url="<?php echo get_permalink($post-ID); ?>?ref=linkedin"></script></li>
</ul> <!-- /.share -->

<?php }

function cabbagecms_connect() {

    global $cabbagecms_facebook, $cabbagecms_twitter, $cabbagecms_youtube, $cabbagecms_pinterest, $cabbagecms_instagram, $cabbagecms_googleplus, $cabbagecms_linkedin, $cabbagecms_company_name;
    ?>

<ul class="cabbagecms-social-icons" style="list-style:none;">
    <?php if ($cabbagecms_facebook) : ?><li class="facebook"><a href="<?php echo $cabbagecms_facebook; ?>" class="facebook-icon" target="_blank">Like <?php echo $cabbagecms_company_name; ?> on Facebook</a> </li><?php endif; ?>
    <?php if ($cabbagecms_twitter) : ?><li class="twitter"><a href="<?php echo $cabbagecms_twitter; ?>" class="twitter-icon" target="_blank">Follow <?php echo $cabbagecms_company_name; ?> on Twitter</a> </li><?php endif; ?>
    <?php if ($cabbagecms_googleplus) : ?><li class="googleplus"><a href="<?php echo $cabbagecms_googleplus; ?>" class="googleplus-icon" target="_blank">Circle <?php echo $cabbagecms_company_name; ?> on Google+</a> </li><?php endif; ?>
    <?php if ($cabbagecms_pinterest) : ?><li class="pinterest"><a href="<?php echo $cabbagecms_pinterest; ?>" class="pinterest-icon" target="_blank">Follow <?php echo $cabbagecms_company_name; ?> on Pinterest</a> </li><?php endif; ?>
    <?php if ($cabbagecms_youtube) : ?><li class="youtube"><a href="<?php echo $cabbagecms_youtube; ?>" class="youtube-icon" target="_blank">Subscribe to <?php echo $cabbagecms_company_name; ?> on YouTube</a> </li><?php endif; ?>
    <?php if ($cabbagecms_instagram) : ?><li class="instagram"><a href="<?php echo $cabbagecms_instagram; ?>" class="instagram-icon" target="_blank">Follow <?php echo $cabbagecms_company_name; ?> on Instagram</a> </li><?php endif; ?>
    <?php if ($cabbagecms_linkedin) : ?><li class="linkedin"><a href="<?php echo $cabbagecms_linkedin; ?>" class="linkedin-icon" target="_blank">Follow <?php echo $cabbagecms_company_name; ?> on LinkedIn</a> </li><?php endif; ?>
</ul> <!-- /.social-icons -->


<?php }

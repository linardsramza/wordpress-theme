<?php
/*
    Template name: Blocks
*/
get_header(); ?>
    <?php
        if( have_rows('blocks') ):
            while ( have_rows('blocks') ) : the_row();
                if( get_row_layout() == 'slider_block' ):
                    $slider = get_sub_field('slider');
                ?>
                    <div class="container">
                        <div class="home-slider" data-aos="fade-up">
                            <?php if(!empty($slider)): ?>
                                <div class="slider">
                                    <?php foreach($slider as $slider_item): ?>
                                        <div class="slider-item">
                                            <div class="content d-lg-flex d-md-flex d-sm-block">
                                                <div class="text">
                                                    <h2><?= $slider_item['title']; ?></h2>
                                                    <p><?= $slider_item['text']; ?></p>
                                                    <?php
                                                        $btn = $slider_item['button'];
                                                    if(!empty($btn['button_link'])): ?>
                                                        <a href="<?= $btn['button_link']; ?>" class="btn btn-primary"><?= $btn['button_name']; ?></a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="slide-img"></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php elseif( get_row_layout() == 'about_company_block' ): ?>
                    <section class="about" data-aos="fade-up">
                        <div class="container">
                            <?php if(!empty(get_sub_field('title'))): ?>
                                <h3 class="text-center"><?= get_sub_field('title'); ?></h3>
                            <?php endif; ?>

                            <?php
                                $number_list = get_sub_field('number_list');

                            if(!empty($number_list)): ?>
                                <div class="row list">
                                    <?php foreach($number_list as $number_list_item): ?>
                                        <div class="col-12 col-md-4 col-lg-4 list-item">
                                            <div class="number"><?= $number_list_item['number']; ?></div>
                                            <h4><?= $number_list_item['subtitle']; ?></h4>
                                            <p><?= $number_list_item['content']; ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'why_us_block' ): ?>
                    <section class="why-us" data-aos="fade-up">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-5 col-lg-5">
                                    <?php if(!empty(get_sub_field('title'))): ?>
                                        <h1><?= get_sub_field('title'); ?></h1>
                                    <?php endif; ?>
                                </div>
                                <div class="col-12 col-md-7 col-lg-7">
                                    <?php
                                        $why_us_list = get_sub_field('why_us_list');

                                    if(!empty($why_us_list)): ?>
                                        <div class="row">
                                            <?php foreach($why_us_list as $why_us_list_item): ?>
                                            <div class="col-6 col-lg-4 col-md-4 item">
                                                <div class="icon">
                                                    <img src="<?= $why_us_list_item['icon']['url']; ?>">
                                                </div>
                                                <div class="text"><?= $why_us_list_item['title']; ?></div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'testimonial_slider_block' ):
                    $slider = get_sub_field('slider');
                ?>
                    <section class="testimonials" data-aos="fade-up">
                        <div class="container">
                            <div class="testimonial-slider">
                                <?php if(!empty($slider)): ?>
                                    <div class="slider">
                                        <?php foreach($slider as $slider_item): ?>
                                            <div class="slider-item">
                                                <div class="content d-flex flex-column-reverse flex-sm-column-reverse flex-lg-row flex-md-row">
                                                    <div class="img">
                                                        <?php
                                                            $slide_image  = $slider_item['image'];
                                                        ?>
                                                        <img src="<?= $slide_image['url']; ?>">
                                                    </div>
                                                    <div class="text">
                                                        <p><?= $slider_item['text']; ?></p>
                                                        <?php
                                                            $logo = $slider_item['logo'];
                                                        if(!empty($logo)): ?>
                                                            <img class="logo" src="<?= $logo['url']; ?>">
                                                        <?php endif; ?>
                                                        <h5><?= $slider_item['author']; ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'page_intro_block' ): ?>
                    <section class="page-intro" data-aos="fade-up">
                        <div class="container">
                            <?php
                                $btn = get_sub_field('button');
                                $shadow_class = (!empty($btn['link_to'])) ? 'shadow-wrapp' : '';
                            ?>
                            <div class="wrapper <?= $shadow_class; ?>">
                                <h2 class="text-center"><?= get_sub_field('title'); ?></h2>
                                <p><?= get_sub_field('text'); ?></p>
                                <?php
                                    $btn = get_sub_field('button');
                                if(!empty($btn['link_to'])): ?>
                                    <div class="text-center">
                                        <a href="<?= $btn['link_to']; ?>" class="btn btn-primary"><?= $btn['title']; ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'icon_list_block' ): ?>
                    <section class="why-us why-us-inner" data-aos="fade-up">
                        <div class="container">
                            <?php
                                $why_us_list = get_sub_field('icon_list');

                            if(!empty($why_us_list)): ?>
                                <div class="row justify-content-sm-start justify-content-lg-center justify-content-md-center">
                                    <?php foreach($why_us_list as $why_us_list_item): ?>
                                    <div class="col-6 col-lg-2 col-md-4 item text-center">
                                        <div class="icon">
                                            <img src="<?= $why_us_list_item['icon']['url']; ?>">
                                        </div>
                                        <div class="text"><?= $why_us_list_item['title']; ?></div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'diagram_image_text_block' ): ?>
                    <section class="statistics" data-aos="fade-up">
                        <div class="container">
                            <div class="wrapper">
                                <div class="row d-flex flex-column-reverse flex-sm-column-reverse flex-lg-row flex-md-row">
                                    <div class="col-12 col-lg-6 col-md-6 d-flex d-lg-block d-md-block d-sm-flex justify-content-center">
										<div class="svg-item">
                                            <?php $donut_fill_percentage = get_sub_field('animated_donut_graph_fill_percentage'); ?>
                                            <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
                                                <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#F7F5F0"></circle>
                                                <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="7.7"></circle>
                                                <circle class="donut-animation" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="7.7" stroke-dasharray="<?= $donut_fill_percentage; ?> <?= 100 - $donut_fill_percentage; ?>" stroke-dashoffset="25"></circle>
                                                <g>
                                                    <text y="52%">
                                                        <tspan x="50%" text-anchor="middle" class="donut-data"><?= get_sub_field('animated_donut_graph_text'); ?></tspan>
                                                    </text>
                                                </g>
                                            </svg>
										</div>
										<script>
											jQuery(window).scroll(function() {
												var top_of_element = jQuery(".svg-item").offset().top;
												var bottom_of_element = jQuery(".svg-item").offset().top + jQuery(".svg-item").outerHeight();
												var bottom_of_screen = jQuery(window).scrollTop() + jQuery(window).innerHeight();
												var top_of_screen = jQuery(window).scrollTop();

												if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
													jQuery(".svg-item .donut-animation").addClass("donut-segment");
												}
											});
										</script>
										<style>
											@keyframes donutfade {
												0% {
													opacity: .2;
												}
												100% {
													opacity: 1;
												}
											}

											@keyframes donutfadelong {
												0% {
													opacity: 0;
												}
												100% {
													opacity: 1;
												}
											}
											@keyframes donut1 {
												0% {
													stroke-dasharray: 0, 100;
												}
												100% {
													stroke-dasharray: <?= $donut_fill_percentage; ?>, <?= 100 - $donut_fill_percentage; ?>;
												}
											}
											.donut-data {
												fill: #343434;
												font-size: 0.18em;
												line-height: 1;
												transform: translateY(50%);
												text-align: center;
												text-anchor: middle;
												color:#343434;
												animation: donutfadelong 1s;
											}
										</style>
                                    </div>
                                    <div class="col-12 col-lg-6 col-md-6">
                                        <h4><?= get_sub_field('title'); ?></h4>
                                        <p><?= get_sub_field('text'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'step_block' ): ?>
                    <section class="steps" data-aos="fade-up">
                        <div class="container">
                            <div class="wrapper">
                                <h3><?= get_sub_field('title'); ?></h3>
                                <?php
                                    $step_list = get_sub_field('step_list');
                                if(!empty($step_list)): ?>
                                    <div class="row">
                                        <?php foreach($step_list as $step_list_item): ?>
                                            <div class="col-6 col-lg-2 item">
                                                <div class="number d-flex justify-content-center align-items-center"><?= $step_list_item['number']; ?></div>
                                                <h6><?= $step_list_item['title']; ?></h6>
                                                <p><?= $step_list_item['text']; ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'team_slider_block' ):
                    $slider = get_sub_field('slider');
                ?>
                    <section class="team-wrapper" data-aos="fade-up">
                        <div class="container">
                            <div class="team-slider">
                                <?php if(!empty($slider)): ?>
                                    <div class="slider">
                                        <?php foreach($slider as $slider_item): ?>
                                            <div class="slider-item">
                                                <div class="content d-flex flex-column-reverse flex-sm-column-reverse flex-lg-row flex-md-row">
                                                    <div class="img">
                                                        <?php
                                                            $slide_img_url = $slider_item['image'];
                                                            $slider_item_img = aq_resize( $slide_img_url, 250, 250, true, true, true );
                                                        ?>
                                                        <img src="<?= $slider_item_img; ?>">
                                                    </div>
                                                    <div class="text">
                                                        <p><?= $slider_item['text']; ?></p>
                                                        <h5><?= $slider_item['author']; ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'left_right_content_block' ): ?>
                    <section class="left-right-content" data-aos="fade-up">
                        <div class="container">
                            <h3 class="text-center"><?= get_sub_field('title'); ?></h3>
                            <?php
                                $left_right_rows = get_sub_field('left_right_rows');
                            if(!empty($left_right_rows )): ?>
                                <div class="wrapper">
                                    <?php foreach($left_right_rows as $item): ?>
                                        <div class="row item">
                                            <div class="col-12 col-lg-6 col-md-12">
                                                <h4><?= $item['title']; ?></h4>
                                                <img src="<?= $item['image']['url']; ?>" class="d-block d-lg-none">
                                                <p><?= $item['content']; ?></p>
                                            </div>
                                            <div class="col-12 col-lg-6 col-md-12 img-box">
                                                <img src="<?= $item['image']['url']; ?>" class="d-none d-lg-block">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'vacancies_type_content_block' ): ?>
                    <section class="vacancies" data-aos="fade-up">
                        <div class="container">
                            <div class="wrapper">
                                <?php if(!empty(get_sub_field('title'))): ?>
                                    <h2 class="text-center"><?= get_sub_field('title'); ?></h2>
                                <?php endif; ?>

                                <?php if(!empty(get_sub_field('subtext'))): ?>
                                    <p class="text-center intro-text"><?= get_sub_field('subtext'); ?></p>
                                <?php endif; ?>

                                <?php
                                    $more_info_blocks = get_sub_field('more_info_blocks');

                                if(!empty($more_info_blocks)): ?>
                                    <div class="accordion" id="accordionVacancies">
                                        <?php
                                            $counter = 1;

                                        foreach($more_info_blocks as $block_item):
                                            $img_class = (!empty($block_item['block_title_image'])) ? 'img' : '';
                                        ?>

                                            <div class="accordion-item">
                                                <div class="accordion-header collapsed" id="heading<?= $counter; ?>" data-bs-toggle="collapse" data-bs-target="#collapse<?= $counter; ?>" aria-expanded="false" aria-controls="collapse<?= $counter; ?>">
                                                    <h3 class="<?= $img_class; ?>"><?= $block_item['block_title']; ?></h3>
                                                    <?php if(!empty($block_item['block_title_image'])): ?>
                                                        <img src="<?= $block_item['block_title_image']['url']; ?>" class="item-img">
                                                    <?php endif; ?>
                                                    <button class="accordion-button <?= $img_class; ?>">
                                                        Vairāk info
                                                    </button>
                                                </div>
                                                <div id="collapse<?= $counter; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $counter; ?>" data-bs-parent="#accordionVacancies">
                                                    <div class="accordion-body">
                                                        <?= $block_item['block_inner_content']; ?>

                                                        <?php if(!empty($block_item['block_inner_subtitle'])): ?>
                                                            <h4><?= $block_item['block_inner_subtitle']; ?></h4>
                                                        <?php endif; ?>

                                                        <?php if(!empty($block_item['block_inner_list'])): ?>
                                                        <ul>
                                                            <?php foreach($block_item['block_inner_list'] as $list_item): ?>
                                                                <li class="d-flex">
                                                                    <img src="<?= $list_item['icon']['url']; ?>">
                                                                    <p><?= $list_item['text']; ?></p>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                        <?php endif; ?>

                                                        <?php if(!empty($block_item['inline_list'])): ?>
                                                            <div class="row inline-list">
                                                                <?php foreach($block_item['inline_list'] as $check_list_item): ?>
                                                                    <div class="col-6 col-lg-2 item">
                                                                        <div class="check"></div>
                                                                        <h6><?= $check_list_item['title']; ?></h6>
                                                                        <p><?= $check_list_item['content']; ?></p>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if(!empty($block_item['block_inner_button']['link_to'])): ?>
                                                            <a href="<?= $block_item['block_inner_button']['link_to']; ?>" class="btn btn-primary"><?= $block_item['block_inner_button']['name']; ?></a>
                                                        <?php endif; ?>
                                                        <?php if(!empty($block_item['cv_button_url'])): ?>
                                                            <div class="second-btn">
                                                                <a href="<?= $block_item['cv_button_url']; ?>" target="_blank" class="btn btn-outline-secondary"><?= __( 'Piesakies CV.lv', 'gwm_theme' ); ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $counter++; endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'we_offer_block' ): ?>
                    <section class="we-offer" data-aos="fade-up">
                        <div class="container">
                            <div class="wrapper">
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-md-6 img">
                                        <?php
                                            $image = get_sub_field('image');

                                        if(!empty($image)): ?>
                                            <img src="<?= $image['url']; ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 col-lg-6 col-md-6 text">
                                        <h3><?= get_sub_field('title'); ?></h3>

                                        <?php
                                            $list = get_sub_field('list');

                                        if(!empty($list)): ?>
                                            <ul>
                                                <?php foreach($list as $list_item): ?>
                                                    <li><?= $list_item['title']; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'show_contact_form' ): ?>
                    <section class="contact-us" data-aos="fade-up">
                        <div class="container">
                            <?php if( get_sub_field('show') ):
                                $contact_form_image = get_field('contact_form_image', 'option');
                            ?>
                                <div class="contact-wrapper">
                                    <div class="row d-flex flex-column-reverse flex-sm-column-reverse flex-lg-row flex-md-row">
                                        <div class="col col-lg-6">
                                            <h2><?= __( 'Sazinies ar mums!', 'gwm_theme' ); ?></h2>
                                             <?php if(!empty($contact_form_image)): ?>
                                                <div class="img-box d-flex align-items-center justify-content-center mobile-img">
                                                    <img src="<?= $contact_form_image['url']; ?>">
                                                </div>
                                            <?php endif; ?>
                                            <?= do_shortcode('[contact-form-7 id="129" title="Sazinies ar mums!"]'); ?>
                                        </div>
                                        <div class="col col-lg-6 d-flex justify-content-center align-items-center justify-content-lg-end justify-content-md-end">
                                            <?php if(!empty($contact_form_image)): ?>
                                                <div class="img-box d-flex align-items-center justify-content-center">
                                                    <img src="<?= $contact_form_image['url']; ?>">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'faq_block' ): ?>
                    <section class="faq" data-aos="fade-up">
                        <div class="container">
                            <h2 class="text-center section-title"><?= get_sub_field('title'); ?></h2>
                            <?php
                                $faq = get_sub_field('faq');
                                $counter = 1;

                            if(!empty($faq)): ?>
                                <div class="accordion" id="accordionExample">
                                    <?php foreach($faq as $faq_item): ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading<?= $counter; ?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $counter; ?>" aria-expanded="true" aria-controls="collapse<?= $counter; ?>">
                                                    <?= $faq_item['faq_question']; ?>
                                                </button>
                                            </h2>
                                            <div id="collapse<?= $counter; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $counter; ?>" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?= $faq_item['faq_answer']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $counter++; endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'our_mission_block' ): ?>
                    <section class="our-mission" data-aos="fade-up">
                        <div class="container">
                            <div class="wrapper">
                                <div class="row d-flex flex-column-reverse flex-sm-column-reverse flex-lg-row flex-md-row">
                                    <div class="col-12 col-lg-6 col-md-6 col-sm-12 d-none d-lg-block d-md-block">
                                        <img src="<?= get_sub_field('image')['url']; ?>">
                                    </div>
                                    <div class="col-12 col-lg-6 col-md-6 col-sm-12 content">
                                        <h3><?= get_sub_field('title'); ?></h3>
                                        <div class="d-block d-lg-none d-md-none">
                                            <img src="<?= get_sub_field('image')['url']; ?>">
                                        </div>
                                        <?= get_sub_field('content'); ?>
                                    </div>
                                </div>
                                <?php
                                    $icon_list = get_sub_field('icon_list');

                                if(!empty($icon_list)): ?>
                                    <div class="list">
                                        <ul class="row">
                                            <?php foreach($icon_list as $icon_list_item): ?>
                                                <li class="col-12 col-lg-6 d-flex">
                                                    <img src="<?= $icon_list_item['icon']['url']; ?>">
                                                    <p><?= $icon_list_item['text']; ?></p>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'simple_title_block' ): ?>
                    <section class="simple-title">
                        <div class="container">
                            <h1>Kontakti</h1>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'map_info_block' ): ?>
                    <section class="map" data-aos="fade-up">
                        <div class="container">
                            <?php
                                $contact_info = get_sub_field('contact_info');
                                $counter = 1;

                            if($contact_info): ?>
                                <div class="row">
                                    <?php foreach($contact_info as $item): ?>
                                        <div class="col-12 col-lg-3 col-md-4 item">
                                            <h4><?= $item['title']; ?></h4>
                                            <?= $item['content']; ?>
                                            <a href="#" id="location-<?= $counter; ?>" class="btn btn-outline-primary"><?= __( 'Rādīt kartē', 'gwm_theme' ); ?></a>
                                        </div>
                                    <?php $counter++; endforeach; ?>
                                </div>
                            <?php endif; ?>
                           <div id="map"></div>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'about_company_block_info' ): ?>
                    <section class="about-company" data-aos="fade-up">
                        <div class="container">
                            <div class="wrapper">
                                <h4><?= get_sub_field('title'); ?></h4>
                                <?php
                                    $about_info = get_sub_field('content');

                                if($about_info): ?>
                                    <div class="row">
                                        <?php foreach($about_info as $item): ?>
                                            <div class="col-12 col-lg-4">
                                                <?= $item['info']; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'card_block' ):
                    $display_bg = (get_sub_field('background')) ? 'blue-bg' : '';
                ?>
                    <section class="card-wrapper" data-aos="fade-up">
                        <div class="container">
                            <div class="wrapper <?= $display_bg; ?>">
                                <div class="row">
                                    <?php
                                        $img_url = get_sub_field('image')['url'];
                                        $resized_img = aq_resize( $img_url, 339, 235, true, true, true );
                                    ?>
                                    <div class="col-12 col-lg-6 col-md-6">
                                        <h2><?= get_sub_field('title'); ?></h2>
                                        <div class="img-wrapp d-md-none d-lg-none">
                                            <img src="<?= $resized_img; ?>">
                                        </div>
                                        <p><?= get_sub_field('text'); ?></p>
                                        <?php
                                            $button = get_sub_field('button');
                                        if(!empty($button['button_link'])): ?>
                                            <div class="btn-box">
                                                <a href="<?= $button['button_link']; ?>" class="btn btn-primary"><?= $button['button_name']; ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 col-lg-6 col-md-6 d-none d-sm-none d-lg-block d-md-block">
                                        <div class="img-wrapp">
                                            <img src="<?= $resized_img; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'course_blocks' ): ?>
                    <section class="courses" data-aos="fade-up">
                        <div class="container">
                            <?php
                                $courses = get_sub_field('course');
                            if(!empty($courses)): ?>
                                <?php foreach($courses as $course): ?>
                                    <div class="wrapper">
                                        <div class="row">
                                            <div class="col-12 col-lg-6 col-md-6 img">
                                                <img src="<?= $course['image']['url']; ?>">
                                            </div>
                                            <div class="col-12 col-lg-6 col-md-6 content d-flex justify-content-center flex-column">
                                                <h4><?= $course['subtitle']; ?></h4>
                                                <h3><?= $course['title']; ?></h3>
                                                <?= $course['text']; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php elseif( get_row_layout() == 'teacher_list_block' ): ?>
                    <section class="teachers" data-aos="fade-up">
                        <div class="container">
                            <div class="wrapper">
                                <h3><?= get_sub_field('title'); ?></h3>
                                <?php
                                    $teachers = get_sub_field('teacher');

                                if(!empty($teachers)): ?>
                                    <div class="row list">
                                        <?php foreach($teachers as $teacher):
                                            $img_url = $teacher['image']['url'];
                                            $resized_img = aq_resize( $img_url, 70, 70, true, true, true );
                                        ?>
                                            <div class="col-12 col-lg-4 col-md-4 col-sm-6 item">
                                                <img src="<?= $resized_img; ?>">
                                                <div class="name"><?= $teacher['name']; ?></div>
                                                <p><?= $teacher['description']; ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                <?php endif;
            endwhile;

        else :
            // no layouts found
        endif;
    ?>
<?php get_footer(); ?>

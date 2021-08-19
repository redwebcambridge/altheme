<?php

//Main colours
$logos = get_field('logo_and_icons','option');
$colours = get_field('colours','option');
$fonts = get_field('fonts','option');
$all_colours = get_field('colours','option');

//Adult colours
$adultlogos = get_field('adultlearning_logo_and_icons','option');
$adultcolours = get_field('adult_colours','option');
$adultfonts = get_field('adult_fonts','option');

//Sport colours
$sportlogos = get_field('sports_logo_and_icons','option');
$sportcolours = get_field('sports_colours','option');
$sportfonts = get_field('sports_fonts','option');

$compiler = new ScssPhp\ScssPhp\Compiler();
$compiler->setSourceMap(ScssPhp\ScssPhp\Compiler::SOURCE_MAP_INLINE);
$source_scss = get_template_directory() . '/sass/style.scss';
$scssContents = file_get_contents($source_scss);
$import_path = get_stylesheet_directory() . '/sass';
$compiler->addImportPath($import_path);
$target_css = get_stylesheet_directory() . '/styles.css';

$variables = [
  //colours
  '$primarycolour' => $colours['primary_colour'],
  '$secondarycolour' =>  $colours['second_colour'],
  //'$thirdcolour' =>  $colours['third_colour'],
  '$bordercolour' =>  $colours['border_colour'],
  '$footerbgcolour' => get_field('footer_background_colour','option'),
  '$footer_icon_colour' => $all_colours['footer_icon_colour'],
  '$footer_title_colour' => $all_colours['footer_title_colour'],
  //fonts
  '$headingsfont' => $fonts['heading_font'],
  '$headingsfontweight' => $fonts['heading_font_weight'],
  '$bodyfont' => $fonts['body_font'],
  '$bodyfontweight' => $fonts['body_font_weight'],
  //header
  '$header_social_icon_colour' => $all_colours['header_social_icon_colour'],
  //images
  '$siteicon' => '"'.$logos['icon']['url'].'"',
  '$footerbgimage'=> '"'.get_field('footer_background_image', 'option').'"',
  //Font size - this will need an if statement depending on what font it is
  '$bodyfontsize'=> '1em',
  '$bodylineheight'=> '1.6em',

  //Adult colours
  '$adultprimarycolour' => $adultcolours['adult_primary_colour'],
  '$adultsecondarycolour' =>  $adultcolours['adult_second_colour'],
  '$adultbordercolour' =>  $adultcolours['adult_border_colour'],
  '$adultfooter_icon_colour' => $adult_all_colours['adult_footer_icon_colour'],
  '$adultfooter_title_colour' => $adult_all_colours['adult_footer_title_colour'],
  '$adultfooter_footer_bg_colour' => get_field('footer_options','option')['footer_background_colour'],
  '$adultfooter_footer_bg_img'=> '"'.get_field('footer_options', 'option')['footer_background_image'].'"',
  //Adult fonts
  '$adultheadingsfont' => $adultfonts['adult_heading_font'],
  '$adultheadingsfontweight' => $adultfonts['adult_heading_font_weight'],
  '$adultbodyfont' => $adultfonts['adult_body_font'],
  '$adultbodyfontweight' => $adultfonts['adult_body_font_weight'],

  //Sports colours
  '$sportprimarycolour' => $sportcolours['sports_primary_colour'],
  '$sportsecondarycolour' =>  $sportcolours['sports_second_colour'],
  '$sportbordercolour' =>  $sportcolours['sports_border_colour'],
  '$sportfooterbgcolour' => $sportcolours['footer_background_colour'],
  '$sportfooter_icon_colour' => $sportcolours['sports_footer_icon_colour'],
  '$sportfooter_title_colour' => $sportcolours['sports_footer_title_colour'],

  //Sport fonts
  '$sportheadingsfont' => $sportfonts['sports_heading_font'],
  '$sportheadingsfontweight' => $sportfonts['sports_heading_font_weight'],
  '$sportbodyfont' => $sportfonts['sports_body_font'],
  '$sportbodyfontweight' => $sportfonts['sports_body_font_weight'],
];

$compiler->setVariables($variables);
$css = $compiler->compile($scssContents);
if (!empty($css) && is_string($css)) {
  file_put_contents($target_css, $css);
}
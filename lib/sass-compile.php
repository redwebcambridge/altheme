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
$adult_all_colours = get_field('adult_colours','option');

$compiler = new ScssPhp\ScssPhp\Compiler();
$compiler->setSourceMap(ScssPhp\ScssPhp\Compiler::SOURCE_MAP_INLINE);
$source_scss = get_stylesheet_directory() . '/sass/style.scss';
$scssContents = file_get_contents($source_scss);
$import_path = get_stylesheet_directory() . '/sass';
$compiler->addImportPath($import_path);
$target_css = get_stylesheet_directory() . '/styles.css';


//Sports centre colours
// $sportlogos = get_field('sportcentre_logo_and_icons','option');
// $sportcolours = get_field('sportcentre_colours','option');
// $sportfonts = get_field('sportcentre_fonts','option');
// $sport_all_colours = get_field('sportcentre_colours','option');

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
  '$header_social_icon_colour' => get_field('social_media_icon_colour',6),
  //images
  '$siteicon' => '"'.$logos['icon']['url'].'"',
  '$footerbgimage'=> '"'.get_field('footer_background_image', 'option').'"',
  //Font size - this will need an if statement depending on what font it is
  '$bodyfontsize'=> '1em',
  '$bodylineheight'=> '1.6em',

  //Adult colours
  '$adultprimarycolour' => $adultcolours['adult_primary_colour'],
  '$adultsecondarycolour' =>  $adultcolours['adult_second_colour'],
  '$adultthirdcolour' =>  $adultcolours['adult_third_colour'],
  '$adultbordercolour' =>  $adultcolours['adult_border_colour'],
  '$adultfooterbgcolour' => get_field('adult_footer_background_colour','option'),
  '$adultfooter_icon_colour' => $adult_all_colours['adult_footer_icon_colour'],
  '$adultfooter_title_colour' => $adult_all_colours['adult_footer_title_colour'],
  //Adult fonts
  '$adultheadingsfont' => $adultfonts['adult_heading_font'],
  '$adultheadingsfontweight' => $adultfonts['adult_heading_font_weight'],
  '$adultbodyfont' => $adultfonts['adult_body_font'],
  '$adultbodyfontweight' => $adultfonts['adult_body_font_weight'],

  //Sport centre colours
  // '$sportprimarycolour' => $sportcolours['adult_primary_colour'],
  // '$sportsecondarycolour' =>  $sportcolours['adult_second_colour'],
  // '$sportthirdcolour' =>  $sportcolours['adult_third_colour'],
  // '$sportbordercolour' =>  $sportcolours['adult_border_colour'],
  // '$sportfooterbgcolour' => get_field('sportcentre_footer_background_colour','option'),
  // '$sportfooter_icon_colour' => $sport_all_colours['adult_footer_icon_colour'],
  // '$sportfooter_title_colour' => $sport_all_colours['adult_footer_title_colour'],
  //Sport centre fonts
  // '$sportheadingsfont' => $adultfonts['adult_heading_font'],
  // '$sportheadingsfontweight' => $adultfonts['adult_heading_font_weight'],
  // '$sportbodyfont' => $adultfonts['adult_body_font'],
  // '$sportbodyfontweight' => $adultfonts['adult_body_font_weight'],
];

$compiler->setVariables($variables);
$css = $compiler->compile($scssContents);
if (!empty($css) && is_string($css)) {
  file_put_contents($target_css, $css);
}
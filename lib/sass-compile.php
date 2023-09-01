<?php
//Main colours
  $logos = get_field('logo_and_icons','option');
  $colours = get_field('colours','option');
  $fonts = get_field('fonts','option');
  $all_colours = get_field('colours','option');
//Adult learning
if (get_field('activate_adult_learning','option')) {
  $adultlogos = get_field('adultlearning_logo_and_icons','option');
  $adultcolours = get_field('adult_colours','option');
  $adultfonts = get_field('adult_fonts','option');
  $ad_logos = get_field('adultlearning_logo_and_icons','option');
} else {
  $adultlogos = get_field('logo_and_icons','option');
  $adultcolours = get_field('colours','option');
  $adultfonts = get_field('fonts','option');
  $ad_logos = get_field('logo_and_icons','option');
}
//Sports
if (get_field('activate_sport_centre','option')) {
  $sportlogos = get_field('sports_logo_and_icons','option');
  $sportcolours = get_field('sports_colours','option');
  $sportfonts = get_field('sports_fonts','option');
  $sport_logos = get_field('sports_logo_and_icons','option');
} else {
  $sportlogos = get_field('logo_and_icons','option');
  $sportcolours = get_field('colours','option');
  $sportfonts = get_field('fonts','option');
  $sport_logos = get_field('logo_and_icons','option');
}

//INCREASE FONT FOR 
if (get_field('school_id','option') == "mpa" || get_field('school_id','option') == "lhjs" || get_field('school_id','option') == "wpa" || get_field('school_id','option') == "pps") {
  $fontsize = '1.1em';
} else {
  $fontsize = '1em';
}

$compiler = new ScssPhp\ScssPhp\Compiler();
$compiler->setSourceMap(ScssPhp\ScssPhp\Compiler::SOURCE_MAP_INLINE);
$source_scss = get_template_directory() . '/sass/style.scss';
$scssContents = file_get_contents($source_scss);
$import_path = get_template_directory() . '/sass';
$compiler->addImportPath($import_path);
$target_css = get_template_directory() . '/styles.css';

//Check empty values
if (isset($ad_logos['icon'])) {
  $ad_icon_url = $ad_logos['icon']['url'];
} else {
  $ad_icon_url = null;
}
if (isset($sport_logos['icon']['url'])) {
  $sport_logo_url = $sport_logos['icon']['url'];
} else {
  $sport_logo_url = null;
}

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
  '$bodyfontsize'=> $fontsize,
  '$bodylineheight'=> '1.6em',

  //Adult colours
  '$adultprimarycolour' => $adultcolours['primary_colour'],
  '$adultsecondarycolour' =>  $adultcolours['second_colour'],
  '$adultbordercolour' =>  $adultcolours['border_colour'],
  '$adultfooter_icon_colour' => $adultcolours['footer_icon_colour'],
  '$adultfooter_title_colour' => $adultcolours['footer_title_colour'],
  '$adultfooter_bg_colour' => $adultcolours['footer_background_colour'],
  //Adult fonts
  '$adultheadingsfont' => $adultfonts['heading_font'],
  '$adultheadingsfontweight' => $adultfonts['heading_font_weight'],
  '$adultbodyfont' => $adultfonts['body_font'],
  '$adultbodyfontweight' => $adultfonts['body_font_weight'],
  //Adult site Icon
  '$adultsiteicon' => '"'.$ad_icon_url.'"',
  '$adultfooterbg_img' => '"'.get_field('adult_footer_background_image', 'option').'"',

  //Sports colours
  '$sportprimarycolour' => $sportcolours['primary_colour'],
  '$sportsecondarycolour' =>  $sportcolours['second_colour'],
  '$sportbordercolour' =>  $sportcolours['border_colour'],
  '$sportfooter_bg_colour' => $sportcolours['footer_background_colour'],
  '$sportfooter_icon_colour' => $sportcolours['footer_icon_colour'],
  '$sportfooter_title_colour' => $sportcolours['footer_title_colour'],
  //Sport fonts
  '$sportheadingsfont' => $sportfonts['heading_font'],
  '$sportheadingsfontweight' => $sportfonts['heading_font_weight'],
  '$sportbodyfont' => $sportfonts['body_font'],
  '$sportbodyfontweight' => $sportfonts['body_font_weight'],
   //Sport site Icon
   '$sportiteicon' => '"'.$sport_logo_url.'"',
   '$sportsfooterbg_img' => '"'.get_field('sports_footer_background_image', 'option').'"',
];

$compiler->setVariables($variables);
$css = $compiler->compile($scssContents);
if (!empty($css) && is_string($css)) {
  file_put_contents($target_css, $css);
}

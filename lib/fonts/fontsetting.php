<?php
//Main Heading Font
function getheadingfont() {
  $fonts = get_field('fonts','option');
  switch ($fonts['heading_font']) {
    case "'Raleway', sans-serif":
      $headingfonturl = 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap';
      break;
    case "'Roboto Slab', sans-serif":
      $headingfonturl = 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;700&display=swap';
      break;
    case "'Roboto', sans-serif":
      $headingfonturl = 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap';
      break;        
    case "'Open Sans', sans-serif":
      $headingfonturl = 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap';
      break;
    case "'Josefin Sans', sans-serif":
      $headingfonturl = 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap';
      break;
    case "'Lato', sans-serif":
      $headingfonturl = 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap';
      break;  
    case "'Libre Franklin ', sans-serif":
      $headingfonturl = 'https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;600&display=swap';
      break; 
    case "'Montserrat ', sans-serif":
      $headingfonturl = 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap';
      break;     
  }
  return $headingfonturl;
}

//Main Body Font
function getbodyfont() {
  $fonts = get_field('fonts','option');
  switch ($fonts['body_font']) {
    case "'Raleway', sans-serif":
      $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap';
      break;
    case "'Roboto', sans-serif":
      $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap';
      break;   
    case "'Open Sans', sans-serif":
      $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap';
      break;
    case "'Josefin Sans', sans-serif":
      $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap';
      break;
    case "'Lato', sans-serif":
      $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap';
      break;  
    case "'Libre Franklin ', sans-serif":
      $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;600&display=swap';
      break; 
    case "'Montserrat ', sans-serif":
      $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap';
      break;     
  }
  return $bodyfonturl;
}

//Adult Learning Heading Font
function getheadingfont_adultlearning() {
  $fonts = get_field('adult_fonts','option');
  if (isset($fonts['adult_heading_font'])){
    switch ($fonts['adult_heading_font']) {
      case "'Raleway', sans-serif":
        $headingfonturl = 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap';
        break;
      case "'Roboto Slab', sans-serif":
        $headingfonturl = 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;700&display=swap';
        break;
      case "'Roboto', sans-serif":
        $headingfonturl = 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap';
        break;   
      case "'Open Sans', sans-serif":
        $headingfonturl = 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap';
        break;
      case "'Josefin Sans', sans-serif":
        $headingfonturl = 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap';
        break;
      case "'Lato', sans-serif":
        $headingfonturl = 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap';
        break;  
      case "'Libre Franklin ', sans-serif":
        $headingfonturl = 'https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;600&display=swap';
        break; 
      case "'Montserrat ', sans-serif":
        $headingfonturl = 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap';
        break;  
    }
    return $headingfonturl;
  }
  
}

//Adult Learning Body Font
function getbodyfont_adultlearning() {
  $fonts = get_field('adult_fonts','option');
  if (isset($fonts['body_font'])){
    switch ($fonts['body_font']) {
      case "'Raleway', sans-serif":
        $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap';
        break;
      case "'Roboto', sans-serif":
        $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap';
        break;   
      case "'Open Sans', sans-serif":
        $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap';
        break;
      case "'Josefin Sans', sans-serif":
        $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap';
        break;
      case "'Lato', sans-serif":
        $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap';
        break;  
      case "'Libre Franklin ', sans-serif":
        $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;600&display=swap';
        break; 
      case "'Montserrat ', sans-serif":
        $bodyfonturl = 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap';
        break;     
    }
    return $bodyfonturl;
  }
}
//Sports Heading Font
function getheadingfont_sports() {
  $fonts = get_field('sports_fonts','option');
  if (isset($fonts['sports_heading_font'])){
    switch ($fonts['sports_heading_font']) {
      case "'Raleway', sans-serif":
        $headingsportsfonturl = 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap';
        break;
      case "'Open Sans', sans-serif":
        $headingsportsfonturl = 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap';
        break;
      case "'Josefin Sans', sans-serif":
        $headingsportsfonturl = 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap';
        break;
      case "'Lato', sans-serif":
        $headingsportsfonturl = 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap';
        break;  
      case "'Libre Franklin ', sans-serif":
        $headingsportsfonturl = 'https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;600&display=swap';
        break; 
      case "'Montserrat ', sans-serif":
        $headingsportsfonturl = 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap';
        break; 
      case "'Roboto Slab', sans-serif":
        $headingsportsfonturl = 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;700&display=swap';
        break;
      case "'Roboto', sans-serif":
        $headingsportsfonturl = 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap';
        break;    
    }
    return $headingsportsfonturl;
  }
}

//Sports Body Font
function getbodyfont_sports() {
  $fonts = get_field('sports_fonts','option');
  if (isset($fonts['sports_body_font'])){
    switch ($fonts['sports_body_font']) {
      case "'Raleway', sans-serif":
        $bodysportsfonturl = 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap';
        break;
      case "'Open Sans', sans-serif":
        $bodysportsfonturl = 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap';
        break;
      case "'Josefin Sans', sans-serif":
        $bodysportsfonturl = 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap';
        break;
      case "'Lato', sans-serif":
        $bodysportsfonturl = 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap';
        break;  
      case "'Libre Franklin ', sans-serif":
        $bodysportsfonturl = 'https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;600&display=swap';
        break; 
      case "'Montserrat ', sans-serif":
        $bodysportsfonturl = 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap';
        break;    
      case "'Roboto', sans-serif":
        $bodysportsfonturl = 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap';
        break;    
    }
    return $bodysportsfonturl;
  }
}
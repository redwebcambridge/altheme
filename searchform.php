<?php
$site_section = 'academy';

if (is_adult_ed_page()){$site_section = 'adult_ed';} 
if (is_sports_page()){$site_section = 'sports';} 

?>

<form action="/" method="get" id="searchform" class="searchformcontain">
  <div class="input-group mb-2">
    <input class="form-control rounded-0 ml-2" placeholder="SEARCH" type="text" name="s"  aria-label="Search" id="search" value="<?php the_search_query(); ?>" />
    <input type="hidden" name="site_section" value="<?php echo $site_section; ?>" /> 
    <div class="input-group-append">
      <button class="rounded-0 btn" type="submit" id="button-addon2">
        <span class="visually-hidden">Search</span>
      </button>
    </div>
  </div>
</form>






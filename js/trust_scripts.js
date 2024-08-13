jQuery(function () {

  //Homepage Tabs
  jQuery('.central-team-tabs-nav .tab_button').on("click", function () {
    jQuery('.central-team-tabs-nav .tab_button').removeClass('active');
    jQuery(this).addClass('active');
  });

  jQuery('.executive_btn').on("click", function () {
    jQuery('.executive_team').fadeIn();
    jQuery('.department_team').hide();

  })

  jQuery('.departments_btn').on("click", function () {
    jQuery('.executive_team').hide();
    jQuery('.department_team').fadeIn();

  })

  

});
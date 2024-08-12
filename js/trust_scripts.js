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

  var counterran = false;

  // IntersectionObserver callback
  function handleIntersection(entries) {
      entries.forEach(entry => {
          if (entry.isIntersecting && !counterran) {
              animateCounters();
              counterran = true;
          }
      });
  }

  // Initialize IntersectionObserver
  var observer = new IntersectionObserver(handleIntersection, {
      threshold: 0.5 // Adjust threshold as needed
  });

  // Target the stats_strip element
  var target = document.querySelector('.stats_strip');
  if (target) {
      observer.observe(target);
  }

  // Animate counters function
  function animateCounters() {
      var counters = document.querySelectorAll('.number1, .number2, .number3, .number4');
      counters.forEach(counter => {
          var targetValue = parseInt(counter.getAttribute('data-counter'), 10);
          animateCounter(counter, targetValue);
      });
  }

  // Function to animate each counter
  function animateCounter(element, targetValue) {
      var startValue = 0;
      var duration = 2000;
      var startTime = null;

      function updateCounter(currentTime) {
          if (!startTime) startTime = currentTime;
          var elapsedTime = currentTime - startTime;
          var progress = Math.min(elapsedTime / duration, 1);
          element.textContent = Math.ceil(progress * targetValue);
          if (progress < 1) {
              requestAnimationFrame(updateCounter);
          }
      }

      requestAnimationFrame(updateCounter);
  }


});
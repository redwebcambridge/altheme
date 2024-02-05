<?php
/*
Template Name: Calendar
*/
get_header(); ?>

<div class="container">

    <div class="row">
      <div class="col-12 text-end">
        <a href="https://docs.anglianlearning.org/csv/calendars/<?php echo strtoupper(get_field('school_id','option')); ?>.ics" class="btn btn-primary mb-4"><i class="fa-solid fa-calendar-days"></i> Subscribe</a>
      </div>
    </div>
    <div class="row">
          <div class="col-lg-3 text-section">
            <div id="listview"></div>
          </div>
          <div class="col-lg-9 text-section">
            <div id='calendar'></div>
          </div>
          <div class="col-12 text-center my-5" id="spinner">
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>    
          </div>
    </div>
    <?php get_template_part('template-parts/downloads'); ?>

</div>

</section>

<script type="text/javascript">
  jQuery('#calendar,#listview').hide();
  document.addEventListener('DOMContentLoaded', function() {
    let events = [];
    var calendarEl = document.getElementById('calendar');
    var listviewEl = document.getElementById('listview');
    //Settings for Main Calendar
    var calendar = new FullCalendar.Calendar(calendarEl,
    {
      eventDidMount: function(info) {
        jQuery(info.el).tooltip({
          title: info.event.title,
          container: 'section'
        });
      },
      buttonText:{today:'Today',month:'Month',week:'Week',day:'Day',list:'List'},
      themeSystem: 'bootstrap',
      headerToolbar: { start:'prev,next,today', center: 'title', right: 'dayGridMonth,timeGridWeek' },
      initialView: 'dayGridMonth',
      firstDay: '1',
      eventTimeFormat: {
        hour: 'numeric',
        minute: '2-digit',
        omitZeroMinute: false,
        meridiem: 'short',
        hour12: true,
      },  
      dayMaxEventRows: true,
      dayMaxEventRows: 6,
      businessHours: false,
      height: '950px',
      allDayText: 'All Day',
      locale: 'en',
      eventClick: function(event) {
        if (event.event.url) {
          event.jsEvent.preventDefault()
          window.open(event.event.url, "_blank");
        }
      }
    });
    //settings for list view
    var listview = new FullCalendar.Calendar(listviewEl,
    {
      eventTimeFormat: {
        hour: 'numeric',
        minute: '2-digit',
        omitZeroMinute: false,
        meridiem: 'short',
        hour12: true,
      },
      headerToolbar:  { start:'prev,next', center: 'title', right: 'today' },
      buttonText:{today:'Today',month:'Month',week:'Week',day:'Day',list:'List'},
      height: '950px',
      themeSystem: 'bootstrap',
      initialView: 'listMonth',
      firstDay: '1',
      listDaySideFormat: false,
      footerToolbar:  false,
      allDayText: 'All Day',
      locale: 'en',
    });
    //Render Both
    //calendar.render();
    //Get the data from the generated XML file
    jQuery.ajax({
        type : "get",
        dataType : "json",
        url : '/wp-admin/admin-ajax.php',
        data : {
            action: "calendar_xml",
        },
        context: this,
          beforeSend: function(){
        },
        success: function(response) {
            if(response.success) {
              if (response.data) {
                  events = response.data.event;
                  for (var i = 0; i < events.length; i++) {
                    var startdate = calendar.formatIso(events[i].start);
                    var enddate = calendar.formatIso(events[i].end);                    
                    var item = {
                      title: events[i].title, 
                      start: new Date(startdate),
                      end: new Date(enddate),
                      url: events[i].url
                    }
                    if (events[i].allDay == 1) {
                      item.allDay = true
                    }
                    else{
                      item.allDay = false
                    }
                    calendar.addEvent(item);
                    listview.addEvent(item);
                }
              }
            }
            else {
                alert('Load data source error');
            }
            jQuery('#calendar,#listview,#spinner').toggle();
            calendar.render();
            listview.render();
        },
        error: function( jqXHR, textStatus, errorThrown ){
            console.log( 'The following error occured: ' + textStatus, errorThrown );
        }
    });
  });
  jQuery( document ).ready(function() {

    jQuery('#calendar .fc-prev-button').click(function() {
      jQuery('#listview .fc-prev-button').click();
    }); 
    jQuery('#calendar .fc-next-button').click(function() {
        jQuery('#listview .fc-next-button').click();
    });
    jQuery('#calendar .fc-today-button').click(function() {
      jQuery('#listview .fc-today-button').click();
    });

  }); 
</script>

<?php get_footer(); ?>
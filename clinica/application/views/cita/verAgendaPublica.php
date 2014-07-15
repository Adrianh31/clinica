<!-- /widget -->
<div class="widget widget-nopad">
    <div class="widget-header"> <i class="icon-list-alt"></i>
        <h3> Agenda Citas (Clic en el dia y Hora Preferida)</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
        <div id='calendar'>
        </div>
    </div>
    <!-- /widget-content --> 
</div>
<!-- /widget -->




<form action="<?php echo base_url('servicios/establecerCita') ?>" method="POST" id="fomNuevaCita">
    <input type="hidden" name="citaDia" id="citaDia"/>
    <input type="hidden" name="citaHora" id="citaHora"/>
</form>


<script>
    $(document).ready(function() {

        var date = new Date();
        var d = date.getDate();
        //var m = date.getMonth();
        var y = date.getFullYear();


        $('#calendar').fullCalendar({
            dayClick: function(date, allDay, jsEvent, view) {
                var check = $.fullCalendar.formatDate(date, 'yyyy-MM-dd');
                var today = $.fullCalendar.formatDate(new Date(), 'yyyy-MM-dd');
                if (check < today) {
                    alert("No es posible crear citas para dias pasados .");
                }
                else
                {
                    if ("../events/agregar/") {
                        //there are different names for view.name the options are: agendaWeek, month, agendaDay 
                        if (view.name == 'month') {
                            $(this).css('background-color', '#00ba8b');
                        }

                        if (view.name == 'agendaWeek' || view.name == 'agendaDay') {
                            var element = jsEvent.currentTarget;
                            $(element).css('background-color', '#00ba8b');
                        }

                        var diaCita = $.fullCalendar.formatDate(date, "yyyy-MM-dd");
                        var horaCita = $.fullCalendar.formatDate(date, "HH:mm");
                        $("#citaDia").val(diaCita);
                        $("#citaHora").val(horaCita);
                        $("#fomNuevaCita").submit();
                        return true;
                    }
                }
            },
            eventClick: function(calEvent, jsEvent, view) {
                var idCita = calEvent.id;
                $("#citaId").val(idCita);
                $("#fomEditarCita").submit();
                return true;
            },
            events: "<?php echo base_url('servicios/listaCitasPublicas'); ?>",
            // Convert the allDay from string to boolean
            eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            defaultView: 'month',
            minTime: '8:00',
            maxTime: '18:00',
            hiddenDays: [0],
            allDaySlot: false,
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: false,
            slotMinutes: 30,
        });
    });

</script>

</script><!-- /Calendar -->          
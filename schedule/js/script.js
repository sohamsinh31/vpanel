    var calendar;
    var Calendar = FullCalendar.Calendar;
    var events = [];
    $(function() {
        if (!!scheds) {
            Object.keys(scheds).map(k => {
                var row = scheds[k]
                events.push({ id: row.id, title: row.title, start: row.start_datetime,allDay:true, end: row.end_datetime,backgroundColor:'green',color:'green',rendering: 'background' });
            })
        }
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()
        calendar = new Calendar(document.getElementById('calendar'), {
            headerToolbar: {
                left: 'prev,next today',
                right: 'dayGridMonth,dayGridWeek,list',
                center: 'title',
            },
            initialView: 'dayGridMonth',
            height: 850,
            themeSystem:'bootstrap',
            selectable: true,
            // events: {
            //     url:'testing/file.php'
            // },
            events:events,
            eventClick: function(info) {
                var _details = $('#event-details-modal')
                var id = info.event.id
                if (!!scheds[id]) {
                    _details.find('#title').text(scheds[id].title)
                    _details.find('#description').text(scheds[id].description)
                    _details.find('#absent').text(scheds[id].absent)
                    _details.find('#start').text(scheds[id].sdate)
                    _details.find('#end').text(scheds[id].edate)
                    _details.find('#edit,#delete').attr('data-id', id)
                    _details.modal('show')
                } else {
                    alert("Event is undefined");
                }
            },
            eventDidMount: function(info) {
                // Do Something after events mounted
            },
            editable: true
        });

        calendar.render();

        // Form reset listener
        $('#schedule-form').on('reset', function() {
            $(this).find('input:hidden').val('')
            $(this).find('input:visible').first().focus()
        })

        // Edit Button
        $('#edit').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _form = $('#schedule-form')
                let startt = String(scheds[id].start_datetime).replace(" ", "T").slice(0,-3)
                let endd = String(scheds[id].end_datetime).replace(" ", "T").slice(0,-3)
                console.log(String(scheds[id].end_datetime).replace(" ", "T"),startt)
                _form.find('[name="id"]').val(id)
                _form.find('[name="title"]').val(scheds[id].title)
                _form.find('[name="degree2"]').val(scheds[id].degree)
                _form.find('[name="branch2"]').val(scheds[id].branch)
                _form.find('[name="semester2"]').val(scheds[id].semester)
                _form.find('[name="description"]').val(scheds[id].description)
                _form.find('[name="absent"]').val(scheds[id].absent)
                _form.find('[name="start_datetime"]').val(startt)
                _form.find('[name="end_datetime"]').val(endd)
                $('#event-details-modal').modal('hide')
                _form.find('[name="title"]').focus()
            } else {
                alert("Event is undefined");
            }
        })

        // Delete Button / Deleting an Event
        $('#delete').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _conf = confirm("Are you sure to delete this scheduled event?");
                if (_conf === true) {
                    location.href = "./delete_schedule.php?id=" + id;
                }
            } else {
                alert("Event is undefined");
            }
        })
    });

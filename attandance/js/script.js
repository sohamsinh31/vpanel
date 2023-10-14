var calendar;
var Calendar = FullCalendar.Calendar;
var events = [];
$(function () {
    if (!!scheds) {
        Object.keys(scheds).map(k => {
            var row = scheds[k]
            if (row.description.indexOf(enrollment) >= 0) {
                events.push({ id: row.id, title: row.title, allDay: true, start: row.start_datetime, end: row.end_datetime, backgroundColor: 'green', color: 'green', rendering: 'background' });
            }
            else if (row.absent.indexOf(enrollment) >= 0) {
                events.push({ id: row.id, title: row.title, allDay: true, start: row.start_datetime, end: row.end_datetime, backgroundColor: 'red', color: 'red', rendering: 'background' });
            }
            else {
                events.push({ id: row.id, title: row.title, allDay: true, start: row.start_datetime, end: row.end_datetime, backgroundColor: 'gray', color: 'red', rendering: 'background' });

            }
        })
    }
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    calendar = new Calendar(document.getElementById('calendar'), {
        initialView: 'dayGridMonth',
        height: 850,
        themeSystem: 'bootstrap',
        headerToolbar: {
            left: 'prev,next today',
            right: 'dayGridMonth,dayGridWeek,list',
            center: 'title',
        },
        events: events,
        selectable: false,
        eventClick: function (info) {
            var _details = $('#event-details-modal')
            var id = info.event.id
            if (!!scheds[id]) {
                _details.find('#title').text(scheds[id].title)
                // _details.find('#description').text(scheds[id].description)
                // _details.find('#absent').text(scheds[id].absent)
                _details.find('#start').text(scheds[id].sdate)
                _details.find('#end').text(scheds[id].edate)
                _details.find('#edit,#delete').attr('data-id', id)
                _details.modal('show')
            } else {
                alert("Event is undefined");
            }
        },
        eventDidMount: function (info) {
            // Do Something after events mounted
        },
        editable: false
    });

    calendar.render();

    // Form reset listener
    $('#schedule-form').on('reset', function () {
        // $(this).find('input:hidden').val('')
        // $(this).find('input:visible').first().focus()
    })

    // Edit Button
    $('#edit').click(function () {
        // var id = $(this).attr('data-id')
        // if (!!scheds[id]) {
        //     var _form = $('#schedule-form')
        //     console.log(String(scheds[id].start_datetime), String(scheds[id].start_datetime).replace(" ", "\\t"))
        //     _form.find('[name="id"]').val(id)
        //     _form.find('[name="title"]').val(scheds[id].title)
        //     _form.find('[name="degree2"]').val(scheds[id].degree2)
        //     _form.find('[name="branch2"]').val(scheds[id].branch2)
        //     _form.find('[name="semester2"]').val(scheds[id].semester2)
        //     _form.find('[name="description"]').val(scheds[id].description)
        //     _form.find('[name="absent"]').val(scheds[id].title)
        //     _form.find('[name="start_datetime"]').val(String(scheds[id].start_datetime).replace(" ", "T"))
        //     _form.find('[name="end_datetime"]').val(String(scheds[id].end_datetime).replace(" ", "T"))
        //     $('#event-details-modal').modal('hide')
        //     _form.find('[name="title"]').focus()
        // } else {
        //     alert("Event is undefined");
        // }
    })

    // Delete Button / Deleting an Event
    $('#delete').click(function () {
        // var id = $(this).attr('data-id')
        // if (!!scheds[id]) {
        //     var _conf = confirm("Are you sure to delete this scheduled event?");
        //     if (_conf === true) {
        //         location.href = "./delete_schedule.php?id=" + id;
        //     }
        // } else {
        //     alert("Event is undefined");
        // }
    })

});

<link rel="stylesheet" type="text/css" href="{{ asset('css/addAppointment.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}" />

<div class="modal fade" id="doctorAppointments" tabindex="-1" role="dialog" aria-labelledby="doctorAppointmentsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Search Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="doctorCalendar">
            </div>
        </div>
    </div>
</div>
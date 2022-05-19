<script src="{{asset('js/appointments.js')}}"></script>

<script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/datatables/datatables-demo.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/appointments.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}" />

<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'Appointments')">Appointments</button>
</div>

<div id="Appointments" class="tabcontent">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>End Time</th>
                        <th>Details</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>End Time</th>
                        <th>Details</th>
                        <th>Notes</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{$appointment->patient->PatName}}</td>
                        <td>{{$appointment->doctor->Name}}</td>
                        <td>{{$appointment->Subject}}</td>
                        <td>{{$appointment->Date}}</td>
                        <td>{{$appointment->Time}}</td>
                        <td>{{date("H:i:s",strtotime($appointment->EndTime_Expected))}}</td>
                        <td>{{$appointment->Details}}</td>
                        <td>{{$appointment->Notes}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="Paris" class="tabcontent">
    <h3>Paris</h3>
    <p>Paris is the capital of France.</p>
</div>

<div id="Tokyo" class="tabcontent">
    <h3>Tokyo</h3>
    <p>Tokyo is the capital of Japan.</p>
</div>
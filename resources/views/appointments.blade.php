<link rel="stylesheet" type="text/css" href="{{ asset('css/appointments.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}" />

<div class="tab w-100 d-flex">
    <div>
        <button class="tablinks" id="appointments-tab-button" onclick="openTab(event, 'Appointments')">Appointments</button>
        <button class="tablinks" id="calendar-tab-button" onclick="openTab(event, 'Calender')">Calender</button>
    </div>
    <div class="ml-auto mr-2 d-flex justify-content-center align-items-center">
        <select class="form-control" name="doctors-selector" id="doctors-selector">
            @if (!$selectedDoctor)
            <option selected="true" value="">No doctor selected</option>
            @else
            <option value="">No doctor selected</option>
            @endif

            @foreach ($doctors as $doctor)
            @if ($doctor->IDKey === $selectedDoctor)
            <option selected="true" value="{{$doctor->IDKey}}">{{$doctor->Name}}</option>
            @else
            <option value="{{$doctor->IDKey}}">{{$doctor->Name}}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>

<div id="Appointments" class="tabcontent">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Doctor</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Other Details</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Patient Name</th>
                        <th>Doctor</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Other Details</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{$appointment->patient->PatName}}</td>
                        <td>{{$appointment->doctor->Name}}</td>
                        <td>{{$appointment->Subject}}</td>
                        <td>{{$appointment->Date}}</td>
                        <td>{{date("H:i",strtotime($appointment->Time))}} - {{date("H:i",strtotime($appointment->EndTime_Expected))}}</td>
                        <td>{{$appointment->Details}} - {{$appointment->Notes}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<div id="Calender" class="tabcontent">
    <div class="dayview-container">
        <div class="dayview-timestrings-container">
            <div class="dayview-timestrings">
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        00:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        01:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        02:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        03:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        04:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        05:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        06:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        07:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        08:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        09:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        10:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        11:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        12:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        13:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        14:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        15:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        16:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        17:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        18:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        19:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        20:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        21:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        22:00
                    </div>
                </div>
                <div class="dayview-timestring-container">
                    <div class="dayview-timestring">
                        23:00
                    </div>
                </div>
            </div>
        </div>
        <div class="dayview-grid-container">
            <div class="dayview-grid">
                <div class="dayview-grid-tiles">
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                    <div class="dayview-grid-tile"></div>
                </div>
                <div class="dayview-now-marker"></div>
                <div class="dayview-grid-marker-start"></div>
                <div class="dayview-gridcell-container">
                    <div class="dayview-gridcell">
                        @foreach ($appointments as $appointment)
                        @if (date('Ymd') == date('Ymd', strtotime($appointment->Date)))
                        <div class="dayview-cell" style="grid-row: {{intval(1 + ((date('H',strtotime($appointment->Time))) * 4) + ((date('i',strtotime($appointment->Time))) / 15))}} / {{intval(1 + ((date('H',strtotime($appointment->EndTime_Expected))) * 4) + ((date('i',strtotime($appointment->EndTime_Expected))) / 15))}};">
                            <div class="dayview-cell-title">{{$appointment->doctor->Name}}</div>
                            <div class="dayview-cell-title">{{$appointment->Subject}}</div>
                            <div class="dayview-cell-time">{{date("H:i",strtotime($appointment->Time))}}-{{date("H:i",strtotime($appointment->EndTime_Expected))}}</div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="dayview-grid-marker-end"></div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
<script src="{{asset('js/appointments.js')}}"></script>

<script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/datatables/datatables-demo.js')}}"></script>
<script src="{{asset('js/calendar.js')}}"></script>
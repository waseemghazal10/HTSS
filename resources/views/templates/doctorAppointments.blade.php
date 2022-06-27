@foreach ($appointments as $appointment)
    <tr class ="bg-white">
        @if(intval($appointment->Status) === 1)
            <td>{{$appointment->patient->IDNum}} | {{$appointment->patient->PatName}}</td>
            <td>{{$appointment->Subject}}</td>
            <td>{{date("H:i",strtotime($appointment->Time))}} <br> {{date("H:i",strtotime($appointment->EndTime_Expected))}}</td>    
            <td>{{$appointment->doctor->Name}}</td>
        @endif
    </tr>
@endforeach 
        
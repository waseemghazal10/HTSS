@foreach ($patients as $patient)
<tr id= "{{$patient -> IDNum}}" onclick = "selectRow(event)">
    <td>{{$patient -> IDNum}} | {{$patient -> PatName}}</td>
    <td class =" h6 small" >{{$patient -> TotalDebit_Pati}}</td> 
    @if (intval( date("Y",strtotime($patient->LastVisit_PatiDate)) ) < 2000)
        <td> No Visit </td>
    @else 
        <td>{{$patient -> VistCount}} | {{date("d-m-Y",strtotime($patient->LastVisit_PatiDate))}}</td>    
    @endif
    <td>
        @if($patient ->Mobile)
            M- {{$patient ->Mobile}}   
        <br>
        @endif 

        @if($patient ->Phon)
            P- {{$patient ->Phon}}
        <br>
        @endif 

        @if($patient ->Email)
            E- {{$patient ->Email}}
        @endif     
    </td>
    <td>{{$patient -> cityArabicName}}</td>
</tr>
@endforeach
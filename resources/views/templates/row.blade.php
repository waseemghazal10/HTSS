@foreach ($patients as $patient)
<tr id= "{{$patient -> IDNum}}" onclick = "selectRow(event)">
    <td>{{$patient -> IDNum}} | {{$patient -> PatName}}</td>
    <td>{{$patient -> TotalDebit_Pati}}</td> 
    <td>{{$patient -> VistCount | $patient -> LastVisitDate}}</td>
    <td>
        M- {{$patient ->Mobile}}
        <br>
        P- {{$patient ->Phon}}
        <br>
        E- {{$patient ->Email}}
    </td>
    <td>{{$patient -> cityArabicName}}</td>
</tr>
@endforeach
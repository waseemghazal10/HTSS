@include('Popups.searchApp')
@include('Popups.doctorAppointments')
<link rel="stylesheet" type="text/css" href="{{ asset('css/addAppointment.css') }}" />

<div class="w-100" >
        @csrf
        <div class="row w-100 align-items-center justify-content-center mb-3">
            <div class="d-flex align-items-center justify-content-center w-75">
                <div class="col-6">
                    <label for="idNum" class="text-danger"> ID Number</label> 
                    <div class="d-flex">
                        <input class="form-control" type="number"  id="idNum" name="idNum" placeholder="Enter ID Number">
                        <button class="ml-2 btn btn-light border border-dark" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></button>
                    </div>
                    
                </div>
                <div class="col-6">
                    <label for="patName" class="text-danger"> Patient Name</label> 
                    <input class="form-control" type="text" id="patName" name="patName" placeholder="Enter Patient Name">
                </div>
            </div>
        </div>

        <div class="row w-100 d-flex align-items-center justify-content-center ">
            <div class="d-flex align-items-center justify-content-center w-75">
                <div class="col-4 d-flex flex-row">
                    <label for="birth" class="text-dark col-3 text-center p-2"> Birth Date</label> 
                    <input type="date" id="birth" name="birth" class="form-control col-9" disabled> 
                </div>
                <div class="col-4 d-flex flex-row">
                    <label for="city" class="text-dark col-2 text-center p-2"> City</label> 
                    <input class="form-control col-10" type="text" id="city" name="city" disabled>
                </div>
                <div class="col-4 d-flex flex-row">
                    <label for="mobile" class="text-dark col-4 text-center p-2"> Mobile Number</label> 
                    <input class="form-control col-8" type="text" id="mobile" name="mobile" disabled>
                </div>
            </div>
        </div>
        <div class = "d-flex">
            <h4 class="mt-3"> Appointment Details </h4>
            <hr class = "w-50 col-9">
        </div>
        
        

        <div class="d-flex w-100">
            <div class="col-6 mt-1">
                <div class = "d-flex row row-flex ml-auto w-75 mb-2">
                    <label for="subject" class="ext-dark col-2 text-center mt-2"> Subject</label> 
                    <input type="text" id="subject" name="subject" class="form-control col-6"> 
                </div>
                <div class = "d-flex row row-flex ml-auto w-75 mb-1">
                    <label for="stTime" class="text-danger col-3 text-center p-2"> Start DateTime</label>
                    <input type="datetime-local" id="stTime" name="stTime" class="form-control col-5">
                    <span class="errorMsg pl-3 mt-2" id="stSpan"></span> 
                </div>
                <div class = "d-flex row row-flex ml-auto w-75">
                    <label for="eTime" class="text-danger col-3 text-center p-2"> End DateTime</label> 
                    <input class="form-control col-5" type="datetime-local" id="eTime" name="eTime">
                    <span class="errorMsg pl-3 mt-2" id="etSpan" ></span> 
                </div>
                
            </div>

            <div class="col-6 mt-1">
                <div class = "d-flex row row-flex mr-auto w-75 mb-2">
                    <label for="doctor" class="text-dark col-2 text-center mt-2"> Doctor</label> 
                    <select class="form-control mr-1 d-flex col-6" name="doctor-selector" id="doctor-selector" >
                        <option value="">No doctor selected</option>
                        @foreach ($doctors as $doctor)
                            @if($doctor -> selected)
                                <option selected value="{{$doctor->IDKey}}">{{$doctor->Name}}</option>
                            @else
                                <option value="{{$doctor->IDKey}}">{{$doctor->Name}}</option>
                            @endif
                        @endforeach
                    </select>
                    <button class="ml-2 btn btn-light border border-dark"><i class="fa fa-plus"></i></button>
                </div>
                <div class = "d-flex row row-flex mr-auto w-75 mb-2">
                    <label for="status" class="text-dark col-2 text-center p-2"> Status</label> 
                        <select class="form-control mr-1 d-flex col-6" name="Status-selector" id="Status-selector" >
                            <option value="1">Waiting</option>
                            <option value="2">Done</option>
                            <option value="3">Canceled</option>
                        </select>
                </div>
                <div class = "d-flex row row-flex mr-auto w-75 mb-2">
                    <button id= "save"class="btn btn-primary col-5 mr-1 ml-4" onclick="addAppointment()">Save</button>
                    <button id="cancel" class="btn btn-danger col-5 " onclick="showAppointments()">Cancel</button>
                </div>
            </div>
        </div>
        
        <div class="row w-100 d-flex align-items-center justify-content-center ">
            <div class="d-flex align-items-center justify-content-center w-75">
                <div class="col-11 d-flex flex-row align-items-center justify-content-center">
                    <label for="details" class="text-dark text-center p-3"> Details</label> 
                    <textarea  id="details" name="details" class="form-control col-8"></textarea>
                </div>
            </div>
        </div>
        <hr class="w-75">
        <div id="doctorAppointments h-100">   
        <div id="Appointments" class="tabcontent w-75">
    <div class="card-body w-75 ml-auto">
        <div class="table-responsive scroll tableRadious" >
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-white">
                    <tr>
                        <th>Patient</th>
                        <th>Subject</th>
                        <th>Time</th>
                        <th>Doctor</th>
                    </tr>
                </thead>
                <tbody id = "tt" >
                    
                </tbody>
            </table>
        </div>
    </div>
</div>       
        </div>
</div>
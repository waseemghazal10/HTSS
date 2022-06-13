@include('Popups.searchApp')
<link rel="stylesheet" type="text/css" href="{{ asset('css/addAppointment.css') }}" />

<div class="w-100" >
        @csrf
        <div class="row w-100 align-items-center justify-content-center mb-5">
            <div class="d-flex align-items-center justify-content-center w-75">
                <div class="col-6">
                    <label for="idNum" class="text-danger"> ID Number</label> 
                    <div class="d-flex">
                        <input class="form-control" type="number"  id="idNum" name="idNum" placeholder="Enter ID Number">
                        <button class="ml-2 btn btn-light border border-dark" data-toggle="modal" data-target="#exampleModalCenter" ><i class="fa fa-search"></i></button>
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

        <hr>

        <div class="row w-100 d-flex align-items-center justify-content-center mb-4">
            <div class="d-flex align-items-center justify-content-center w-75">
                <div class="col-6 d-flex flex-row align-items-center justify-content-center">
                    <label for="status" class="text-dark col-2 text-center p-2"> Status</label> 
                    <select class="form-control mr-1 d-flex col-8" name="Status-selector" id="Status-selector" calss="ml-2">
                        <option value="1">Waiting</option>
                        <option value="2">Done</option>
                        <option value="3">Canceled</option>
                    </select>
                </div>
                <div class="col-6 d-flex flex-row  w-75">
                    <label for="doctor" class="text-dark col-2 text-center p-2"> Doctor</label> 
                    <select class="form-control mr-1 d-flex col-8" name="doctor-selector" id="doctor-selector" calss="ml-2">
                        <option selected="true" value="">No doctor selected</option>
                        @foreach ($doctors as $doctor)
                            <option selected="true" value="{{$doctor->IDKey}}">{{$doctor->Name}}</option>
                        @endforeach
                    </select>
                    <div class="d-flex">
                    <button class="ml-2 mb-2 btn btn-light border border-dark"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row w-100 d-flex align-items-center justify-content-center mb-2">
            <div class="d-flex col-8 align-items-center justify-content-center">
                <label for="subject" class="ext-dark col-1 text-center p-2"> Subject</label> 
                <input type="text" id="subject" name="subject" class="form-control col-8"> 
            </div>
        </div>

        <hr class = "w-75" >
        <h3> Appointment Details </h3>

        <div>
            <div class="row w-100 d-flex align-items-center justify-content-center mb-3">
                <div class="d-flex align-items-center justify-content-center w-75">
                    <div class="col-4 ">
                        <div class="w-100 d-flex flex-row">
                            <label for="stTime" class="text-danger col-4 text-center p-2"> Start DateTime</label>
                            <input type="datetime-local" id="stTime" name="stTime" class="form-control col-8"> 
                        </div>
                        <span class="errorMsg pl-3" id="stSpan"></span> 
                    </div>
                    <div class="col-4">
                        <div class="w-100 d-flex flex-row">
                            <label for="eTime" class="text-danger col-4 text-center p-2"> End DateTime</label> 
                            <input class="form-control col-8" type="datetime-local" id="eTime" name="eTime">
                        </div>
                        <span class="errorMsg pl-3" id="etSpan" ></span> 
                    </div>
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
        <hr>
        <div class="row w-100 align-items-center justify-content-center mb-5">
            <button id= "save"class="btn btn-primary col-3 mr-1" onclick="addAppointment()">Save</button>
            <button id="cancel" class="btn btn-danger col-3 " onclick="showAppointments()">Cancel</button>
            <button id="appo" class="btn btn-secondary col-3 ml-1">Appointments</button>
        </div>
</div>
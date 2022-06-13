<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Search Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                
                <div class="row w-100 d-flex align-items-center justify-content-center mb-5">
                    <div class="w-100 d-flex">
                        <div class="col-2">
                            <label for="fileID" class="text-danger"> File ID</label> 
                            <input class="form-control" type="text" id="fileID" name="fileID" placeholder="Enter File ID">
                        </div>
                        <div class="col-3">
                            <label for="patientName" class="text-danger"> Patient Name</label> 
                            <input class="form-control" type="text" id="patientName" name="patientName" placeholder="Enter Patient Name">
                        </div>
                        <div class="col-4">
                            <label for="com" class="text-danger"> Communication Tools</label> 
                            <div class="flex-row d-flex">
                                <input class="form-control" type="text" id="com" name="com">
                                <select class="form-control mr-1 d-flex" name="doctors-selector" id="doctors-selector" calss="ml-2">
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="text-white">Country</label>
                            <select class="form-control mr-1" name="country-selector" id="country-selector">
                                <option value="country">Not Set - Countries</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row w-100 align-items-center justify-content-center mb-3">
                    <div class="w-100 d-flex">
                        <div class="col-3">
                            <select class="form-control mr-1" name="city-selector" id="city-selector">
                                <option value="city">Not Set - citys</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <input type="checkbox" id="vip" name="vip" class="ml-2 mt-3">
                            <label for="vip" class="ml-2 mt-2">VIP</label><br>
                        </div>
                    </div>
                </div>

                <div id="Appointments" class="tabcontent">
                    <div class="card-body " id="table">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Patient</th>
                                        <th>الدين</th>
                                        <th>Last Visit</th>
                                        <th>Communication Tools</th>
                                        <th>City</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Select</button>
            </div>
        </div>
    </div>
</div>
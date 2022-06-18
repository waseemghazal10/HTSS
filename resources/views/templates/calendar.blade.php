<div id="Calender" class="tabcontent">
    <div class="dayview-container">
        <div class="dayview-timestrings-container">
            <div class="dayview-timestrings">
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
                </div>
                <div class="dayview-gridcell-container">
                    <div class="dayview-gridcell">
                    @foreach ($appointments as $appointment)
                        @if (intval(date('H',strtotime($appointment->Time))) >= 8 &&  intval(date('H',strtotime($appointment->Time))) <= 20)
                        <div class="dayview-cell" style="grid-row: {{intval(1 + ((date('H',strtotime($appointment->Time))) * 4) + ((date('i',strtotime($appointment->Time))) / 15)) - 32}}  / {{intval(1 + ((date('H',strtotime($appointment->EndTime_Expected))) * 4) + ((date('i',strtotime($appointment->EndTime_Expected))) / 15)) - 32}} ;">
                            @if(intval($appointment->Status) === 2)
                                <div class="color d-flex mr-1 p-1 bg-success" ></div>
                            @elseif(intval($appointment->Status) === 3)
                                <div class="color d-flex mr-1 p-1 bg-danger" ></div>
                            @elseif(intval($appointment->Status) === 1)
                                <div class="color d-flex mr-1 p-1 bg-primary" ></div>
                            @endif
                            <div class="dayview-cell-title">{{$appointment->doctor->Name}}</div>
                            <div class="dayview-cell-title">{{$appointment->Subject}}</div>
                            <div class="dayview-cell-time">{{date("H:i",strtotime($appointment->Time))}}-{{date("H:i",strtotime($appointment->EndTime_Expected))}}</div>
                            <!-- <div class="d-flex">
                                <div class="color d-flex mr-1 p-1 bg-success">
                                </div>
                                <div class="color d-flex mr-1 p-1 bg-danger">
                                </div>
                            </div>  -->
                        </div>
                        @endif
                        @endforeach
                                   
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
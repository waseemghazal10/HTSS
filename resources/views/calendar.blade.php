   
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
      rel="stylesheet"/>
      <link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}" />

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
              <div class="dayview-cell" style="grid-row: 3 / 6;">
                <div class="dayview-cell-title">Title</div>
                <div class="dayview-cell-time">17:00-18:00</div>
                <div class="dayview-cell-desc">Description</div>
              </div>
              <div class="dayview-cell" style="grid-row: 5 / 7;">
                <div class="dayview-cell-title">Title</div>
                <div class="dayview-cell-time">17:00-18:00</div>
                <div class="dayview-cell-desc">Description</div>
              </div>
              <div
                class="dayview-cell dayview-cell-extended"
                style="grid-row: 7 / 11;"
              >
                <div class="dayview-cell-title">Title</div>
                <div class="dayview-cell-time">17:00-18:00</div>
                <div class="dayview-cell-desc">Description</div>
              </div>
            </div>
          </div>
          <div class="dayview-grid-marker-end"></div>
        </div>
      </div>
    </div>
    <script>
      // assumes post DomContentLoaded
      document.addEventListener("DOMContentLoaded", () => {
        const d = new Date();
        document.querySelector(".dayview-now-marker").style.top =
          (document
            .querySelector(".dayview-gridcell-container")
            .getBoundingClientRect().height /
            24) *
            (d.getHours() + d.getMinutes() / 60) +
          "px";
      });
    </script>

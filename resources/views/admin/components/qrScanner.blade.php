<div id="qr"class="d-lg-none d-sm-block w-100 fixed-bottom z-2"  style="height: 10%">
    <div class="d-flex justify-content-center h-100 w-100">
        <div style="width: 40%" class="h-100 bg-primary d-flex justify-content-evenly my-auto">
            <button  onclick="Support.Goto('{{ route('admin') }}')" type="button" class="btn btn-primary text-white z-4 {{ $loc==='home' ? 'bg-secondary' : '' }}"> <i style="font-size:1.5rem" class="icon-home"></i> </button>
            <button onclick="Support.Goto('{{ route('adminAttendance') }}')" type="button" class="btn btn-primary text-white {{ $loc==='attendance' ? 'bg-secondary' : '' }} z-3"> <i style="font-size:1.5rem" class="icon-how_to_reg"></i> </button>
        </div>
        <div class="d-flex justify-content-center bg-primary">
            <button data-bs-toggle="modal" onclick=" ScanAttendance('{{ route('scanAttendance') }}')" data-bs-target="#openQr" class="btn btn-primary border-secondary rounded-circle w-100" ><i class="icon-qr_code_scanner" style="font-size:3rem" ></i></button>
        </div>
        <div style="width: 40%" class="h-100 bg-primary d-flex justify-content-evenly my-auto">
            <button onclick="Support.Goto('{{ route('userSetting') }}')" type="button" class="btn btn-primary text-white {{ $loc==='user' ? 'bg-secondary' : '' }} z-4"> <i style="font-size:1.5rem" class="icon-settings"></i> </button>
            <button onclick="Support.Goto('{{ route('adminEmailMonitoring') }}')" type="button" class="btn btn-primary text-white {{ $loc==='emailMonitoring' ? 'bg-secondary' : '' }} z-3"> <i style="font-size:1.5rem" class="icon-mail_outline"></i> </button>
        </div>
    
    </div>
    </div>




<div class="modal fade" id="openQr" tabindex="-1"
aria-labelledby="openQrLabel" aria-hidden="true">
<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title h4" >
                Scan For Attendance
            </h5>
            <button style="filter: brightness(0) invert(1);" type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h5 class="text-center">Core Support Hub</h5>
            <p class="text-center">Attendance Scanner for Core Support Hub Employees</p>
            <div class="mt-4" style="border: 2px solid #c7ae6a" id="qrScanner" style="display: none;"></div>
        </div>
        <div class="modal-footer">
            <button type="button" id="closeQr" class="btn btn-secondary" data-bs-dismiss="modal">
                Close
            </button>
        </div>
    </div>
</div>
</div>
<form method="POST" id="scanAttendance">
    @csrf
    <input type="hidden" name="code" id="code">
    <input type="hidden" name="user_id" value="{{ $user }}">
</form>

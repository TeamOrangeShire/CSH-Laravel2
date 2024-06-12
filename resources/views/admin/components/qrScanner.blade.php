<div id="qr"class="d-lg-none d-sm-block w-100 fixed-bottom z-3"  style="height: 14%">
<div class="d-flex justify-content-center h-100">
    <button data-bs-toggle="modal" onclick=" ScanAttendance('{{ route('scanAttendance') }}')" data-bs-target="#openQr" class="btn btn-primary border-secondary rounded-circle w-25" ><i class="icon-qr_code_scanner" style="font-size:3rem" ></i></button>
</div>
</div>

<div id="bg" class="d-lg-none d-sm-block justify-content-between align-items-center w-100 border fixed-bottom bg-primary z-1" style="height: 10%">
<div class="d-flex justify-content-between h-100 align-items-center w-100">
    <div style="width: 40%" class="h-100 d-flex justify-content-center my-auto">
        <button  type="button" class="btn btn-primary text-white rounded-circle"> <i style="font-size:1.5rem" class="icon-home"></i> </button>
        <button  type="button" class="btn btn-primary text-white rounded-circle"> <i style="font-size:1.5rem" class="icon-how_to_reg"></i> </button>
    </div>
    <div style="width: 40%" class="h-100 d-flex justify-content-center my-auto">
        <button  type="button" class="btn btn-primary text-white rounded-circle"> <i style="font-size:1.5rem" class="icon-settings"></i> </button>
        <button  type="button" class="btn btn-primary text-white rounded-circle"> <i style="font-size:1.5rem" class="icon-mail_outline"></i> </button>
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

function ScanAttendance(route){
document.getElementById('qrScanner').style.display = 'block';

const html5QrCode = new Html5Qrcode('qrScanner');

// Start QR code scanning
html5QrCode.start(
  { facingMode: "environment" },
  {
    fps: 10, // Set frames per second (optional)
    qrbox: 250 // Set size of QR code scanning box (optional)
  },
  qrCodeMessage => {

    document.getElementById('code').value = qrCodeMessage;
    SubmitScannedData(route);

    html5QrCode.stop().then(ignore => {
      document.getElementById('qrScanner').style.display = 'none';
    }).catch(err => console.error(err));
  },
  errorMessage => {
    console.error('Error scanning QR code:', errorMessage);

  }
);
}

function SubmitScannedData(route){
  document.getElementById('mainLoader').style.display = 'grid';
  alertify.set('notifier', 'position', 'top-right')
  $.ajax({
    type: "POST",
    url: route,
    data: $('form#scanAttendance').serialize(),
    success: res=>{
      document.getElementById('mainLoader').style.display = 'none';
      const status = document.getElementById('genStatus');
      const timeIn = document.getElementById('att_time_in');
      const date = document.getElementById('att_date');
      const pic = document.getElementById('statusPic');
      if(res.status === 'success'){
        alertify.success('Attendance Recorded');
        if(res.action === 'login'){
          status.textContent = 'Active';
          status.classList.remove('bg-danger');
          status.classList.add('bg-success');
          timeIn.textContent = res.data[0];
          date.textContent = res.data[1];
          pic.src = 'assets/images/products/product2.jpg';
        }else{
          status.textContent = 'Inactive';
          status.classList.remove('bg-success');
          status.classList.add('bg-danger');
          timeIn.textContent = '--------';
          date.textContent = '--------';
          pic.src = 'assets/images/products/product9.jpg';
        }
        document.getElementById('closeQr').click();
      }else if(res.status === 'StillLogged'){
       alertify.alert('Still Logged In', 'Opppss... Sorry Looks like you are still logged in', ()=>console.log('ok'));
       ScanAttendance(route);
      }else{
        ScanAttendance(route);
        alertify.alert('Not Yet Logged in', 'Opppss... Sorry Looks like you are not yet logged in', ()=>console.log('ok'));
      }
    }, error: xhr =>{
      console.log(xhr.responseText);
    }
  })
}
const User = {
    Details: route => {
        let validity = 0;

        validity += Support.CheckError('fullName', 'fullNameE');
        validity += Support.CheckError('username', 'usernameE');
        validity += Support.CheckError('employeeID', 'employeeIDE');
        validity += Support.CheckError('position', 'positionE');

        if(validity == 4){
            Support.OpenDiv('mainLoader', 'grid');

            $.ajax({
                type:"POST",
                url: route,
                data: $('form#formDetails').serialize(),
                success: res=> {
                   if(res.status === 'success'){
                    Support.CloseDiv('mainLoader');
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success('Successfully Updated User Info');
                   }
                }, error: xhr => console.log(xhr.responseText)
            });
        }
    },ChangePass: route => {
       let validity = 0;

       validity += Support.CheckError('currentPass', 'currentPassE');
       validity += Support.CheckError('newPass', 'newPassE');
       validity += Support.CheckError('confPass', 'confPassE');

       const newPass = document.getElementById('newPass');
       const confPass = document.getElementById('confPass');

      if(validity === 3){
        if(newPass.value === confPass.value){
           Support.OpenDiv('mainLoader', 'grid');
           $.ajax({
            type:"POST",
            url: route,
            data: $('form#changePassForm').serialize(),
            success: res=> {
                alertify.set('notifier', 'position', 'top-center');
                Support.CloseDiv('mainLoader');
               if(res.status === 'success'){
                Support.CloseDiv('mainLoader');
              
                alertify.success('Successfully Updated Password');
                Support.Clear('newPass');
                Support.Clear('currentPass');
                Support.Clear('confPass');
               }else{
                alertify.error('Incorrect Current Password');
               }
            }, error: xhr => console.log(xhr.responseText)
         });
        }else{
          Support.OpenDiv('confPassE', '');
          Support.OpenDiv('newPassE', '');
          Support.AsText('confPassE', 'Password does not match');
          Support.AsText('newPassE', 'Password does not match');

          newPass.classList.add('border', 'border-danger');
          confPass.classList.add('border', 'border-danger');
        }
      }

    }
}
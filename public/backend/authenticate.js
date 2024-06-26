function Login(route, dashboard){
    let validity = 0;

    validity += Support.CheckError('loginUsername', 'usernameE');
    validity += Support.CheckError('loginPassword', 'passwordE');

    if(validity === 2){
       document.getElementById('mainLoader').style.display = 'grid';

       $.ajax({
        type:"POST",
        url: route,
        data: $('form#login').serialize(),
        success: res=>{
            alertify.set('notifier', 'position', 'top-center');
            if(res.status === 'success'){
                window.location.href = dashboard;
            }else if(res.status === 'incorrect'){
                document.getElementById('mainLoader').style.display = 'none';
                alertify.error('Password is Incorrect');
            }else{
                document.getElementById('mainLoader').style.display = 'none';
                alertify.error('Username is not found in the database');
            }
        },error: xhr=>{
            console.log(xhr.responseText);
        }
       })
    }
}

function VerifySignUp(){
    let validity = 0;

    validity += Support.CheckError('username', 'usernameE');
    validity += Support.CheckError('password', 'passwordE');
    validity += Support.CheckError('position', 'positionE');
    validity += Support.CheckError('name', 'nameE');
    validity += Support.CheckError('IDNum', 'IDNumE');

    if(validity === 5){
        $('#AdminConfirm').modal('show');
    }
}

function SignUp(verify, signup, dashboard){
  if(Support.CheckError('superAdmin', 'superAdminE') === 1){
    document.getElementById('mainLoader').style.display = 'grid';
    alertify.set('notifier', 'position', 'top-center');
    $.ajax({
        type:"POST",
        url: verify,
        data: $('form#AdminPass').serialize(),
        success: res=>{
          if(res.status === 'success'){
            $.ajax({
                type:"POST",
                url: signup,
                data: $('form#signup').serialize(),
                success: res=>{
                  if(res.status === 'success'){
                    document.getElementById('mainLoader').style.display = 'none';
                    alertify.success('Account Successfully Created');
                    setTimeout(()=>{
                     window.location.href = dashboard;
                    }, 1000);
                  }
                }, error:xhr =>{
                    console.log(xhr.responseText);
                }
            });
           
          }else{
            document.getElementById('mainLoader').style.display = 'none';
            alertify.error('Super Admin Password is Incorrect');
          }
        }, error:xhr =>{
            console.log(xhr.responseText);
        }
    });
  }
}


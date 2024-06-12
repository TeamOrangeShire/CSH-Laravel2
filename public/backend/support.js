const Support = {
    ShowPass: id => {
        const pass = document.getElementById(id);
        if(pass.type === 'text'){
            pass.type = 'password';
        }else{
            pass.type = 'text';
        }
    },
    CheckError: (inp, err)=>{
        const input = document.getElementById(inp);
        const errs = document.getElementById(err);

        if(input.value === ''){
            input.classList.add('border', 'border-danger');
            errs.style.display = '';
            return 0;
        }else{
            input.classList.remove('border', 'border-danger');
            errs.style.display = 'none';
            return 1;
        }
    }
}
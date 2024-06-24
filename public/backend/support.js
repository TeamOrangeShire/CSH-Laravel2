const Support = {
    ShowPass: (id, input) => {
        const pass = document.getElementById(id);
        if(pass.type === 'text'){
            pass.type = 'password';
              input.innerHTML = `<i class='icon-eye'></i>`
        }else{
            input.innerHTML = `<i class='icon-eye-off'></i>`
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
    },
    CheckStatus: status=>{
        switch(status){
            case "Lead":
                return 'primary';
            case "Prospect":
                return 'secondary';
            case "Discussion":
                return 'warning';
            case "Proposal":
                return 'warning';
            case "Negotiation":
                return 'info';
            case "Contract":
                return 'info';
            case "Won":
                return 'success';
            case "Lost":
                return 'danger';
            case "DNC":
                return 'danger';
        }
    }, OpenDiv: (id, method)=>{
        document.getElementById(id).style.display = method;
    }, CloseDiv: id =>{
        document.getElementById(id).style.display = 'none';
    },OpenOutput: (output, editor)=>{
        const out = document.getElementById(output);

        out.innerHTML =  $('#' + editor).summernote('code');

    }, OpenAdd: (stname, editor, update, save) => {
        stname === 'sigName' ? Support.AsText('updateSignatureHeader', 'Add Signature') : Support.AsText('updateTemplateHeader', 'Add Template');
        if(document.getElementById('activeStatusSignature')){
            document.getElementById('activeStatusSignature').style.display = 'none';
        }
        document.getElementById(stname).value = '';
        $('#' + editor).summernote('empty');
        Support.OpenDiv(save, '');
        Support.CloseDiv(update);
    },
    AsVal: (id, value) => {
        document.getElementById(id).value = value;
    },
      AsText: (id, value) => {
        document.getElementById(id).textContent = value;
    }

}


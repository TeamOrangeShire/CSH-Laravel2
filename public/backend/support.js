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
    },TabSignature: id => {
        const editor = document.getElementById('emailSignatureEditor');
        const output = document.getElementById('emailSignatureOutput');
        const code = document.getElementById('emailSignatureCode');

        if(id === 'editor'){
           
        }else if(id === 'output'){

        }else{
            code.innerHTML = Support.EscapeHtml(emailSignQuill.root.innerHTML);
        }

    },EscapeHtml: html =>{
        return html.replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
    }
}
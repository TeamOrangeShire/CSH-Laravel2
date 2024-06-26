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
    }, SelectAll: (input, rows) => {
        if(input.checked){
            const checkboxes = document.querySelectorAll(rows);
            for (let i = 0; i < checkboxes.length; i++) {
                if (i < 15) {
                    checkboxes[i].checked = true;
                } else {
                    break;
                }
                document.getElementById('leadsSelectCounter').textContent = i+1;  
            }
        }else{
            document.querySelectorAll(rows).forEach(e=>{
                e.checked = false
            });
            document.getElementById('leadsSelectCounter').textContent = 0;  
        }
    }, UpdateSelectedLeads: (select, inp) => {
        var checkboxes = document.querySelectorAll(`input[name="${select}"]`);
        var checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
        var count = checkedCheckboxes.length;
        if(count > 15){
            alertify.set('notifier', 'position', 'top-center');
            alertify.error('Error: You have reached the maximum number of leads to send mail');

            inp.checked = false;
        }else{
            document.getElementById('leadsSelectCounter').textContent = count;  
        }

       
    },AddPlaceholder: (editor, value) => {
        const editableDiv = document.querySelector(editor +'.note-editable'); 
        const sel = window.getSelection();
        const range = sel.getRangeAt(0);
        const startPos = range.startOffset;

        range.deleteContents();
        const newElem = document.createElement('span');
        newElem.innerHTML = value;
        range.insertNode(newElem);

        range.setStartAfter(newElem);
        range.collapse(true);
        sel.removeAllRanges();
        sel.addRange(range);
        editableDiv.focus();

        const cursorPosition = startPos + htmlToInsert.length;
        const newRange = document.createRange();
        newRange.setStart(editableDiv.childNodes[0], cursorPosition);
        newRange.setEnd(editableDiv.childNodes[0], cursorPosition);
        sel.removeAllRanges();
        sel.addRange(newRange);
        editableDiv.focus();
    }, ShowDetails: (but, id) => {
        const list = document.getElementById(id);

        if(list.style.display === 'none'){
            list.style.display = '';
            but.textContent = 'Hide Details';
        }else{
            list.style.display = 'none';
            but.textContent = 'Show Details';
        }
    }, Snackbar: content => {
        const div = document.getElementById('snackBardiv');
        const text = document.getElementById('snackBarContent');
        text.textContent = content;
        div.style.display = 'flex';

        setTimeout(()=>{
          div.style.animation = 'hideSnack 1s';
          setTimeout(()=>{
            div.style.display = 'none';
          }, 1000);
        },2000);
    }
   ,Minimize: () => {
      Support.CloseDiv('progressEmailQueue');
      Support.OpenDiv('minimizeProgressEmailQueue', 'flex');
   },Maximize: ()=>{
    Support.CloseDiv('minimizeProgressEmailQueue');
    Support.OpenDiv('progressEmailQueue', 'grid');
   }, OpenPreview: (route, user) => {
    const temp = document.getElementById('selectMassTemplate');
    const subject = document.getElementById('selectMassSubject');
    
    if(temp.value != 'none' && subject.value != 'none'){
        var myModal = new bootstrap.Modal(document.getElementById('previewTempModal'));
        myModal.show();
       $.ajax({
         type: "GET",
         url: `${route}?temp_id=${temp.value}&sub_id=${subject.value}&user_id=${user}`,
         dataType: "json",
         success: res=> {
            Support.AsText('subPreviewMassEmail',res.sub)
            document.getElementById('tempPreviewMassEmail').innerHTML = res.template;
         }, error: xhr => console.log(xhr.responseText),
       });
    }else{
        Support.Snackbar('No selected Template or subject');
    }

   }
}


const Unsub = route => {
    Support.OpenDiv('mainLoader', 'grid');
    $.ajax({
        type: "POST",
        url: route,
        data: $('form#unsubForm').serialize(),
        success: res=> {
         if(res.status === 'success'){
            Support.CloseDiv('mainLoader');
            Support.OpenDiv('farewell', 'flex');
            Support.CloseDiv('unsubButton');
         }
        }, error: xhr => console.log(xhr.responseText)
    })
}
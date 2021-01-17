const update = (t,e) => {
    e.preventDefault();
    const formElement = $(t).parent().children();

    if(formElement[1].value.trim() === ''){
        alert("Empty field");
        return;
    }

    if(formElement[2].value.trim() === '' ||  !(formElement[2].value.trim().match(/^[0-9]+$/))){
        alert("Value invalid");
        return;
    }

    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Please wait...',
    });

    axios.post(`api/${getCookie('key_api_s')}/tasks/${formElement[0].value.trim()}`,{
        'name': formElement[1].value,
        'times': formElement[2].value,
    }).then(response => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          Toast.fire({
            icon: 'success',
            title: 'Updated successfully'
          })
    }).catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong. Check again',
        });
    });


}

const getCookie = (name) => {
    let pattern = RegExp(name + "=.[^;]*");
    let matched = document.cookie.match(pattern);
    if(matched){
        let cookie = matched[0].split('=')
        return cookie[1];
    }
    return false;
}

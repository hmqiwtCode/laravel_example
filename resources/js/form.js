const email_format = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
const create = (e) => {
    e.preventDefault();  
    const elementForm = $('.register-form').children('input[type=text], input[type=password]');
    if (elementForm[0].value.trim().length < 5) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter value',
        });
        return;
    }

    if (!(elementForm[1].value.trim().match(email_format))) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Invalid Email',
        });
        return;
    }

    if (elementForm[2].value.trim().length < 5) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Password must contain at least 5 characters',
        });
        return;
    }
    axios.post('api/user', {
        'name': elementForm[0].value,
        'email': elementForm[1].value,
        'password': elementForm[2].value,
    }).then(response => {
        const token = response.data.token
        document.cookie = 'token=' + token + '; path=/';
        document.cookie = 'key_api_s=' + response.data.api_key + '; path=/';
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            },
            didClose: () =>{
                $(location).attr('href', 'home');
            }
          })
          Toast.fire({
            icon: 'success',
            title: 'Signed in successfully'
          })
    }).catch(error => {
        console.log(error);
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Email is already in use',
        });
    })
}

const login = (e) => {
    e.preventDefault();
    const elementForm = $('.login-form').children('input[type=text], input[type=password]');

    if (!(elementForm[0].value.trim().match(email_format))) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Invalid Email',
        });
        return;
    }

    if (elementForm[1].value.trim().length < 5) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Password must contain at least 5 characters',
        });
        return;
    }

    axios.post('api/login', {
        'email': elementForm[0].value,
        'password': elementForm[1].value,
    }).then(response => {
        console.log(response.data.api_key);
        const token = response.data.token
        document.cookie = 'token=' + token + '; path=/';
        document.cookie = 'key_api_s=' + response.data.api_key + '; path=/';
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            },
            didClose: () =>{
                $(location).attr('href', 'home');
            }
          })
          Toast.fire({
            icon: 'success',
            title: 'Signed in successfully'
          })
    }).catch(error => {
        console.log(error);
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Your email or password is incorrect.Please try again',
        });
    })

}





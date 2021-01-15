const axios = require('axios');

const create = (e) => {
    e.preventDefault();
    const elementForm = $('.register-form').children('input[type=text], input[type=password]');
    elementForm.each((index, item) => {
        if (item.value.trim() === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter value',
            });
            return;
        }
        if (index === 1) {
            const email_format = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (!(item.value.trim().match(email_format))) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid Email',
                });
                return;
            }
        }
        if (index === 2) {
            if (item.value.trim().length < 5) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password must contain at least 5 characters',
                });
                return;
            }
        }
    });
    axios.get('/user?ID=12345')
        .then(function (response) {
            
            console.log(response);
        })
        .catch(function (error) {
            
            console.log(error);
        })
}

const login = () => {

}

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

    
}
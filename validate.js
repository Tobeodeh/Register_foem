console.log("strimg");

const form = document.getElementById('myForm');
const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');
const email = document.getElementById('email');
const password= document.getElementById('password');
const phoneNumber = document.getElementById('PhoneNumber');
// const gender = document.querySelector(".input-style").value;
let gender = document.myForm.gender;
const language= document.getElementById('language');
const zipCode = document.getElementById('zipCode');
const about= document.getElementById('about');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    validateInputs();
    
});

function setError(input, message){
    const inputControl = input.parentElement;
    const errorDisplay = inputControl.querySelector('small');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.className = 'error';
};

function setSuccess (input) {
    const inputControl = input.parentElement;
    const errorDisplay = inputControl.querySelector('small');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

function validateInputs(){
    const emailValue = email.value.trim();
    const phoneNumberValue = phoneNumber.value.trim();
    const passwordValue = password.value.trim();
    const languageValue = language.options[language.selectedIndex].value.trim();
    const firstNameValue = firstName .value.trim();
    const lastNameValue = lastName.value.trim();
    const zipCodeValue = zipCode.value.trim();
    const aboutValue = about.value.trim();


    if(firstNameValue === ''){
        setError(firstName, 'First Name is required');
    } else{
        setSuccess(firstName);
    }
    
    
    if(lastNameValue === ''){
        setError(lastName, 'Last Name is required');
    }else{
        setSuccess(lastName);}

        const IsEmailValid = email => {
            const re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return re.test(String(email).toLowerCase());
        
        }
    
        
    const IsNumberValid = phoneNumber => {
        let num = /^\d{11}$/;
        if(phoneNumber.value.match(num)){
            return true;
        }
    }
    
    if(emailValue === ''){
        setError(email, 'E-mail is required');
    } else if(!IsEmailValid(emailValue)){
        setError(email, 'Enter a valid E-mail');
    }else{
        setSuccess(email);

    }
    
    if(phoneNumberValue=== ''){
        setError(phoneNumber, 'Phone number is required');
    } else if(phoneNumberValue.length < 11){
        setError(phoneNumber, 'Phone number should be 11 digits');
    }else if (!IsNumberValid(phoneNumber)){
        setError(phoneNumber, 'Phone number is not valid');
    }else{
        setSuccess(phoneNumber);

    }
    
    if(passwordValue === ""){
        setError(password, "password is required")
    }else{
        setSuccess(password)
    }
    
    function checkRadio(){
        let chosenOption = "";
        const len = document.form.gender.length;
        for ( let i = 0;i<len; i++){
            if (document.form.gender[i].checked){
                chosenOption = document.form.gender[i].value;
            }
        }
        if (chosenOption === ""){
            setError(gender, "This field is required")
        }else{
            setSuccess(gender)
        }
    }
    checkRadio();
            console.log(document.querySelectorAll('.success input').length );
        
            if (document.querySelectorAll('.success input').length ===5){
                document.getElementById('form').submit();
            
            }
        
    }







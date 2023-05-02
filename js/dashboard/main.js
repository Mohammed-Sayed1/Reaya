/*
  = what edit i did?
  - login page
  - add form
  - id on button add
*/



///////////////////////////// Burger menu ////////////////////////////////////////////////
function hide() {
    var side = document.getElementById("side");
    side.classList.toggle("translate-position");
}


document.querySelector(".close").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "none";
});

// ///////////////////////////// edit Form ////////////////////////////////////////////////////

// document.getElementById("edit-button").addEventListener("click", function() {
//     document.querySelector(".popup2").style.display = "flex";
// });

// document.querySelector(".close2").addEventListener("click", function() {
//     document.querySelector(".popup2").style.display = "none";
// });
///////////////////////////// Add Form ////////////////////////////////////////////////////

document.querySelector(".close").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "none";
});

document.getElementById("add-button").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "flex";
});

// document.querySelector(".edit").addEventListener("click", function() {
//     document.querySelector(".popup").style.display = "flex";
// });



//////////////////////////// Form Validation /////////////////////////////////////////////
const form = document.getElementById("addForm");
const username = document.getElementById("validateName");
const email = document.getElementById("validateEmail");
const phone = document.getElementById("validatePhone");
const age = document.getElementById("validateAge");
const address = document.getElementById("validateAddress");
const disease = document.getElementById("validateDisease");
// const specialization = document.getElementById("validateSpecialization");
//close//



// prevent submit default behaviour
var check = false;
form.addEventListener("submit", (e) => {
    if (check === false) {
        e.preventDefault();
    }

    validatePatientInputs();
    // validateDoctorInputs();
});

// input is not valid behaviour function
const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector(".error");

    errorDisplay.innerText = message;
    inputControl.classList.add("error");
    inputControl.classList.remove("success");
};

// input is valid behaviour function
const setSuccess = (element) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector(".error");

    errorDisplay.innerText = "";
    inputControl.classList.add("success");
    inputControl.classList.remove("error");
};

// the function regular expression to validate the email
const isValidEmail = (email) => {
    const re =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

// validation patient function
const validatePatientInputs = () => {
    const usernameValue = username.value;
    const emailValue = email.value;
    const phoneValue = phone.value;
    const ageValue = age.value;
    const addressValue = address.value;
    const diseaseValue = disease.value;

    // why checking by typeof doesn't work???????
    if (usernameValue === "" || typeof usernameValue != "string") {
        setError(username, "Username is required");
    } else {
        setSuccess(username);
    }

    if (emailValue === "") {
        setError(email, "Email is required");
    } else if (!isValidEmail(emailValue)) {
        setError(email, "Provide a valid email address");
    } else {
        setSuccess(email);
    }

    if (phoneValue === "") {
        setError(phone, "Phone is required");
    } else if (phoneValue.length < 12) {
        setError(phone, "Phone must be at least 11 character.");
    } else {
        setSuccess(phone);
    }

    if (ageValue === "") {
        setError(age, "Please enter the Age");
    } else {
        setSuccess(age);
    }

    if (addressValue === "") {
        setError(address, "Please enter the address");
    } else {
        setSuccess(address);
    }

    if (diseaseValue === "") {
        setError(disease, "Please enter what you are experiencing");
    } else {
        setSuccess(disease);
    }

    // why it doesn't work?????????
    if (!(
            usernameValue === "" &&
            emailValue === "" &&
            phoneValue === "" &&
            ageValue === "" &&
            addressValue === "" &&
            diseaseValue === ""
        )) {
        // check = true;
    }
};

// why it doesn't work????????
// // validation doctor function
// const validateDoctorInputs = () => {
//   const usernameValue = username.value;
//   const emailValue = email.value;
//   const phoneValue = phone.value;
//   const addressValue = address.value;
//   const specializationValue = specialization.value;

//   // why checking by typeof doesn't work???????
//   if (usernameValue === "" || typeof usernameValue != "string") {
//     setError(username, "Username is required");
//   } else {
//     setSuccess(username);
//   }

//   if (emailValue === "") {
//     setError(email, "Email is required");
//   } else if (!isValidEmail(emailValue)) {
//     setError(email, "Provide a valid email address");
//   } else {
//     setSuccess(email);
//   }

//   if (phoneValue === "") {
//     setError(phone, "Phone is required");
//   } else if (phoneValue.length < 12) {
//     setError(phone, "Phone must be at least 11 character.");
//   } else {
//     setSuccess(phone);
//   }

//   if (addressValue === "") {
//     setError(address, "Please enter the address");
//   } else {
//     setSuccess(address);
//   }

//   if (specializationValue === "") {
//     setError(specialization, "Please enter your specialization");
//   } else {
//     setSuccess(specialization);
//   }
// };
// Name
// Email (Validate email address)
// Phone (should be 10 numbers only)
// Website (Validate URL)



let email_regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

function validate(){
    let u_name = document.getElementById("name").value;
    let u_email = document.getElementById("email").value;
    let u_phone = document.getElementById("phone").value;
    let u_website = document.getElementById("website").value;

    //check for empty entries
    if(u_name === "" || u_email === "" || u_phone === "" || u_website === ""){
        return alert("All fields must be filled !!");
    }

    //validate email address usign regex
    if(!u_email.match(email_regex)){
        return alert("Invalid email!!");
    }

    //validate phone number
    if(u_phone.length < 10 || u_phone.length > 10){
        return alert("Phone number should be of 10 digits!!");
    }

    //check for valid url
    try {
        let u_url = new URL(u_website);
    } catch (error) {
        return alert("Try adding https:// or http:// in the begining");
    }

    alert("Form validated!!");

    //if all above condition passed
    document.getElementById("sbt-btn").classList.remove("disabled");
}



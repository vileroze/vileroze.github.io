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
    let err_prefix = "Error: ";
    let err_msg = document.getElementById("err_msg");

    //check for empty entries
    if(u_name != "" || u_email != "" || u_phone != "" || u_website != ""){

        //validate email address usign regex
        if(u_email.match(email_regex)){
            //validate phone number
            if(u_phone.length === 10){
                //check for valid url
                try {
                    let u_url = new URL(u_website);
                    document.getElementById("sbt-btn").classList.remove("disabled"); //button enabled
                } catch (error) {
                    document.getElementById("sbt-btn").classList.add("disabled");
                    err_msg.innerHTML = err_prefix + "Try adding https:// or http:// in the begining !!";
                }
            }else{
                document.getElementById("sbt-btn").classList.add("disabled");
                err_msg.innerHTML = err_prefix + "Phone number should be of 10 digits !!";
            }
        }else{
            document.getElementById("sbt-btn").classList.add("disabled");
            err_msg.innerHTML = err_prefix + "Invalid email!!";
        }
        
    }else{
        document.getElementById("sbt-btn").classList.add("disabled");
        err_msg.innerHTML = err_prefix + "All fields must be filled !!";
    }

    

    

    

    // //if all above condition passed
    // alert("Form is ready to SUBMIT!!");
    // document.getElementById("sbt-btn").classList.remove("disabled"); //button enabled
}



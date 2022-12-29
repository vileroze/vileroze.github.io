
let email_regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

function validate(){
    let u_name = document.getElementById("name").value;
    let u_email = document.getElementById("email").value;
    let u_phone = document.getElementById("phone").value;
    let u_website = document.getElementById("website").value;
    let err_prefix = "Error: ";
    let err_msg = document.getElementById("err_msg");

    //default colors for errr_msg
    document.getElementById("err_msg").classList.add("text-danger");
    document.getElementById("err_msg").classList.remove("text-success");

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
                    document.getElementById("err_msg").classList.remove("text-danger");
                    document.getElementById("err_msg").classList.add("text-success");
                    err_msg.innerHTML = "Form ready for submission!!";
                } catch (error) {
                    document.getElementById("sbt-btn").classList.add("disabled");
                    err_msg.innerHTML = err_prefix + "Try adding https:// or http:// in the begining of your website !!";
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
}



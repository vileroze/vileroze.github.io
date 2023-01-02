let u_name = document.getElementById("user_name").value;
let house_no = document.getElementById("house_number").value;

//function that returns the number of values in string
function validate(){
    let err = "You can only enter positive whole numbers";
    let err_msg = document.getElementById("err_msg");
    let units = document.getElementById("units").value;
    let submit_btn = document.getElementById("button-submit");
    let string_regex = /[a-zA-Z]/g;
    
    let whole_number_regex = /^-?\d+$/;// 
    
    //setting the error message
    err_msg.innerHTML = err;
    
    //disabling the submit button at the start
    submit_btn.classList.add("disabled");
      
    if(!string_regex.test(units)){
        if(whole_number_regex.test(units)){
            if(units > 0){
                submit_btn.classList.remove("disabled");
                err_msg.innerHTML = "";
            }
        }
    } 
}


function billCalc(){

    //get units
    let units = document.getElementById("units").value;
    let ppu = 0; 
    let power = document.getElementById("power").value;
    let service_charge = 0;


    //check if units empty
    if(units==="" || user_name==="" || house_number === "") return alert("Non of the fields can be empty !!");

    //calculate price per unit and service charge
    if(power == 5){
        if(units>=0 && units<=20){
            service_charge = 30;
            ppu = 3;
        }else if(units>=21 && units<=30){
            service_charge = 50;
            ppu = 7;
        }else if(units>=31 && units<=50){
            service_charge = 75;
            ppu = 8.5;
        }else if(units>=51 && units<=150){
            service_charge = 100;
            ppu = 10;
        }else if(units>=151 && units<=250){
            service_charge = 125;
            ppu = 11;
        }else if(units>=251 && units<=400){
            service_charge = 150;
            ppu = 12;
        }else if(units>400){
            service_charge = 175;
            ppu = 13;
        }
    }else if(power == 15){
        if(units>=0 && units<=20){
            service_charge = 50;
            ppu = 4;
        }else if(units>=21 && units<=30){
            service_charge = 75;
            ppu = 7;
        }else if(units>=31 && units<=50){
            service_charge = 100;
            ppu = 8.5;
        }else if(units>=51 && units<=150){
            service_charge = 125;
            ppu = 10;
        }else if(units>=151 && units<=250){
            service_charge = 150;
            ppu = 11;
        }else if(units>=251 && units<=400){
            service_charge = 175;
            ppu = 12;
        }else if(units>400){
            service_charge = 200;
            ppu = 13;
        }
    }else if(power == 30){
        if(units>=0 && units<=20){
            service_charge = 75;
            ppu = 5;
        }else if(units>=21 && units<=30){
            service_charge = 100;
            ppu = 7;
        }else if(units>=31 && units<=50){
            service_charge = 125;
            ppu = 8.5;
        }else if(units>=51 && units<=150){
            service_charge = 150;
            ppu = 10;
        }else if(units>=151 && units<=250){
            service_charge = 175;
            ppu = 11;
        }else if(units>=251 && units<=400){
            service_charge = 200;
            ppu = 12;
        }else if(units>400){
            service_charge = 225;
            ppu = 13;
        }
    }else if(power == 60){
        if(units>=0 && units<=20){
            service_charge = 125;
            ppu = 6;
        }else if(units>=21 && units<=30){
            service_charge = 150;
            ppu = 7;
        }else if(units>=31 && units<=50){
            service_charge = 175;
            ppu = 8.5;
        }else if(units>=51 && units<=150){
            service_charge = 200;
            ppu = 10;
        }else if(units>=151 && units<=250){
            service_charge = 225;
            ppu = 11;
        }else if(units>=251 && units<=400){
            service_charge = 250;
            ppu = 12;
        }else if(units>400){
            service_charge = 275;
            ppu = 13;
        }
    }

    let total = (units*ppu)+service_charge;
    //display result
    let result = "Your total bill is: " + units + "units X Rs." + ppu + " + Rs."+ service_charge +
                " (service charge)" +" = Rs." + total;
    document.getElementById("bill-result").innerHTML = result;
}
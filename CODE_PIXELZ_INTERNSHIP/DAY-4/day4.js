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

    //get units | ppu -> price per unit
    let units = document.getElementById("units").value;
    let ppu = 0; 
    let power = document.getElementById("power").value;
    let service_charge = 0;
    let result = "Rs.";
    let result_prefix = "";
    //---
    let curr_total = 0;
    let units_remaining = units;
    let temp_units = units_remaining;

    //check if units empty
    if(units===null || units==="") return alert("Units cannot be empty !!");

    if(power == 5){
        //calculate price per unit and service charge 
        let service_charge_arr = [30, 50, 75, 100, 125, 150, 175];
        let ppu_arr = [3, 7, 8.5, 10, 11, 12, 13];
        let unit_ranges = [20,10,20,100,100,150];
        
        let index = 0;
        while(units_remaining > 0){
            service_charge = service_charge_arr[index];
            ppu = ppu_arr[index];

            //units remaining after 350 will be added to "unit_ranges"
            if(index == 5){
                unit_ranges.push(units_remaining);
            }

            //calculating remainig units and current total 
            if(units_remaining - unit_ranges[index] > 0){
                curr_total +=  unit_ranges[index] * ppu;
                units_remaining -= unit_ranges[index];
                result_prefix += unit_ranges[index]+"*"+ppu+" + ";
            }else{
                curr_total += units_remaining * ppu;
                result_prefix += units_remaining+"*"+ppu+" + ";
                units_remaining = 0;
            }
            index++;
        };
    }else if(power == 15){
        //calculate price per unit and service charge 
        let service_charge_arr = [50, 75, 100, 125, 150, 175, 200];
        let ppu_arr = [4, 7, 8.5, 10, 11, 12, 13];
        let unit_ranges = [20,10,20,100,100,150];
        
        let index = 0;
        while(units_remaining > 0){
            service_charge = service_charge_arr[index];
            ppu = ppu_arr[index];

            //units remaining after 350 will be added to "unit_ranges"
            if(index == 5){
                unit_ranges.push(units_remaining);
            }

            //calculating remainig units and current total 
            if(units_remaining - unit_ranges[index] > 0){
                curr_total +=  unit_ranges[index] * ppu;
                units_remaining -= unit_ranges[index];
                result_prefix += unit_ranges[index]+"*"+ppu+" + ";
            }else{
                curr_total += units_remaining * ppu;
                result_prefix += units_remaining+"*"+ppu+" + ";
                units_remaining = 0;
            }
            index++;
        };
    }else if(power == 30){
        //calculate price per unit and service charge 
        let service_charge_arr = [75, 100, 125, 150, 175, 200, 225];
        let ppu_arr = [5, 7, 8.5, 10, 11, 12, 13];
        let unit_ranges = [20,10,20,100,100,150];
        
        let index = 0;
        while(units_remaining > 0){
            service_charge = service_charge_arr[index];
            ppu = ppu_arr[index];

            //units remaining after 350 will be added to "unit_ranges"
            if(index == 5){
                unit_ranges.push(units_remaining);
            }

            //calculating remainig units and current total 
            if(units_remaining - unit_ranges[index] > 0){
                curr_total +=  unit_ranges[index] * ppu;
                units_remaining -= unit_ranges[index];
                result_prefix += unit_ranges[index]+"*"+ppu+" + ";
            }else{
                curr_total += units_remaining * ppu;
                result_prefix += units_remaining+"*"+ppu+" + ";
                units_remaining = 0;
            }
            index++;
        };
    }else if(power == 60){
        //calculate price per unit and service charge 
        let service_charge_arr = [125, 150, 175, 200, 225, 350, 275];
        let ppu_arr = [6, 7, 8.5, 10, 11, 12, 13];
        let unit_ranges = [20,10,20,100,100,150];
        
        let index = 0;
        while(units_remaining > 0){
            service_charge = service_charge_arr[index];
            ppu = ppu_arr[index];

            //units remaining after 350 will be added to "unit_ranges"
            if(index == 5){
                unit_ranges.push(units_remaining);
            }

            //calculating remainig units and current total 
            if(units_remaining - unit_ranges[index] > 0){
                curr_total +=  unit_ranges[index] * ppu;
                units_remaining -= unit_ranges[index];
                result_prefix += unit_ranges[index]+"*"+ppu+" + ";
            }else{
                curr_total += units_remaining * ppu;
                result_prefix += units_remaining+"*"+ppu+" + ";
                units_remaining = 0;
            }
            index++;
        };
    }


    //adding service charge
    result_prefix += service_charge+"(service charge)";
    let total = curr_total + service_charge;

    document.getElementById("bill-result").innerHTML = "Your total charge is:   "+ result_prefix + " = Rs." + total;
}
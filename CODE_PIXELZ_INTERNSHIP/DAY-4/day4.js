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
    //---
    let curr_total = 0;
    let units_remaining = units;

    //check if units empty
    if(units===null || units==="") return alert("Units cannot be empty !!");

    //calculate price per unit and service charge 
    if(power == 5){
        let service_charge_arr = [30, 50, 75, 100, 125, 150, 175];
        let ppu_arr = [3, 7, 8.5, 10, 11, 12, 13];
        let unit_ranges = [20,10,20,100,100,150,0];
        
        let index = 0;
        do {
            service_charge = service_charge_arr[index];
            ppu = ppu_arr[index];

            //calculating remainig units and current total 
            if(units_remaining - unit_ranges[index] >= 0){
                curr_total +=  unit_ranges[index] * ppu;
                units_remaining -= unit_ranges[index];
            }else{
                curr_total += units_remaining * ppu;
            }

            console.log(units_remaining);

            index++;
        }while(units_remaining > 0);

        //-----------working with IF condition
        // if(units_remaining > 0){
        //     service_charge = 30;
        //     ppu = 3;

        //     //calculating remainig and current total
        //     if(units_remaining - 20 >= 0){
        //         curr_total +=  20 * ppu;
        //         units_remaining -= 20;
        //     }else{
        //         curr_total += units_remaining * ppu;
        //     }

        //     if(units_remaining > 0 ){
        //         service_charge = 50;
        //         ppu = 7;
                
        //         //calculating remainig and current total
        //         if(units_remaining - 10 >= 0){
        //             curr_total +=  10 * ppu;
        //             units_remaining -= 10;
        //         }else{
        //             curr_total += units_remaining * ppu;
        //         }

        //         if(units_remaining > 0 ){
        //             service_charge = 75;
        //             ppu = 8.5;

        //             //calculating remainig and current total
        //             if(units_remaining - 20 >= 0){
        //                 curr_total +=  20 * ppu;
        //                 units_remaining -= 20;
        //             }else{
        //                 curr_total += units_remaining * ppu;
        //             }

        //             if(units_remaining > 0 ){
        //                 service_charge = 100;
        //                 ppu = 10;

        //                 //calculating remainig and current total
        //                 if(units_remaining - 100 >= 0){
        //                     curr_total +=  100 * ppu;
        //                     units_remaining -= 100;
        //                 }else{
        //                     curr_total += units_remaining * ppu;
        //                 }

        //                 if(units_remaining > 0 ){
        //                     service_charge = 125;
        //                     ppu = 11;

        //                     //calculating remainig and current total
        //                     if(units_remaining - 100 >= 0){
        //                         curr_total +=  100 * ppu;
        //                         units_remaining -= 100;
        //                     }else{
        //                         curr_total += units_remaining * ppu;
        //                     }

        //                     if(units_remaining > 0 ){
        //                         service_charge = 150;
        //                         ppu = 12;

        //                         //calculating remainig and current total
        //                         if(units_remaining - 150 >= 0){
        //                             curr_total +=  150 * ppu;
        //                             units_remaining -= 150;
        //                         }else{
        //                             curr_total += units_remaining * ppu;
        //                         }
                                
        //                         if(units_remaining > 0 ){
        //                             service_charge = 150;
        //                             ppu = 12;
    
        //                             //calculating remainig and current total
        //                             curr_total += units_remaining * ppu;
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        //----------------------
    }


    //adding service charge
    let total = curr_total + service_charge;
    //display result
    // let result = "Your total bill is: " + units + "units X Rs." + ppu + " + Rs."+ service_charge +
    //             " (service charge)" +" = Rs." + total;
    

    document.getElementById("bill-result").innerHTML = result + total;
}
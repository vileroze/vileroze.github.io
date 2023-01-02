console.log("start");

//displays modal after 5seconds using ".show()" as demonstrated in bootstrap docs.
window.setTimeout(function () { //set timeout to 5 seconds
    //getting a new instance of modal
    var myModal = new bootstrap.Modal(document.getElementById('myModal'));

    

    //triggering the ".show()" event
    myModal.show();
    
}, 5000);


//function that returns the number of values in string
function vowelCount(){

    //get element
    var input_str = document.getElementById("input-str").value;
    var u_name = document.getElementById("u_name").value;
    var curr_date = document.getElementById("curr_date").value;

    //check if element is empty
    if(input_str===null || input_str==="" || u_name==="" || curr_date==="") return alert("All fields must be filled !!");

    //calculate number of vowels
    var result = "Result::: ";
    count = 0;
    vowels = ['a','e','i','o','u'];
    vowel_count = 0;

    for(var i=0; i<input_str.length; i++){
        if(vowels.includes(input_str.charAt(i))){
            console.log("vowel");
            vowel_count++;
        }
    }
    
    //display result
    result += "name:"+u_name + " | vowels:" + vowel_count + " | date:" + curr_date;
    document.getElementById("vowel-result").innerHTML = result;
}
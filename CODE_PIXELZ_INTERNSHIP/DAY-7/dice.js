let count = 0;
let target = 7;

function roll_dice(){
    let score = 0;
    let dice = 0;
    let score_element;
    let curr_player = "";

    //setting turns for each player
    if(count%2 == 0){
        curr_player = "Player 1";
        score_element = document.getElementById("p1_score");
        score = parseInt(document.getElementById("p1_score").innerHTML);
        document.getElementById("turn").innerHTML = "=====Player 2's turn====="
    }else{
        curr_player = "Player 2";
        score_element = document.getElementById("p2_score");
        score = parseInt(document.getElementById("p2_score").innerHTML);
        document.getElementById("turn").innerHTML = "=====Player 1's turn====="
    }

    
    if (score == target) {
        document.getElementById("turn").innerHTML = "==== " + curr_player + " WINS!! =====";
        document.getElementById("roll").classList.add("disabled");
    } 
    else if(score > target){
        let points_over = score - target;
        let temp_score = target - points_over;
        score_element.innerHTML = temp_score;

        roll_dice();

    }else {
        //random number from 1 to 6
        dice = Math.floor(Math.random() * (6 - 1) + 1);

        //display dice roll
        document.getElementById("dice_num").innerHTML = "The dice rolled: "+dice;

        //add it to current players score and display it
        score+=dice;
        score_element.innerHTML = score;
        
        //to know whose turn it is
        count = count+1;
    }
}

function reset(){
    count=0;
    document.getElementById("p1_score").innerHTML = 0;
    document.getElementById("p2_score").innerHTML = 0;
    document.getElementById("roll").classList.remove("disabled");
    document.getElementById("turn").innerHTML = "=====Player 1's turn=====";
    document.getElementById("dice_num").innerHTML = "";
}
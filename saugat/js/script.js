

/* open subscribe page */
function subscribe()
{
	document.querySelector('.pop-up').style.display = 'flex';
}

/* close subscribe page */
function close_pop_up()
{
	document.querySelector('.pop-up').style.display = 'none';
}

/* open reserve page */
function reserve()
{
	document.querySelector('.reserve').style.display = 'flex';


}

function close_reserve()
{
	document.querySelector('.reserve').style.display = 'none';
}



/*reserve form validation */
function validate()
{
	var name = document.getElementById("reserve_name");
	var people = document.getElementById("reserve_people");
	var date = document.getElementById("reserve_date");
	var now = new Date();

	if (name.value == "" || name.value == null) {
		alert("name field cannot be blank");
		return false;
	}

	else if (people.value == "") {
		alert("number of pople field cannot be blank");
		return false;
	}

	else if (people.value < 1){
		alert("number of pople cannot be less than one");
		return false;
	}

	else
	{
		alert("YOUR RESERVATION HAS BEEN BOOKED !!!");
		true;
	}
}


/*subscription form validation */
function validateSub()
{
	var firstName = document.getElementById("first_name");
	var lastName = document.getElementById("last_name");
	var email = document.getElementById("mail");

	if (firstName.value == "" || firstName.value == null) {
		alert("first name field cannot be blank");
		return false;
	}

	else if (lastName.value == "" || lastName.value == null) {
		alert("last name field cannot be blank");
		return false;
	}

	else if (email.value == "" || email.value == null) {
		alert("email cannot be blank");
		return false;
	}

	else
	{
		alert("YOUR RESERVATION HAS BEEN BOOKED !!!");
		true;
	}
}



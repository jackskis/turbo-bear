	var KenyonEvents =
	{
		goToNewRegistration : function(eventObject)
		{
			console.log(eventObject);
		}, //This comma here is super necessary. Don't forget it!!!
		HelloThisIsATestKey : function(eventObject)
		{
			console.log(eventObject);
		}
	};

	//Torbin has stored some some key:value pairs in the KenyonEvents variable
	//To access the values for each key, the syntax is: variable.key
	//output: value
	//In this case, the value in the key:value pair is a function
	$(document).ready(function()
	{
		console.log("It works!");
		$('#register-now-button').on('click', KenyonEvents.goToNewRegistration);
		$('#register-now-button').on('click', KenyonEvents.HelloThisIsATestKey);

	function Vacation(destination)
	{
		this.details = function()
		{
		console.log(destination);
		}
	}
	var paris = new Vacation('Paris');
	paris.details();

	var london = new Vacation('London');
	london.details();
	});
//This will output two objects to the screen with all the click information in it.
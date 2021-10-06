// Defining a function to validate number 

function rolnumber(Roll_Number)
{
  var rollno = /^[1-9]\d{8}$/;
  if(Roll_Number.value.match(rollno))
  {
      return true;
  }
  else
  {
     alert("Not a valid Roll Number, It should starts with digit 1-9 and only 9 digits.");
     return false;
  }
}


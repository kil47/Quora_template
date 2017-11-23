
// whitespace characters
//alert("hi file loaded");
var whitespace = " \t\n\r";
var errorStyle = "color:red;";
var $errorFieldBackColor = "yellow";
var $clearFieldBackColor = "white";
var errorPrefix = "";


function Validated(myDiv)
      {
          //get the elements with rdvalidate
          $formValidatedflag = true;

          $(".rdErrorMessage").html("");
           id="#"+myDiv+" input[rdvalidate]";
           $(id).each(function () {
               
               $(this).css("background-color", $clearFieldBackColor);
               $validationType = $(this).attr("rdvalidate");
               //forceentry,forcenumber,forcedate,forcetime,forceselect,forceemail
               
               switch ($validationType) {

                   case "forceentry":

                       $fl = ForceEntry($(this), $(this).attr("displayFieldName"));
  
                       break;
                   case "forcenumber":

                       $fl = ForceNumber($(this), $(this).attr("displayFieldName"));

                       break;
                   case "forcemoney":

                       $fl = ForceMoney($(this), $(this).attr("displayFieldName"));

                       break;
                   case "forceemail":

                       $fl = ForceEmail($(this), $(this).attr("displayFieldName"));

                       break;
                   case "forcedate":

                       $fl = ForceDate($(this), $(this).attr("displayFieldName"));

                       break;
                   case "forceRdate":

                       $fl = ForceRDate($(this), $(this).attr("displayFieldName"));

                       break;
                   case "forceRemail":

                       $fl = ForceREmail($(this), $(this).attr("displayFieldName"));

                       break;
                   case "forceRnumber":
  
                       $fl = ForceRNumber($(this), $(this).attr("displayFieldName"));

                       break;
                   case "forceradio":

                       $fl = ForceRadio($(this), $(this).attr("displayFieldName"));
  
                       break;
                   case "forcecheckbox":

                       $fl = ForceCheckbox($(this), $(this).attr("displayFieldName"));
  
                       break;
               }
               if ($fl == false) $formValidatedflag = false; 
               //if a condition is not met then set the formflag to false.
           });

           id1 = "#" + myDiv + " select[rdvalidate]";
          
               $(id1).each(function() {
          
              $(this).css("background-color",$clearFieldBackColor);  
              $validationType = $(this).attr("rdvalidate");
              //forceentry,forcenumber,forcedate,forcetime,forceselect,forceemail
            
                  switch ($validationType) {

                      case "forceselect":
            
                      $fl = ForceSelect($(this), $(this).attr("displayFieldName"));

                      break;
                  }
                    if ($fl == false) $formValidatedflag = false; //if a condition is not met then set the formflag to false.
               }); 
              
            id2="#"+myDiv+" textarea[rdvalidate]";
        
          $(id2).each(function() {
              
              $(this).css("background-color",$clearFieldBackColor);  
              $validationType = $(this).attr("rdvalidate");
        
              switch ($validationType) {

                  case "forceentry":
                      
                      $fl = ForceEntry($(this), $(this).attr("displayFieldName"));
        
                      break;    
              }
                if ($fl == false) $formValidatedflag = false; //if a condition is not met then set the formflag to false.
          });    
              
              
              
                
              return $formValidatedflag;

          
    }

/****************************************************************/

// PURPOSE:  Check to see if the string passed in is a valid time.
//	A valid time is defined as a string which is postfixed with either
//  "PM" or "AM".  Next it checks to see if there is a colon in the
//  string.  If there is, it makes sure that at least one digit preceeds
//  it and two proceed it.

	function IsTime(strTime)
	{
		var strTestTime = new String(strTime);
		strTestTime.toUpperCase();

		var bolTime = false;

		if (strTestTime.indexOf("PM",1) != -1 || strTestTime.indexOf("AM",1))
			bolTime = true;

		if (bolTime && strTestTime.indexOf(":",0) == 0)
			bolTime = false;

		var nColonPlace = strTestTime.indexOf(":",1);
		if (bolTime && ((parseInt(nColonPlace) + 5) < (strTestTime.length - 1) || (parseInt(nColonPlace) + 4) > (strTestTime.length - 1)))
			bolTime = false;


		return bolTime;
	}

/****************************************************************/

function replaceAll (s, fromStr, toStr)
{
	var new_s = s;
	for (i = 0; i < 100 && new_s.indexOf (fromStr) != -1; i++)
	{
		new_s = new_s.replace (fromStr, toStr);
	}
	return new_s;
}

/****************************************************************/

/* PURPOSE:  Since we are using the single tick mark as the
	string delimiter to construct our SQL queries, a string with
	a tick mark in it will cause a SQL error.  Therefore we replace
	all "'" with "''", which eliminates the possibility of a SQL error.
*/

function sqlSafe (s)
{
	var new_s = s;
	new_s = replaceAll (new_s, "'", "|");
	new_s = replaceAll (new_s, "|", "''");
	new_s = replaceAll (new_s, "\"", "|");
	new_s = replaceAll (new_s, "|", "''");
	return new_s;
}

/****************************************************************/

function makeSafe (i)
{
	i.value = sqlSafe (i.value);
}

/****************************************************************/

// Check whether string s is empty.

function isEmpty(s)
{   return ((s == null) || (s.length == 0))
}

/****************************************************************/

// Returns true if string s is empty or 
// whitespace characters only.

function isWhitespace (s)

{   var i;

    // Is s empty?
    if (isEmpty(s)) return true;

    // Search through string's characters one by one
    // until we find a non-whitespace character.
    // When we do, return false; if we don't, return true.

    for (i = 0; i < s.length; i++)
    {   
	// Check that current character isn't whitespace.
	var c = s.charAt(i);

	if (whitespace.indexOf(c) == -1) return false;
    }

    // All characters are whitespace.
    return true;
}

/****************************************************************/

// isEmail (STRING s [, BOOLEAN emptyOK])
// 
// Email address must be of form a@b.c ... in other words:
// * there must be at least one character before the @
// * there must be at least one character before and after the .
// * the characters @ and . are both required
//
// For explanation of optional argument emptyOK,
// see comments of function isInteger.
function ForceEmail(objField,displayFieldName)
{
   //  var strField = new String(objField.attr("value"));
    var strField = new String(objField.val());
    
	if (!(isEmail(strField))) {
        //errorMessage = "Invalid Email for" + displayFieldName;
        errorMessage ="Invalid Email"  ;
        DisplayError(objField,errorMessage)
		objField.focus();
		objField.select();
		return false;
	}
	    return true;

}
function isEmail (s)
{   
    
    /*
    if (isEmpty(s)) 
       if (isEmail.arguments.length == 1) return defaultEmptyOK;
       else return (isEmail.arguments[1] == true);
   */
    // is s whitespace?
    if (isWhitespace(s)) return false;
    
    // there must be >= 1 character before @, so we
    // start looking at character position 1 
    // (i.e. second character)
    var i = 1;
    var sLength = s.length;

    // look for @
    while ((i < sLength) && (s.charAt(i) != "@"))
    { i++
    }
    
    if ((i >= sLength) || (s.charAt(i) != "@")) return false;
    else i += 2;
    //alert("hi");
    // look for .
    while ((i < sLength) && (s.charAt(i) != "."))
    { i++
    }

    // there must be at least one character after the .
    if ((i >= sLength - 1) || (s.charAt(i) != ".")) return false;
    else return true;
}

/****************************************************************/

// Checks to see if a required field is blank.  If it is, a warning
// message is displayed...

function ForceEntry(objField, displayFieldName)
{
    
    var strField = new String(objField.val());
	if (isWhitespace(strField)) {
        errorMessage = displayFieldName + " cannot be left blank";
        DisplayError(objField,errorMessage)
		objField.focus();
		objField.select();
		return false;
	}
	    return true;
	
}
		
/****************************************************************/

function ForceSelect(objField,displayFieldName)
{

  //  var strField = new String(objField.attr("value"));
    var strField = new String(objField.val());
    
    id = objField.attr("id");
    option = "#"+id  + " option[@selected]";
    if (strField  < 0)
    {
                           
            errorMessage = "Please select a " + displayFieldName;
            DisplayError(objField,errorMessage)
            objField.focus();
            return false;
        }

       return true;
    
    
    

}


// Returns true if the string passed in is a valid number
//  (no alpha characters), else it displays an error message

function ForceNumber(objField,displayFieldName)
{   //alert("hi");
	//  var strField = new String(objField.attr("value"));
    var strField = new String(objField.val());
	if (isWhitespace(strField)) {
        errorMessage = displayFieldName + " cannot be left blank";
        DisplayError(objField,errorMessage)
		objField.focus();
		objField.select();
		return false;
	}
	
	//if (isWhitespace(strField)) return true;

	var i = 0;
    
	for (i = 0; i < strField.length; i++)
		if (strField.charAt(i) < '0' || strField.charAt(i) > '9') {
			errorMessage = displayFieldName + " must be a valid numeric entry.  Please do not use commas or dollar signs or any non-numeric symbols.";
            DisplayError(objField,errorMessage)
			objField.focus();
			
			return false;
			
		}

       return true;

}

/****************************************************************/

// Returns true if the string passed in is a valid money
//  (no alpha characters except a decimal place), 
//   else it displays an error message

function ForceMoney(objField, FieldName)
{
	//  var strField = new String(objField.attr("value"));
    var strField = new String(objField.val());
	if (isWhitespace(strField)) return true;

	var i = 0;

	for (i = 0; i < strField.length; i++)
		if ((strField.charAt(i) < '0' || strField.charAt(i) > '9') && (strField.charAt(i) != '.')) {
			errorMessage = FieldName + " must be a valid numeric entry.Please do not use commas or dollar signs or any non-numeric symbols.";
			DisplayError(objField,errorMessage);
			objField.focus();
			return false;
		}

	return true;
}


/****************************************************************/

// Right trims the string...  Useful for SQL datatypes of CHAR

function RTrim(strTrim)
{
	var str = new String(strTrim);
	var i = 0;
	var c = "";
	var endpos = 0

	for (i = str.length; i >= 0 && endpos == 0; i = i - 1) {
		c = str.charAt(i);
		if (whitespace.indexOf(c) == -1)
			endpos = i;
	}

	return str.substring(0,endpos+1);
}

/****************************************************************/

/* PURPOSE:  Returns true if the string is a valid date number.
	A method is passed in (1 = month, 2 = day).  If the string is
	nonnumeric, false is passed back.  If the day in the date string
	is greater than 31, false is returned.  If the month is greater
	than 12, an error is returned.
*/

function isDateNumber(strNum,method)
{
	var str = new String(strNum);
	var i = 0;

	if (isNaN(parseInt(str)) || parseInt(str) < 0) return false;

	if (method == 2)
		if (parseInt(str) > 31)
			return false;
	if (method == 1)
		if (parseInt(str) > 12)
			return false;

	for (i = 0; i < str.length; i++)
		if (str.charAt(i) < '0' || str.charAt(i) > '9')
			return false;


	return true;
}

/****************************************************************/

// Displays an alert box with the passed in string...

function PromptErrorMsg(Field,fieldName)
{
	errorMessage = "Invalid Date. " + fieldName + "'s format should be in MM/DD/YYYY format.";
	DisplayError(Field,errorMessage);
	Field.focus();
}

/****************************************************************/

/* PURPOSE: Checks to see if the string is a valid date.  A valid
	date is defined as any of the following:

		MM/DD/YY, MM/DD/YYYY, M/D/YY, M/D/YYYY,
		MM-DD-YY, MM-DD-YYYY, M-D-YY, M-D-YYYY
*/

function ForceDate(objField,strField)
{
	//  var strField = new String(objField.attr("value"));
    var strField = new String(objField.val());

	if (isWhitespace(str)) {
		return true;
		// if the field is empty, just return true...
	}

	var i = 0, count = str.length, j = 0;
	while ((str.charAt(i) != "/" && str.charAt(i) != "-") && i < count)
		i++;

	if (i == count || i > 2) {
		PromptErrorMsg(objField,strField);
		return false;
	}

	var addOne = false;
	if (i == 2) addOne = true;

	if (!isDateNumber(str.substring(0,i),1)) {
		PromptErrorMsg(objField,strField);
		return false;
	}

	j = i+1;
	i = 0;

	while ((str.charAt(i+j) != "/" && str.charAt(j+i) != "-") && i+j < count)
		i++;

	if (i+j == count || i > 2) {
		PromptErrorMsg(objField,strField);
		return false;
	}

	if (!isDateNumber(str.substring(j,i+j),2)) {
		PromptErrorMsg(objField,strField);
		return false;
	}

	j = i+3;
	i = 0;

	if (addOne) j++;

	while (i+j < count)
		i++;


	if (i != 2 && i != 4) {
		PromptErrorMsg(objField,strField);
		return false;
	}

	if (!isDateNumber(str.substring(j,i+j),3)) {
		PromptErrorMsg(objField,strField);
		return false;
	}

	return true;
}

/****************************************************************/

// This function determines if the string passed in is a valid
// US zip code.  It accepts either ##### or #####-####.  If the
// string is valid, it returns true, else false.

function isZipcode(objField,displayFieldName)
{
	//var s = new String(objField.attr("value"));
    //  var strField = new String(objField.attr("value"));
    var s = new String(objField.val());

	if (s.length != 5 && s.length != 10)
		// inappropriate length
		return false;


	for (var i=0; i < s.length; i++)
		if ((s.charAt(i) < '0' || s.charAt(s) > '9') && s.charAt(i) != '-')
		    {   
		        errorMessage = "Invalid Zip Code for " + displayFieldName ; 
		        DisplayError(objField,errorMessage);     
			    return false;
            }
	return true;
}

/****************************************************************/

// This function ensures that a field is less than or equal to the
// Length passed in.  You must call this function with the element
// name in your form (for example: "ForceLength(document.forms[0].txtElement)"
// as opposed to "ForceLength(document.forms[0].txtElement.value)"
// If the field's value is too large, an error message is displayed
// and false is returned, else true is returned.

function ForceMaxLength(objField, nLength, strWarning)
{
	//  var strField = new String(objField.attr("value"));
    var strField = new String(objField.val());

	if (strField.length > nLength) {
		        errorMessage = "Maximum Allowed Length is " + nLength ; 
		        DisplayError(objField,errorMessage);     
		        return false;
	} else
		return true;
}

function ForceMinLength(objField, nLength, strWarning)
{
	//  var strField = new String(objField.attr("value"));
    var strField = new String(objField.val());

	if (strField.length < nLength) {
		        errorMessage = "Minimum Allowed Length is " + nLength ; 
		        DisplayError(objField,errorMessage);     
		        return false;
	} else
		return true;
}
// tobe modified 
function ForceRange(objField, nLength, strWarning)
{
	//  var strField = new String(objField.attr("value"));
    var strField = new String(objField.val());

	if (strField.length > nLength) {
		        errorMessage = "Maximum Allowed Length is " + nLength ; 
		        DisplayError(objField,errorMessage);     
		        return false;
	} else
		return true;
}

function DisplayError(objField,errorMessage)
{    
    //alert( objField.offset().left  + "," + objField.width() );
     //get the x-y coordinates and width of the element
   //  objField.css("background-color",$errorFieldBackColor);
     //xpos = Math.round(objField.position().left + objField.width())  ;
     xpos = Math.round(objField.position().left)  ;
     xpos += 10;
     ypos = Math.round(objField.position().top + objField.height());
     ypos += 15;
     //alert(xpos);
     
     objField.after("<span id='err_"+ objField.attr("id") + "' class='rdErrorMessage' style='position:absolute;display:block;font-size:12px;font-weight:normal;left:"+xpos + "px;top:"+ypos + "px;" + errorStyle + "'   >"+ errorPrefix + errorMessage + "</span>"); 
 
 //objField.after("<span id='err_"+ objField.attr("id") + "' class='rdErrorMessage' style='width:15px;height:15px;background:url(images/err.png);position:absolute;font-size:11px;font-weight:normal;left:"+xpos + ";top:"+ypos + ";" + errorStyle + "' title='"+ errorPrefix + errorMessage + "'  ></span>"); 
 
 
   //  $('body').after("<span id='err_"+ objField.attr("id") + "' class='rdValidationErrorMessage' style='position:absolute;" + errorStyle + "'>"+ errorPrefix + errorMessage + "</span>");
    
   //  $("#err_"+ objField.attr("id")).css({"left":xpos,"top":ypos});
    // $("#"+ objField.attr("id")).css({"margin-bottom":"15px"});
}
//not presently called
function RemovePreviouslySetErrorIfAny(objField)
{
    errorId = "err_" + objField.attr("id") ;
  
}
function ForceRNumber(objField,displayFieldName)
{
    if (ForceEntry(objField,displayFieldName))
        {
            if (ForceNumber(objField,displayFieldName))
                return true;
            else 
                return false;
        }
        else
            return false;
        
}
function ForceRDate(objField,displayFieldName)
{
    if (ForceEntry(objField,displayFieldName))
        {
            if (ForceDate(objField,displayFieldName))
                return true;
            else 
                return false;
        }
        else
            return false;
}
function ForceREmail(objField,displayFieldName)
{
    if (ForceEntry(objField,displayFieldName))
        {
            if (ForceEmail(objField,displayFieldName))
                return true;
            else 
                return false;
        }
        else
            return false;


}
// -->
/****************************************************************/

// Checks to see if a redio is checked or not.  If it is, a warning
// message is displayed...

function ForceRadio(objField, displayFieldName)
{
 
	var strField = new String(objField.attr("name"));
         var flag = false;
         
         $(":radio[name='" + strField + "']").each(function () {
           
            if ($(this).is(":checked")) {
              flag = true;
           
            }
         });
	if (flag==false) {
        errorMessage = "<br />"+displayFieldName + " Please select an option";
        DisplayError(objField,errorMessage)
		objField.focus();
		objField.select();
	    return false;
	}
	    return true;
}

/****************************************************************/

/****************************************************************/

// Checks to see if a checkbox is checked or not.  If is it not, a warning
// message is displayed...

function ForceCheckbox(objField, displayFieldName)
{
    var strField = new String(objField.attr("rdgroup"));
      // alert(strField);
      var flag = false;
      $(":checkbox[rdgroup='" + strField + "']").each(function () {
                  if ($(this).attr("checked") == true) {
                      flag = true;
                  }              
              });
    if (flag==false) {
        errorMessage = "<br />"+displayFieldName + "Please select atleast one option";
        DisplayError(objField,errorMessage)
        objField.focus();
        objField.select();
        return false;
    }
        return true;
}
        
/****************************************************************/
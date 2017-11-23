

// normal ajax submit form
/* sender Id means form Id ,
    receiverId means return output on receiverId like leble,
    url -> php page name,
     reset falg -> form fields empty or not after submited (yes/no)
*/
function ajaxFormSimple(senderId, receiverId, url, resetFlag)
{
    $("#LoadingImage").show();
    senderId1 = '#'+senderId;
    receiverId1 = '#'+receiverId;
    var dataString = $(senderId1).serialize();
    dataString += "&action="+senderId;
    //alert(dataString);
     $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                cache: false,
                success: function(result)
                {
					$(receiverId1).show();
                    $(receiverId1).html(result);
                    if(resetFlag == 'yes' || resetFlag == 'YES')
                    {
                        $(senderId1)[0].reset();
                    }
                    $("#LoadingImage").hide();
                }
     });                    
}


// Div opration ajax submit form
/* sender Id means form Id ,
    receiverId means return output on receiverId like leble,
    url -> php page name,
    showDivId -> after result show anoth hide div (when result successful)
    hideDivId -> after result hide form div (when result successful)
*/
function ajaxFormDivOption(senderId, receiverId, url, showDivId, hideDivId)
{
    senderId1 = '#'+senderId;
    receiverId1 = '#'+receiverId;
    showDivId1 = '#'+showDivId;
    hideDivId1 = '#'+hideDivId;
    
    var dataString = $(senderId1).serialize();
    dataString += "&action="+senderId;
    //alert(dataString);
     $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                cache: false,
                success: function(result)
                {
                    if(receiverId1 != "none")
                    {
                        $(receiverId1).fadeIn();
                        $(receiverId1).html(result);
                    }
                    $(hideDivId1).fadeOut();
                    $(showDivId1).fadeIn();
                }
     });                    
}


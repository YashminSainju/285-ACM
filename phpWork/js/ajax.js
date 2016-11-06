/**
 * Created by Wesley on 11/5/2016.
 */
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
    if (xhr.readyState === 4){
        var users = JSON.parse(xhr.responseText);
        var statusHTML = '<ul class="bulleted">';
        for (var i = 0; i < users.length; i +=1 ){
            if (users[i].active == 'true'){
                statusHTML += '<li class = "in">';
            } else {
                statusHTML += '<li class="out">';
            }
            statusHTML += users[i].firstname;
            statusHTML += '</li>'
        }
        statusHTML += '</ul>';
        document.getELementById('membersList').innerHTML = statusHTML;
    }
};

xhr.open('GET', 'inc/data.json');
xhr.send();

/**jquery**/

$(document).ready(function(){
    var url = "../data/users.json";
    $.getJSON(url,function(response){
        var statusHTML = '<ul class="bulleted">';
        $.each(response, function(index, users){
            if (users[i].active == 'true'){
                statusHTML += '<li class = "in">';
            } else {
                statusHTML += '<li class="out">';
            }
            statusHTML += users[i].firstname;
            statusHTML += '</li>'
        });
        statusHTML += '</ul>';
        $('#employeeList').html(statusHTML);
    });//end getJSON


/**form submission**/
    $(form).submit (function(event){
        event.preventDefault();
        var url = $(this).attr("action");
        var formData = $(this).serialize();
        $.ajax(url,{
            data: formData,
            type: "POST",
            success: function(response){
            $('#signup').html("<p> Thanks for signing up! </p>")
            }
        }); //end post
    });//end submit

/**flickr api**/

     var flickerAPI = "http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
     var flickerOptions = {
       tags: animal,
       format: "json"
     };
     function displayPhotos(data){
        var photoHTML = '<ul>';
         $.each(data.items, function(i,photo){
             photoHTML += '<li class="classHere">';
             photoHTML += '<a href = "'+ photo.link + '" class= "image">';
             photoHTML += '<img src = "' + photo.media.m + '"/></a></li>';
         });//end loop
         photoHTML += '</ul>';
         $('#photos').html(photoHTML);
     }
    $.getJSON(flickerAPI, flickerOptions, displayPhotos);


});//end ready
//DateTime Function
function getDateTime() {
    var now     = new Date(); 
    var year    = now.getFullYear();
    var month   = now.getMonth()+1; 
    var date     = now.getDate();
    var day     = now.getDay()+1;
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds(); 
    switch(month){
        case 1:
        month="January";
        break;
        case 2:
        month="February";
        break;
        case 3:
        month="March";
        break;
        case 4:
        month="April";
        break;
        case 5:
        month="May";
        break;
        case 6:
        month="June";
        break;
        case 7:
        month="July";
        break;
        case 8:
        month="August";
        break;
        case 9:
        month="September";
        break;
        case 10:
        month="October";
        break;
        case 11:
        month="November";
        break;
        case 12:
        month="December";
        break;
        default:
    }
    switch(day){
        case 1:
        day="Sunday"
        break;
        case 2:
        day="Monday"
        break;
        case 3:
        day="Tuesday"
        break;
        case 4:
        day="Wednesday"
        break;
        case 5:
        day="Thursday"
        break;
        case 6:
        day="Friday"
        break;
        case 7:
        day="Saturday"
        break;
        default:
    }  
    if(hour.toString().length == 1) {
        var hour = '0'+hour;
    }
    if(minute.toString().length == 1) {
        var minute = '0'+minute;
    }
    if(second.toString().length == 1) {
        var second = '0'+second;
    }   
    var dateTime = "<strong style='font-size:18px'>"+hour+':'+minute+"</strong><br>"+day+' '+month+' '+date+' '+year;   
    document.getElementById("datetime").innerHTML = dateTime;
}
setInterval(getDateTime,1000); //Call the function every 1000 millisecond i.e. every second

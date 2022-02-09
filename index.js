
        const months = [
            "January", "February",
            "March", "April", "May",
            "June", "July", "August",
            "September", "October",
            "November", "December"
        ];
        const days = [
            "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"
        ];
        setInterval(() => {
            var today = new Date();
            var today_day = today.getDay();
            console.log(today_day);
            var today_hour = today.getHours();
            var today_minute = today.getMinutes();

            if (today_hour < 12) {
               
                if (today_minute < 10) {
                    var today_time = today_hour + " : 0" + today.getMinutes() + "   am";
                    document.getElementById("current_time").innerHTML = today_time;
                } else {
                    var today_time = today_hour + " : " + today.getMinutes() + "   am";
                    document.getElementById("current_time").innerHTML = today_time;
                }

            }
            if (today_hour > 12) {
                if(today_hour>12 && today_hour<=17){
                   
                    if (today_minute < 10) {
                        var today_time = today_hour - 12 + " : 0" + today.getMinutes() + "   pm";
                        document.getElementById("current_time").innerHTML = today_time;
                    } else {
                        var today_time = today_hour - 12 + " : " + today.getMinutes() + "   pm";
                        document.getElementById("current_time").innerHTML = today_time;
                    }
                }
                else{
                   
                    if (today_minute < 10) {
                        var today_time = today_hour - 12 + " : 0" + today.getMinutes() + "   pm";
                        document.getElementById("current_time").innerHTML = today_time;
                    } else {
                        var today_time = today_hour - 12 + " : " + today.getMinutes() + "   pm";
                        document.getElementById("current_time").innerHTML = today_time;
                    }
                }
               
            }

            var today_date = today.getDate() + " " + months[today.getMonth()];
            document.getElementById("current_date").innerHTML = today_date;
            document.getElementById("slogan").innerHTML = days[today_day - 1];
        }, 1000);
  
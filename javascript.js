function loadeventList() { 
	var xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    	   if (this.readyState == 4 && this.status == 200) {
    			var eventJSON = JSON.parse(this.responseText);
          var eventTablediv = document.getElementById("eventTablediv");
          var eventTable = document.createElement("TABLE");
          eventTablediv.appendChild(eventTable);
 
          for(i = 0; i < eventJSON.length; i++){
            var Eid = eventJSON[i].Eid;
            var tablerow = document.createElement("tr");
            var tablehead = document.createElement("th");
            eventTable.appendChild(tablerow);
            tablerow.appendChild(tablehead);
            var textnode = document.createTextNode(eventJSON[i].title);
            tablehead.appendChild(textnode);
            var tablerow = document.createElement("tr");
            var tablehead = document.createElement("td");
            eventTable.appendChild(tablerow);
            tablerow.appendChild(tablehead);
            var textnode = document.createTextNode("Event Info:");
            tablehead.appendChild(textnode);
			
            var tablerow = document.createElement("tr");
            var tablehead = document.createElement("td");
            eventTable.appendChild(tablerow);
            tablerow.appendChild(tablehead);
            var textnode = document.createTextNode("Event Title: " + eventJSON[i].title);
            tablehead.appendChild(textnode);
            var tablehead = document.createElement("td");
            tablerow.appendChild(tablehead);
            var textnode = document.createTextNode("Description: " + eventJSON[i].description);
            tablehead.appendChild(textnode);
			
            var tablerow = document.createElement("tr");
            var tablehead = document.createElement("td");
            eventTable.appendChild(tablerow);
            tablerow.appendChild(tablehead);
            var textnode = document.createTextNode("Event Location: " + eventJSON[i].location);
            tablehead.appendChild(textnode);
            var tablehead = document.createElement("td");
            tablerow.appendChild(tablehead);
            var textnode = document.createTextNode("Event Date: " + eventJSON[i].edate);
            tablehead.appendChild(textnode);

            var tablehead = document.createElement("td");
            tablerow.appendChild(tablehead);
            var butnode = document.createElement("BUTTON");
           
            
            butnode.setAttribute("id","currButton");
           
            butnode.setAttribute("type","button");
            
            butnode.setAttribute("onclick","loadbookingpage("+eventJSON[i].Eid+")");

            var buttexnode = document.createTextNode("Make Booking");

            
            butnode.appendChild(buttexnode);
            tablerow.appendChild(tablehead);
            tablehead.appendChild(butnode);

            
          }
    		}
  		}
  		xhttp.open("POST", "getEventlist.php", true);
  		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  		xhttp.send();
}

function loadbookingpage(n){
      //need to create a hidden form in order to send the get request to the booking page and to redirect the user
      var hidForm, eventId;
      hidForm = document.createElement('form');
      hidForm.action = 'Bookingpage.php';
      hidForm.method = 'get';
      eventId = document.createElement('input');
      eventId.type = 'hidden';
      eventId.name = 'Eid';
      eventId.value = n;
      hidForm.appendChild(eventId);
      document.getElementById('hidden_form_container').appendChild(hidForm);
      hidForm.submit();
    }

function loadbookinglist(){
  window.location.replace("Bookinglist.html");
}
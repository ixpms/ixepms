subtask={
	  getStartedDate : function (argument) {
		// body...
		var date= new Date(),
			month = date.getMonth(),
			day = date.getDate(),
			year =date.getFullYear(),
			hours=date.getHours(), 
			minutes= date.getMinutes(), 
			sec=date.getSeconds(),
			formatted_date = year + '-' + month + '-' + day + " " + hours + ":" + minutes + ":" + sec ;
			alert(formatted_date);
		document.getElementById('start_date_modal').value= formatted_date;
		
		}


} 
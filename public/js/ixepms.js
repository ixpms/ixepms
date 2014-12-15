ixepms={
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
			
		document.getElementById('start_date_modal').value= formatted_date;
	
		},

		createComment : function (argument) {
				
		 // body...
		 alert($('input[name=comment_desc]').val());
		 alert($('input[name=subtask_id]').val());
		  $.ajax({
		    url:"{{{route('comment.store')}}}",
		    method:'post',
		    data:{
		       subtask_id: $('input[name=subtask_id]').val(),
		       comment_desc: $('input[name=comment_desc]').val()
		    },
		    success:function(data){

		       window.location=data;
		    }
		  });
		}


} 
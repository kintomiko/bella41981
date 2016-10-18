$(function() {
			if($('#music_id').val().length > 0){
				$('#title').attr("readonly",true)
			}
		    $('#musicForm').ajaxForm({			
			    beforeSubmit: function(a,f,o) {	
				    var param=false;
				    if($('#title').val().length == 0){			
						$('#title').focus();			
						$('#error_msg').html("歌曲名称必须填写！");			
						$('#error_msg').show("fast");			
						return false;			
					}
				    if($('#music_id').val().length == 0){
				    	var aUrl = $("#paramA").attr("href");
				    	$.ajax({
				    	    type: 'POST',
				    	    url: aUrl,
				    	    async:false,
				    	    data: {title:$('#title').val()} ,
				    	    success: function(data){
					    	    		if(data==true){
					    	    			$('#title').focus();			
											$('#error_msg').html("歌曲已存在！");			
											$('#error_msg').show("fast");
					    	    		}else{
					    	    			param=true;
							    	    }
					    	 		}
				    	});
				    	return param;
				    }
			    },			
			    success: function(data) {	
			    	$.messager.popup(data);
			    	if($('#music_id').val().length == 0){
			    		$('input').each(function(){
				    		$(this).val("");
				    	});
				    	$('textarea').val("");
				    	$('#error_msg').hide("fast");
					}else{
						window.location.href=$('#musicList').attr("href");
					}
			    }			
			});	
		});
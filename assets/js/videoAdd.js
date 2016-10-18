$(function() {
    $('.form_time').datetimepicker({
    	format: "yyyy-mm-dd",
        startView: "year",
        minView: "month",
        maxView: "year",
        language: "zh-CN",
        autoclose: 1
    });
    $('#videoForm').ajaxForm({				
	    beforeSubmit: function(a,f,o) {	
	    },			
	    success: function(data) {			
	    	$.messager.popup(data);
	    	$('input').each(function(){
	    		$(this).val("");
	    	});
	    	$('textarea').val("");
	    	window.location.href=$('#paramA').attr("href");
	    }			
	});	
});
function addvideoUrl(){
	var $remark='<div></br><div style="float:left;"><input type="text" name="description[]" class="input-xlarge" placeholder="描述" style="float:left;width:170px;">';
	var $url=' <input type="text" name="url[]" placeholder="http://90zone.sinaapp.com" class="input-xlarge" style="float:left;width:450px;margin:0 5px;">';
	var $delete='<a href="#myModal" style="float:left;" data-toggle="modal" class="btn deletevideoUrl" onclick="javascript: $(this).parent().parent().remove();">删除</a></div><div>';
	//var $div='<div></div>';
	$('#videoUrl').append($remark+$url+$delete);
	//$('#videoUrl').append($url);
	//$('#videoUrl').append($delete);
	//$('#videoUrl').append('</br>'+$div);
}


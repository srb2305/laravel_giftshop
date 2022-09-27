<h2>search</h2>
<input type="text" id="search_input" placeholder="Enter text here...">
<div id="show_data">
	
</div>


<script src='js/jquery-2.2.3.min.js'></script>
<script type="text/javascript">
	$(document).on('keyup','#search_input',function()
	{
		var val = $('#search_input').val();
		$.ajax({
         type:'get',
         url: 'https://www.srbitsolution.com/api/search-users/'+val,
        // data: data,
         success: function(data) {
            if(data.response.status == true){
               var result = data.response.data;
               console.log(result);
               $('#show_data').html(result);
            }else{
               alert(data.response.message);
            }
         },
         cache: false,
         contentType: false,
         processData: false

      });
	});
</script>
<style type="text/css">
	.hidden{
		display: none;
	}
</style>
<h1>Online Exam</h1>

<h3 class="hidden" id="result">Corrected Answer: 
	<span id="correct_answer">0</span>
</h3>

@foreach($data as $k=>$v)
	<div class="main {{ (($k+1) == 1) ? 'active' : 'hidden'}}" id="div_{{$k+1}}" data-id={{$k+1}}>
	<h4>{{$k+1}} - {{$v['question']}}</h4>
		<p>
			<input type="radio" name="ques_{{$k+1}}" value="{{$v['correct_answer']}}" class="options" data-ans="correct">
			{{$v['correct_answer']}}
		</p>
		@foreach($v['incorrect_answers'] as $val)
		<p>
			<input type="radio" name="ques_{{$k+1}}" value="{{$val}}" class="options" data-ans="incorrect">
		{{$val}}</p>
		@endforeach
	</div>
@endforeach
	<input type="button" id="previous"  value="Previous">
	<input type="button" id="next"  value="Save & Next">


<script src='js/jquery-2.2.3.min.js'></script>
<script type="text/javascript">
	$(document).on('change','.options',function(){
		var correct_ansert = 0;
		for (var i = 1; i <= 5; i++) {
			if($('input[name="ques_'+i+'"]:checked')){
				var ans = $('input[name="ques_'+i+'"]:checked').data('ans');

				if(ans == 'correct'){
					correct_ansert = correct_ansert +1;
				}
				$('#correct_answer').html(correct_ansert);
			}
		}
	});

	$(document).on('click','#next',function(){
		var id = $('.active').data('id');
		var nextId = id+1;
		$('.active').addClass('hidden');	
		$('.active').removeClass('active');
		if(id == 5){
			$('#next').val('Submit Test');
		}
		if(id <= 5){
			$('#div_'+ nextId).removeClass('hidden'); 
			$('#div_'+ nextId).addClass('active');
		}else{
			$('#result').removeClass('hidden');
			$('#next').addClass('hidden');
		}
	});

	$(document).on('click','#previous',function(){
		var id = $('.active').data('id');
		var nextId = id-1;
		$('.active').addClass('hidden');	
		$('.active').removeClass('active');
		
		$('#div_'+ nextId).removeClass('hidden'); 
		$('#div_'+ nextId).addClass('active');
		
	})
</script>
<h1>Online Exam</h1>

<h3>Corrected Answer: 
	<span id="correct_answer">0</span>
</h3>

@foreach($data as $k=>$v)
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
@endforeach

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
</script>
<h1>Online Exam</h1>
@foreach($data as $k=>$v)
	<h4>{{$k+1}} - {{$v['question']}}</h4>
		<p>
			<input type="radio" name="ques_{{$k+1}}" value="{{$v['correct_answer']}}">
			{{$v['correct_answer']}}
		</p>
		@foreach($v['incorrect_answers'] as $val)
		<p>
			<input type="radio" name="ques_{{$k+1}}" value="{{$val}}">
		{{$val}}</p>
		@endforeach
@endforeach
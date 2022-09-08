<a href="{{ url('/') }}">Home</a>
<a href="{{ url('about') }}">About</a>
<a href="{{ url('contact') }}">Contact</a>
<a href="{{ url('feedback') }}">Feedback</a>
<a href="{{ url('contact-all') }}">All Contact</a>
<h1>Welcome</h1>

<?php 
$a = 6;
if($a == 10){
    echo "a is 10";
}else{
    echo "a is not 10";
}
?>
<br>
<h3>If Else</h3>
@if($a == 10)
    a is 10
@else
    a is not 10
@endif       

<h3>IF Condition</h3>
@if($a != 10)
    <b>a is not 10</b>
@endif

<h3>for Loop</h3>
@php
    $limit = 10;
@endphp

@for($i=0;$i<=$limit;$i++)
   Value is = {{ $i }} <br>
@endfor


<h3>Foreach</h3>
@php 
    $array = ['ram','shyam','ramu'];
@endphp

@foreach($array as $val)
    {{ ucfirst($val) }} <br>
@endforeach

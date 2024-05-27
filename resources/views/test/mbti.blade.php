<form method='POST' action='{{route("mbti-result")}}'>
	{{csrf_field()}}
@foreach($questions as $question)
	@foreach($question->choices as $choice)
		@if($loop->first)
		{{$choice->choice}} <input type="radio" name="question_{{$question->id}}" value='{{$choice->id}}'> 
		@else
		<input type="radio" name="question_{{$question->id}}" value='{{$choice->id}}'> {{$choice->choice}}
		@endif
	@endforeach
	<br><br>
@endforeach
	<button>Submit</button>

</form>
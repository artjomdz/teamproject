@extends('welcome')
@php
    // dd($allQuestionsOfuser);
@endphp
@section('content')
    <div class="container">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="submitQuestion">Submit New Question</label>
                    <input name="title" type="text" class="form-control" id="submitQuestion" placeholder="Ask...">
                </div>
                <div class="form-group">
                    <label for="questionBody">Question Details</label>
                    <textarea name="question_body" class="form-control" id="questionBody" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ask</button>
        </form>
        <br>
        <br>
        <br>
        <div class="list-of-questions">
            @foreach ($allQuestionsOfuser as $question)
                <h1>{{ $question->title }}</h1>
            @endforeach
        </div>
    </div>
@endsection
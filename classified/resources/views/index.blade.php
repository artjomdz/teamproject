@extends('welcome')
@php
    // dd($questions)
@endphp
@section('content')
    <section id="banner">
        <div class="container">
            <h1>Questions</h1>
        </div>
    </section>

    <section id="questions">
        <div class="container">

            <div class="question">
                @foreach ($questions as $question)    
                    <div class="question-left">
                            <div class="question-stat">
                                <span>{{ $question->title }}</span>
                                <label>responses</label>
                            </div>
                        </div>
                        <div class="question-right">
                            <div class="question-name">
                                <a href="/questions/{{ $question->id }}">{{ $question->title }}</a>
                            </div>
                            <div class="question-info">
                                {{ $question->created_at }} <a href="">slavo</a>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>
@endsection
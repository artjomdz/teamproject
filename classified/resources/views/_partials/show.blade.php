@extends('welcome')



@section('content')
    <section id="banner" class="banner-sm">
        <div class="container">
            <h1>Questions</h1>
        </div>
    </section>

    <section id="question">
        <div class="container">
            <div class="question-left">
                <div class="user-avatar">
                    <img class="img-fluid"
                        src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png"/>
                </div>
                <div class="user-name">{{$name}}</div>
                <div class="user-stats">
                    <div class="user-stat">
                        <span>{{ $responses }}</span>
                        <label>responses</label>
                    </div>
                    <div class="user-stat">
                        <span>5</span>
                        <label>votes</label>
                    </div>
                </div>

            </div>
            <div class="question-right">
                <h2>{{ $question->title }}</h2>
                <p>{{ $question->text }}</p>
                <form action="{{ route('add.reply', $id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="answer">Submit Your Answer</label>
                        <textarea name="answer_text" class="form-control" id="answer" rows="3"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
        </div>
    </section>

    <section id="answers">
    @foreach ($answers as $answer)
        <div class="container">
            <h2>12 Answers</h2>
            <div class="answer">
                <div class="answer-left">
                    <div class="user-avatar">
                        <img class="img-fluid"
                            src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png"/>
                    </div>
                    <div class="user-name">{{ $answer->user->name }}</div>
                    <div class="user-stats">
                        <div class="user-stat">
                            <span>3</span>
                            <label>responses</label>
                        </div>
                        <div class="user-stat">
                            <span>5</span>
                            <label>votes</label>
                        </div>
                    </div>
                </div>
                <div class="answer-right">
                    {{ $answer->text }}
                </div>
                <div class="votes">
                    <span>Rating:</span> <!-- the `rating` column in the answer -->
     
                    <form action="{{ route('answers.vote', $answer->id)  }}" method="post">
                        @csrf
                        <input type="submit" name="up" value="+1">
                        <input type="submit" name="down" value="-1">
     
                    </form>
                </div>
            </div>

        </div>
    @endforeach
    </section>
@endsection
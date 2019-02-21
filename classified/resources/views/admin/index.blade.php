@extends('welcome')

@section('content')
    <div class="container">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="submitQuestion">Question</label>
                    <input name="title" type="text" class="form-control" id="submitQuestion" placeholder="You are stupid">
                </div>
                <div class="form-group">
                    <label for="questionBody">Example textarea</label>
                    <textarea name="question_body" class="form-control" id="questionBody" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ask</button>
        </form>
    </div>
@endsection
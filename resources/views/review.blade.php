<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/style.css') }}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <title>Drive</title>

  </head>
  <body>

    <div>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>

    <div>
      <p>Write a review for: {{ $instructor->first_name }}</p>

      <form method="POST" action="review/{{ $instructor->instructor_id }}">
        {!! csrf_field() !!}
        <div class="stars">
          <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
          <label class="star star-5" for="star-5"></label>
          <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
          <label class="star star-4" for="star-4"></label>
          <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
          <label class="star star-3" for="star-3"></label>
          <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
          <label class="star star-2" for="star-2"></label>
          <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
          <label class="star star-1" for="star-1"></label>
        </div>

        <div class="form-group">
          <textarea class="form-control" rows="3" name="review">{{ old('review') }}</textarea>
        </div>

        <!-- Hidden form field for instructor_id -->
        <div><input type="hidden" name="instructor_id" value="{{ $instructor->instructor_id }}"></div>

        <div>
            <button type="submit">Submit</button>
        </div>
      </form>
    </div>

    



    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
  </body>
</html>
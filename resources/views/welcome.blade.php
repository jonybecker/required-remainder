<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Required Remainder</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Styles -->
        <style>
        </style>
    </head>
    <body class="antialiased">
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/" method="post" class="form-control">
                    @csrf

                    <h3>Enter input to be calculated</h3>
                    <label for="tasks">StdIn</label>
                    <textarea name="tasks" class="form-control" id="tasks" rows="10">{{ $tasks ?? '7
7 5 12345
5 0 4
10 5 15
17 8 54321
499999993 9 1000000000
10 5 187
2 0 999999999
' }}</textarea>
                    <input type="submit" value="Submit" class="form-control btn-primary">
                </form>
            </div>
        </div>

        @if(!empty($exceptionMessage))
            <div class="row">
                <div class="col">
                        <div class="alert alert-danger">{{ $exceptionMessage }}</div>
                </div>
            </div>
        @endif

        @if(!empty($solved))
            <div class="row">
                <div class="col">
                    <h3>The result is:</h3>
                    <pre>{{ $solved }}</pre>
                </div>
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>

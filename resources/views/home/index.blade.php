<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container p-4">
        <h1 class="text-center">Image Optimizer!</h1>

        @if(\Illuminate\Support\Facades\Session::has('status'))

        <div class="alert alert-success">
            <b>{{ \Illuminate\Support\Facades\Session::get('status') }}</b>
        </div>
            <div class="mt-5">
                <a href="{{ asset('uploads/'.\Illuminate\Support\Facades\Session::get('filename')) }}" download>
                    <button class="btn form-control btn-success" type="button">Download</button>
                </a>
            </div>

        @else

            <div class="text-center mt-4">
                <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">Choose an Image:</label>
                        <input accept="image/*" oninput="showDetails()" type="file" name="image" id="image" class="form-control">
                    </div>
                    <div style="display: none" class="mt-4 p-2 border" id="details">
                        <h3>Config Box:</h3>
                        <div class="form-group mt-3">
                            <label for="width">Width(px):</label>
                            <input type="number" name="width" id="width" class="form-control" placeholder="Enter Image width px">
                        </div>
                        <div class="form-group mt-3">
                            <label for="height">Height(px):</label>
                            <input type="number" name="height" placeholder="Enter Image Height px" id="height" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="compress">Compress (<span id="compressPercent">20%</span>):</label>

                            <input oninput="changeRange()" type="range" name="compress" id="compress" class="form-control" min="0" max="100" value="20">
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" value="Start" class="form-control btn btn-success">
                        </div>
                    </div>
                </form>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

        @endif

    </div>

{{--    Scripts --}}
<script src="{{ asset('js/app.js') }}"></script>
    <script>
        function showDetails() {
            let details = document.querySelector('#details');
            details.style.display = 'block';
            console.log(details.style.display);
        }

        function changeRange() {
            let rangeInput = document.querySelector("input[type='range']").value;
            document.querySelector("span#compressPercent").innerHTML = rangeInput+"%";
        }
    </script>
</body>
</html>

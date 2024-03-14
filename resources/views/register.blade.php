<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- Add or Remove Button-->
    <script src="{{ asset('js/add.js') }}"></script>
    <!--Fontawos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        referrerpolicy="no-referrer" />
    <title>Assessment Test</title>
</head>

<body>
    <div class="container">
        <div class="card-header">
            <h3>Registration From</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday" required><br><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" minlength="8" required><br>

                <label for="skills">Skill Set:</label><br>
                <input type="checkbox" id="php" name="skills[]" value="PHP">
                <label for="php">PHP</label><br>
                <input type="checkbox" id="csharp" name="skills[]" value="C#">
                <label for="csharp">C#</label><br>
                <input type="checkbox" id="java" name="skills[]" value="JAVA">
                <label for="java">JAVA</label><br>
                <!-- Add checkboxes for other skills here -->

                <label for="division">Division:</label>
                <select id="division" name="division" required>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->name }}">{{ $division->name }}</option>
                    @endforeach
                </select><br><br>

                <label for="district">District:</label>
                <select id="district" name="district" required>
                    @foreach($districts as $district)
                <option value="{{ $district->name }}">{{ $district->name }}</option>
            @endforeach
                </select><br><br>

                <div id="languages">
                    <label for="language1">Favorite Programming Language:</label>
                    <div class="field_wrapper">
                        <div>
                            <input type="text" name="field_name[]" value="" />
                            <a href="javascript:void(0);" class="add_button" title="Add field"><i
                                    class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                </div><br>

                <label for="image">Image Upload:</label>
                <input type="file" id="image" name="image" accept="image/*" required><br><br>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <script>
        < script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" >
    </script>
</body>

</html>

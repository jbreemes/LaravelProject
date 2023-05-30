<!-- resources/views/register-employee.blade.php -->
<html>
    <head>
        <style>
            body {
                background-color: #e7b7a3;
                color: #1a1a1a;
                font-family: 'Courier New', Courier, monospace;
                font-size: 16px;
                padding: 10px;
            }

            h1 {
                font-size: 32px;
                margin-bottom: 20px;
                border-bottom: 3px solid black;
            }

            label {
                display: block;
                margin-bottom: 10px;
            }

            input[type="text"], input[type="email"], input[type="password"], input[type="password_confirmation"] {
                display: block;
                margin-bottom: 20px;
                padding: 10px;
                border-radius: 4px;
                border: none;
                background-color: #d9927e;
                color: #1a1a1a;
                width: 100%;
            }

            button[type="submit"] {
                background-color: #1a1a1a;
                color: #e7b7a3;
                border: none;
                padding: 10px 20px;
                border-radius: 4px;
                cursor: pointer;
            }

            button[type="submit"]:hover {
                background-color: #d9927e;
                color: #1a1a1a;
            }
        </style>
        </style>
        <title>Register Employee</title>
    </head>
    <body>
        <h1>Register an Employee</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register-employee') }}">

            @csrf
            @if (session('success'))
             <div class="alert alert-success">
               {{ session('success') }}
             </div>
            @endif


            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div>
                <button type="submit">Register</button>
            </div>
        </form>
    </body>
</html>

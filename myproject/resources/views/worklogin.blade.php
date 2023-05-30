<html>
<head>
<style>
        body {
            background-color: #4a0707; /* Dark red */
            color: #ffebcd; /* Antique white */
            font-family: 'Courier New', monospace;
        }
        h1 {
            text-align: center;
            font-size: 3rem;
            margin-top: 2rem;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 2rem;
        }
        label {
            font-size: 1.2rem;
            color: #ffebcd; /* Antique white */
        }
        input[type="email"],
        input[type="password"] {
            padding: 0.5rem;
            font-size: 1.2rem;
            border: none;
            border-radius: 0.25rem;
            margin-bottom: 1rem;
            background-color: #8b0000; /* Dark red */
            color: #ffebcd; /* Antique white */
        }
        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: #ffebcd; /* Antique white */
        }
        button[type="submit"] {
            background-color: #ffebcd; /* Antique white */
            color: #4a0707; /* Dark red */
            padding: 0.5rem 1rem;
            font-size: 1.2rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            margin-top: 1rem;
        }
        button[type="submit"]:hover {
            background-color: #d2691e; /* Chocolate */
            color: #ffebcd; /* Antique white */
        }
        .alert {
            background-color: #ffebcd; /* Antique white */
            color: #4a0707; /* Dark red */
            padding: 0.5rem 1rem;
            margin-top: 1rem;
            border-radius: 0.25rem;
            border: 2px solid #4a0707; /* Dark red */
        }
        .alert ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .alert li {
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
<h1>Login</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('work-login-submit') }}">


    @csrf

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
</body>
</html>

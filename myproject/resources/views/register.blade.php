<html>

<head>
<style>
    body {
      background-color: #FFDAB9; /* PeachPuff */
      color: #8B4513; /* SaddleBrown */
      font-family: 'Georgia', serif;
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
    }
    input[type="email"],
    input[type="password"] {
      padding: 0.5rem;
      font-size: 1.2rem;
      border: none;
      border-radius: 0.25rem;
      margin-bottom: 1rem;
      background-color: #FFF8DC; /* Cornsilk */
    }
    button[type="submit"] {
      background-color: #CD5C5C; /* IndianRed */
      color: #FFF;
      padding: 0.5rem 1rem;
      font-size: 1.2rem;
      border: none;
      border-radius: 0.25rem;
      cursor: pointer;
      margin-top: 1rem;
      border: 2px solid #8B4513; /* SaddleBrown */
    }
    button[type="submit"]:hover {
      background-color: #8B0000; /* DarkRed */
    }
    a {
      font-size: 1.2rem;
      color: #8B4513; /* SaddleBrown */
      text-decoration: none;
      margin-top: 1rem;
    }
    a:hover {
      color: #CD5C5C; /* IndianRed */
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #CD5C5C; /* IndianRed */
      color: #FFF;
      padding: 1rem;
    }
    .header h2 {
      margin: 0;
      font-size: 2rem;
      font-weight: normal;
    }

  </style>

</head>

<body>
<h1>Register</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf

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
        <button type="submit">Register</button> <br>
    </div>

    <div>Already have an account? <a href="{{ route('login') }}">Login here</a></div>
</form>

    
</div>

</body>

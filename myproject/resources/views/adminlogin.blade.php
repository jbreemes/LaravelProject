
<head>
<style>
    body {
      background-color: #f5e9d4; /* Light Peach */
      font-family: 'Courier New', Courier, monospace;
    }
    
    .card-body {
      background-color: #e29578; /* Terra Cotta */
      padding: 2rem;
      border-radius: 0.5rem;
    }
    
    label {
      color: #e84a5f; /* Red Pigment */
      font-size: 1.2rem;
    }
    
    input[type="email"],
    input[type="password"] {
      padding: 0.5rem;
      font-size: 1.2rem;
      border: none;
      border-radius: 0.25rem;
      margin-bottom: 1rem;
      background-color: #f7d8c2; /* Apricot */
    }
    
    button[type="submit"] {
      background-color: #e84a5f; /* Red Pigment */
      color: #f5e9d4; /* Light Peach */
      padding: 0.5rem 1rem;
      font-size: 1.2rem;
      border: none;
      border-radius: 0.25rem;
      cursor: pointer;
      margin-top: 1rem;
      transition: background-color 0.3s ease-in-out;
    }
    
    button[type="submit"]:hover {
      background-color: #b83b5e; /* Persian Red */
    }
    
    .alert {
      background-color: #e29578; /* Terra Cotta */
      color: #f5e9d4; /* Light Peach */
      border: none;
      border-radius: 0.5rem;
      padding: 1rem;
      margin-bottom: 1rem;
    }
    
    .alert ul {
      margin: 0;
      padding: 0;
      list-style: none;
    }
    
    .alert li {
      margin-bottom: 0.5rem;
    }
  </style>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card-body">
<form method="POST" action="{{ route('admin-login-submit') }}">


        @csrf

        <div>
        <label for="email">Emaill:</label>
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
</div>
</body>
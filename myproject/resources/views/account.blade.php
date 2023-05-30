<html>

<head>
<style>
    /* Add retro-style colors */
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

    .container {
        background-color: #d9927e;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 40px;
        border: 5px solid black;
    }

    .form-label {
        margin-bottom: 10px;
        display: block;
    }

    .form-control {
        display: block;
        margin-bottom: 20px;
        padding: 10px;
        border-radius: 4px;
        border: none;
        background-color: #e7b7a3;
        color: #1a1a1a;
        width: 100%;
    }

    .btn {
        background-color: #1a1a1a;
        color: #e7b7a3;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #1a1a1a;
        color: #e7b7a3;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #d9927e;
        color: #1a1a1a;
    }

    .alert-success {
        background-color: #7ab7a5;
        color: #1a1a1a;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
        border: 3px solid black;
    }
</style>
</head>

<body> 

<div class="container">
        <h1>Account</h1>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('account.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Naam:</label>
                <input type="text" name="name" class="form-control" value="{{ $Klant->name }}" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Achternaam:</label>
                <input type="text" name="lastname" class="form-control" value="{{ $Klant->lastname }}" required>
            </div>
            <div class="mb-3">
                <label for="Adres" class="form-label">Adres:</label>
                <input type="text" name="Adres" class="form-control" value="{{ $Klant->Adres }}" required>
            </div>
            <div class="mb-3">
                <label for="Tel" class="form-label">Tel:</label>
                <input type="text" name="Tel" class="form-control" value="{{ $Klant->Tel }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Account</button>
        </form>
    </div>

</body>

</html>
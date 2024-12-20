

<style>

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #333;
    }

    .container {
        background-color: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #4b6584;
    }

    .form-container input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .form-container button {
        width: 100%;
        padding: 10px;
        background-color: #4b6584;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 18px;
        cursor: pointer;
    }

    .form-container button:hover {
        background-color: #34495e;
    }

    .form-container p {
        text-align: center;
    }

    .form-container a {
        color: #20bf6b;
        text-decoration: none;
    }

    .form-container a:hover {
        text-decoration: underline;
    }

</style>


<div class="container">
    <div class="form-container">
        <h2>Login</h2>
        <form action="?c=Auth&m=login" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
            <p>Belum punya akun? <a href="?c=Auth&m=registerForm">Daftar sekarang</a></p>
        </form>
    </div>
</div>


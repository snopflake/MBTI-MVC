<?php
class AuthController
{
    private $userModel;

    public function __construct()
    {

        $this->userModel = new UserModel();
    }

    public function loginForm()
    {
        include 'view/auth/login.php';
    }

    public function registerForm()
    {
        include 'view/auth/register.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['loggedin'] = true; // Tandai pengguna telah login
                $_SESSION['username'] = $username;

                header('Location: ?c=Mbti&m=index'); // Redirect ke halaman utama
                exit();
            } else {
                echo "Login gagal. Username atau password salah.";
            }
        }
    }


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if ($this->userModel->createUser($username, $email, $password)) {
                header('Location: ?c=Auth&m=loginForm');
                exit();
            } else {
                echo "Registrasi gagal.";
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy(); 
        header('Location: ?c=Auth&m=loginForm'); 
        exit();
    }
    
}
?>

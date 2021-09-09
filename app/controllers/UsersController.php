<?php
    Class UsersController extends Controller {
        
        public function __construct() {
            $this->userModel = $this->model('UserModel');
        }

        public function login() {

            if(isLoggedIn()) {
                header('location: '. URLROOT .'/posts/feed');
            }

            $data = [
                'emailError' => '',
                'passwordError' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'emailError' => '',
                    'passwordError' => ''
                ];

                if(empty($data['email'])) {
                    $data['emailError'] = 'Plese enter email';
                }

                if(empty($data['password'])) {
                    $data['passwordError'] = 'Plese enter password';
                }

                if(empty($data['emailError']) && empty($data['passwordError'])) {
                    $loggInUser = $this->userModel->Login($data);

                    if($loggInUser) {
                        $this->createUserSession($loggInUser);
                    } else {
                        $data['emailError'] = "Password or email is incorrect. Please try again";

                        $this->view('/users/login', $data);
                    }
                } 
            }

            $this->view('/users/login', $data);
        }

        public function register() {

            if(isLoggedIn()) {
                header('location: '. URLROOT .'/posts/feed');
            }

            $data = [
                'nameError' => '',
                'surnameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['name']),
                    'surname' => trim($_POST['surname']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['password-confirm']),
                    'date' => date("Y-m-d H:i:s"),
                    'nameError' => '',
                    'surnameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => ''
                ];

                $nameValidation = "/^[a-zA-Z]*$/";
                $passwordValidation = "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/";

                if(empty($data['name'])) {
                    $data['nameError'] = 'Please enter name';
                } elseif (!preg_match($nameValidation, $data['name'])) {
                    $data['nameError'] = 'Name can only contain letters';
                }

                if(empty($data['surname'])) {
                    $data['surnameError'] = 'Please enter surname';
                } elseif (!preg_match($nameValidation, $data['surname'])) {
                    $data['surnameError'] = 'Surname can only contain letters';
                }

                if(empty($data['email'])) {
                    $data['emailError'] = 'Please enter email address';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = 'Please enter valid email';
                } else {
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['emailError'] = 'email already registered';
                    }
                }

                if(empty($data['password'])) {
                    $data['passwordError'] = 'Please enter password';
                } elseif (!preg_match($passwordValidation, $data['password'])) {
                    $data['passwordError'] = 'Password does not match the requirements!';
                }

                if(empty($data['confirmPassword'])) {
                    $data['confirmPasswordError'] = 'Please enter password';
                } else {
                    if($data['password'] != $data['confirmPassword']) {
                        $data['confirmPasswordError'] = 'Passwords do not match';
                    }
                }

                if(empty($data['nameError']) && empty($data['surnameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['condirmPasswordError'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if($this->userModel->register($data)) {
                        header('location: '. URLROOT .'/users/login');
                    } else {
                        die('Something went wrong.');
                    }
                }
            }

            $this->view('/users/register', $data);
        }

        public function createUserSession($user) {
            session_start();
            $_SESSION['user_id'] = $user->id;
            $_SESSION['email'] = $user->email;
            $_SESSION['fullName'] = $user->name . " " . $user->surname;
            header('location: '. URLROOT .'/posts/feed');
        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['email']);
            unset($_SESSION['fullName']);
            header('location: '. URLROOT .'/page/index');
        }
    }

?>
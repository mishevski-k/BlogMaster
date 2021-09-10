<?php 

class PostsController extends Controller {

    public function __construct() {
        $this->postModel = $this->model('PostModel');
    }

    public function index() {
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view('/posts/feed', $data);
    }

    public function feed() {
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view('/posts/feed', $data);
    }

    public function post($id) {
        

        if($post = $this->postModel->getPost($id)) {
            $data= [
                'post' => $post
            ];

            $this->view('/posts/post', $data);
        } 
    }

    public function new() {
        $data = [
            'titleError' => '',
            'contentError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'description' => '',
                'date' => date("Y-m-d H:i:s"),
                'titleError' => '',
                'contentError' => ''
            ];

            if(empty($data['title'])) {
                $data['titleError'] = "Please insert post title";
            }

            if(empty($data['content'])) {
                $data['contentError'] = "Please insert post content";
            }

            if(strlen($data['content']) > 255) {
                $data['description'] = substr($data['content'], 0, 254);
            } else {
                $data['description'] = $data['content'];
            }   

            if(empty($data['titleError']) && empty($data['contentError'])) {
                if($this->postModel->newPost($data)) {
                    header('location: '. URLROOT .'/posts/feed');
                } else {
                    die('Something went wrong.');
                }
            }
        }

        $this->view('/posts/new', $data);
    }

    public function update($id) {
        $post = $this->postModel->getPost($id);

        $data = [
            'post' => $post,
            'titleError' => '',
            'contentError' => ''
        ];

        if($_SESSION['user_id'] != $post->user_id) {
            header('location: '. URLROOT .'/posts/feed');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'description' => '',
                'id' => $post->id,
                'titleError' => '',
                'contentError' => '',
                'date' => date("Y-m-d H:i:s")
            ];

            if(empty($data['title'])) {
                $data['titleError'] = "Please insert post title";
            }

            if(empty($data['content'])) {
                $data['contentError'] = "Please insert post content";
            }

            if(strlen($data['content']) > 255) {
                $data['description'] = substr($data['content'], 0, 254);
            } else {
                $data['description'] = $data['content'];
            }   

            if(empty($data['titleError']) && empty($data['contentError'])) {
                if($this->postModel->updatePost($data)) {
                    header('location: '. URLROOT .'/posts/post/'. $post->id);
                } else {
                    die('Something went wrong.');
                }
            }
        }

        $this->view('/posts/update', $data);
    }

    public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = $this->postModel->getPost($id);

            if($_SESSION['user_id'] != $post->user_id) {
                header('location: '. URLROOT .'/posts/feed');
            }

            if($this->postModel->deletePost($id)) {
                header('location: '. URLROOT .'/posts/feed');
            } else {
                die('An error occured');
            }
        }else {
            header('location: '. URLROOT .'/posts/feed');
        }
    }

}

?>
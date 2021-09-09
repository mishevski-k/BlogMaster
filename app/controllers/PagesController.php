<?php
    Class PagesController extends Controller {
        
        public function __construct() {
            $this->pageModel = $this->model('PageModel');
        }

        public function index() {

            if(isLoggedIn()) {
                header('location: '. URLROOT .'/posts/feed');
            }

            $this->view('/pages/home');
        }

        public function about() {
            $this->view('/pages/about');
        }

        public function contact() {
            $this->view('/pages/contact');
        }
    }
?>
<?php
namespace app\controllers;

class Publication extends \app\core\Controller{
    public function index(){
		$publication = new \app\models\Publication();
		$publications = $publication->getAll();
		
		if(isset($_POST['search'])) {
			if (!$_POST['bar']) {
				$this->view('Publication/index',$publications);
			} else {
				$publication = $publication->getTitle($_POST['bar']);
				$this->view('Publication/index',$publication);
			}
		} else {
			$this->view('Publication/index',$publications);
		}
	}
    public function create($profile_id) {
        if(!isset($_POST['create'])){	//display he view if I don't submit the form    // create or action?
			$this->view('Publication/create');
		}else{	//process the data
			$newPublication = new \app\models\Publication();
            $newPublication->profile_id = $profile_id;
			$newPublication->publication_title=$_POST['publication_title'];
			$newPublication->publication_text=$_POST['publication_text'];
			$newPublication->publication_timestamp=date('Y-m-d H:i:s');
			$newPublication->publication_status=$_POST['publication_status'];
			$newPublication->insert();
			header('location:/Publication/index');
		}
    }
    public function update($publication_id) {
        $publication = new \app\models\Publication();
		$publication= $publication->get($publication_id);
		if(!isset($_POST['update'])){
			$this->view('Publication/update', $publication);
		}else{
			if($_SESSION['profile_id'] == $publication->profile_id){
				
				$publication->publication_title=$_POST['publication_title'];		
				$publication->publication_text=$_POST['publication_text'];
				$publication->publication_timestamp=date('Y-m-d H:i:s');
				$publication->publication_status=$_POST['publication_status'];
				$publication->update();
			}

			header('location:/Publication/mypublications/' . $_SESSION['user_id']);
        }
	}

    public function delete($publication_id) {
		$publication = new \app\models\Publication();
		$comment = new \app\models\Comment();
		$comments = $comment->getAllByPublication($publication_id);
		foreach ($comments as $key => $value) {
			$comment->delete($value->publication_comment_id);
		}
		$publication->delete($publication_id);
		header('location:/Publication/mypublications/' . $_SESSION['user_id']);
	}

    public function page($publication_id) {
	    	$publication = new \app\models\Publication();
			$publication = $publication->get($publication_id);
	    	$this->view('Publication/page', $publication);
	    	if (isset($_POST['create'])) {
	    		header("location:/Comment/create/$publication_id");
	    	}

	    	$comment = new \app\models\comment();
			$comments = $comment->getAllByPublication($publication_id);
			$this->view('Comment/index',$comments);
    }

	// this one is new
	public function myPublications($profile_id) {
		$publication = new \app\models\Publication();
		$publications = $publication->getAllByProfile($profile_id);
		
		if(isset($_POST['search'])) {
			if (!$_POST['bar']) {
				$this->view('Publication/mypublications',$publications);
			} else {
				$publication = $publication->getTitle($_POST['bar']);
				$this->view('Publication/mypublications',$publication);
			}
		} else {
			$this->view('Publication/mypublications',$publications);
		}
	}
}
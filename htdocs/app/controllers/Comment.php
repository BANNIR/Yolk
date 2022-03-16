<?php
namespace app\controllers;

#[\app\filters\Profile]
class Comment extends \app\core\Controller{
    public function index(){
        $comment = new \app\models\comment();
		$comments = $comment->getAll();
		$this->view('Comment/index',$comments);
	}
    public function create($publication_id) {
        if(!isset($_POST['comment_create'])){	//display he view if I don't submit the form    // create or action?
			$this->view('Comment/create');
		}else{	//process the data
			$newcomment = new \app\models\Comment();
			$profile = new \app\models\Profile();

            $newcomment->publication_id = $publication_id;
			$profile = $profile->getUserId($_SESSION['user_id']);
			$newcomment->profile_id = $profile->profile_id;
			$newcomment->comment_text=$_POST['comment_text'];
			$newcomment->timestamp=date('Y-m-d H:i:s');
			$newcomment->insert();
			header('location:/Publication/page/' . $publication_id);
		}
    }
    public function update($publication_comment_id) {
        $comment = new \app\models\Comment();
		$comment = $comment->get($publication_comment_id);
		if(!isset($_POST['update'])){
			$this->view('Comment/update', $comment);
		} 
		else {
			$comment->comment_text=$_POST['comment_text'];
			$comment->timestamp=date('Y-m-d H:i:s');
			$comment->update();
			header('location:/Comment/mycomments/' . $_SESSION['user_id']);
        }
	}
	
    public function delete($publication_comment_id) {
        $comment = new \app\models\Comment();
    	$comment->delete($publication_comment_id);
		header('location:/Comment/mycomments/' . $_SESSION['user_id']);
    }

    public function myComments($profile_id) {
		$comment = new \app\models\Comment();
		$comments = $comment->getAllByProfile($profile_id);
		
		if(isset($_POST['search'])) {
			if (!$_POST['bar']) {
				$this->view('Comment/mycomments',$comments);
			} else {
				$comment = $comment->getTitle($_POST['bar']);
				$this->view('Comment/mycomments',$comments);
			}
		} else {
			$this->view('Comment/mycomments',$comments);
		}
	}

}
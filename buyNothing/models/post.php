<?php
class Post {
    private $postid;
    private $description;
    private $image;
    private $createdat;
    private $posttype;
    private $producttype;
    private $numoflikes;
    private $numofcomments;
    private $userid;

    // Getter functions
    public function getPostId() {
        return $this->postid;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    public function getCreatedAt() {
        return $this->createdat;
    }

    public function getPostType() {
        return $this->posttype;
    }

    public function getProductType() {
        return $this->producttype;
    }

    public function getNumOfLikes() {
        return $this->numoflikes;
    }

    public function getNumOfComments() {
        return $this->numofcomments;
    }

    public function getUserId() {
        return $this->userid;
    }

    // Setter functions
    public function setPostId($postid) {
        $this->postid = $postid;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setCreatedAt($createdat) {
        $this->createdat = $createdat;
    }

    public function setPostType($posttype) {
        $this->posttype = $posttype;
    }

    public function setProductType($producttype) {
        $this->producttype = $producttype;
    }

    public function setNumOfLikes($numoflikes) {
        $this->numoflikes = $numoflikes;
    }

    public function setNumOfComments($numofcomments) {
        $this->numofcomments = $numofcomments;
    }

    public function setUserId($userid) {
        $this->userid = $userid;
    }
}
?>
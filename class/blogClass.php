
<?php
class Blog {
	var $key = "";
	var $user;
	var $datetime;
	var $title;
	var $content;
	var $password = "";
	var $category = "";
	function __construct($key = "") {
		if ($key != "") {
			$this->setBlog ( $key );
		}
	}
	function getKey() {
		return $this->key;
	}
	function getUser() {
		return $this->user;
	}
	function getDatetime() {
		return $this->datetime;
	}
	function getTitle() {
		return $this->title;
	}
	function getContent() {
		return $this->content;
	}
	function getPassword() {
		return $this->password;
	}
	function getCategory() {
		return $this->category;
	}
	function setBlog($key) {
		$mysql = new MySQL ();
		$mysql->Connect ();
		$mysql->Query ( "select * from tk_blog where tk_blog_key = '" . writeToDatabase ( $key ) . "'" );
		
		if ($row = $mysql->Fetch ()) {
			$this->key = $row ['tk_blog_key'];
			$this->user = $row ['tk_blog_user'];
			$this->datetime = $row ['tk_blog_datetime'];
			$this->title = $row ['tk_blog_title'];
			$this->content = $row ['tk_blog_content'];
			$this->password = $row ['tk_blog_password'];
			$this->category = $row ['tk_blog_category'];
		}
		
		$mysql->Close ();
	}
	function setKey($key) {
		$this->key = $key;
	}
	function setUser($user) {
		$this->user = $user;
	}
	function setDatetime($datetime) {
		$this->datetime = $datetime;
	}
	function setTitle($title) {
		$this->title = $title;
	}
	function setContent($content) {
		$this->content = $content;
	}
	function setPassword($password) {
		$this->password = $password;
	}
	function setCategory($category) {
		$this->category = $category;
	}
	function create() {
		$this->setKey ( $this->user . time () );
		$this->setDatetime ( date ( "Y-m-d H:i:s" ) );
		
		$mysql = new MySQL ();
		$mysql->Connect ();
		
		$sql = "INSERT INTO tk_blog (tk_blog_key,tk_blog_user,tk_blog_datetime,tk_blog_title,tk_blog_content,tk_blog_password,tk_blog_category) VALUES ('" . writeToDatabase ( $this->key ) . "', '" . writeToDatabase ( $this->user ) . "', '" . writeToDatabase ( $this->datetime ) . "','" . writeToDatabase ( $this->title ) . "','" . writeToDatabase ( $this->content ) . "','" . writeToDatabase ( $this->password ) . "','" . writeToDatabase ( $this->category ) . "')";
		$mysql->Insert ( $sql );
		
		// echo $sql;
		
		$mysql->Close ();
	}
	function update() {
		$mysql = new MySQL ();
		$mysql->Connect ();
		$sql = "UPDATE tk_blog  set tk_blog_user = '" . writeToDatabase ( $this->user ) . "', tk_blog_datetime = '" . writeToDatabase ( $this->datetime ) . "', tk_blog_title = '" . writeToDatabase ( $this->title ) . "', tk_blog_content = '" . writeToDatabase ( $this->content ) . "', tk_blog_password = '" . writeToDatabase ( $this->password ) . "', tk_blog_category = '" . writeToDatabase ( $this->category ) . "' WHERE tk_blog_key = '" . writeToDatabase ( $this->key ) . "'";
		$mysql->Update ( $sql );
		$mysql->Close ();
	}
}

?>

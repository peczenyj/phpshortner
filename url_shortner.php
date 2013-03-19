<?php
  require_once './vendor/autoload.php';

class UrlDAO {
  private $db;
  
  public function UrlDAO() {
		$this->db = new NotORM(new PDO('mysql:dbname=url_short;host:127.0.0.1','root',''));
  }
  
  public function insert($url){
		$result = $this->db->urls()->insert(array("url" => $url));
		
		if(!$result) {
			$result = $this->db->urls()->where(array("url" => $url))->limit(1)->fetch();
		}	
		
    return $result;
  }
  
  public function retrieve($id){
		$result = $this->db->urls[$id];
		
		if(!isset($result)){
			throw new Exception("Not Found");
		}
		
		return $result;
  }
}

class Shortener {
  private $dao;
  
  public function Shortener($dao=null) { 
    $this->dao = isset($dao) ? $dao : new UrlDAO();
  }
  
  function shortUrl($url){
	
    $row = $this->dao->insert($url);

    return array("id" => $row["id"], "url" => $row["url"]);
  }
  
  function expandUrl($id){
    $row = $this->dao->retrieve($id);

    return $row["url"];
  }
}
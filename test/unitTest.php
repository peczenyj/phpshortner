<?php

require_once __DIR__ . "/../url_shortner.php";

class ShortenerTest extends PHPUnit_Framework_TestCase
{
  public function testShortUrlShouldInsertANewURLinDatabase(){
    $id  = '10'; 
    $url = "http://www.google.com";
    
    $stub = $this->getMockBuilder('UrlDAO')->disableOriginalConstructor()->getMock();
      
    $stub->expects($this->once())
      ->method('insert')
      ->will($this->returnValue(array("id" => $id, "url" => $url)));
      
    $s = new Shortener($stub);
    $obj = $s->shortUrl($url);
    $this->assertEquals($id, $obj["id"]);
  }
  
  public function testExpandUrlShouldRetrieveUrlFromDatabaseUsingID(){
    $id  = 'a'; 
    $url = "http://google.com";
    
    $stub = $this->getMockBuilder('UrlDAO')->disableOriginalConstructor()->getMock();
      
    $stub->expects($this->once())
      ->method('retrieve')
      ->with($this->equalTo('a'))
      ->will($this->returnValue(array("url" =>$url)));
      
    $s = new Shortener($stub);
    
    $this->assertEquals($url , $s->expandUrl($id));
  }
}

<?php

// It may take a whils to crawl a site ...
set_time_limit(60);

// Inculde the phpcrawl-mainclass
include("libs/PHPCrawler.class.php");
include("simple_html_dom.php");

// Extend the class and override the handleDocumentInfo()-method 
class MyCrawler extends PHPCrawler 
{
  function handleDocumentInfo($DocInfo) 
  {
    // Lấy toàn bộ url của website
    $listPar = explode("/",$DocInfo->url);
    if(count($listPar) > 4 && strpos($DocInfo->url, 'doc-truyen/co-vo-xa-hoi-den-cua-ong-trum-hac-dao') !== false){
      $servername = "localhost";
      $username = "root";
      $password = "root";
      $dbname = "testCrawl";
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      $conn->query("SET character_set_results = utf8, character_set_client = utf8, character_set_connection = utf8, character_set_database = utf8, character_set_server = utf8");
      echo "Page requested: ".$DocInfo->url."</br>";
      // lấy file html từ các links crawler được.
      // $html = file_get_html($DocInfo->url);
      $context = stream_context_create(array('http' => array('header' => 'User-Agent: Mozilla compatible')));
      $response = file_get_contents($DocInfo->url, false, $context);
      $html = str_get_html($response);
      foreach($html ->find('center') as $item) {
        $item->outertext = '';
      }
      $html->save();
      foreach($html ->find('span') as $item) {
        $item->outertext = '';
      }
      $html->save();
      if(is_object($html)){      
          $title = "";
          $story = "";
          $chapter = "";
          $auth = "";
          $content = "";
          // Trả về đối tượng nếu tìm được, hoặc null nếu không.
          $t = $html->find("h1.story-detail-title", 0);
          if($t){
            $title = $t->innertext;
            // echo "Title: ".$title."</br>";
            $titleArr = explode(" - ",$title);
            $story = $titleArr[0];
            $chapter = $titleArr[1];
            // echo "Story: ".$story."</br>";
          }

          $author = $html->find("p.story-detail-author", 0)->find("a", 0);
          if($author){
            $auth = $author->innertext;
            // echo "Author: ".$auth."</br>";
          }

          $c = $html->find("div.story-detail-content", 0);
          if($c){
            $content = $c->innertext;
            // echo "Content: ".$content."</br>";
          }
          $sql = "INSERT INTO Story (story_name, story_chapter, story_author, story_content, story_link)
          VALUES ('".$story."', '".$chapter."', '".$auth."', '".$content."', '".$DocInfo->url."')";
          if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br><br><br>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

          $conn->close();
          $html->clear(); 
          unset($html);
      }
      flush();
    }
  } 
}

// Now, create a instance of your class, define the behaviour
// of the crawler (see class-reference for more options and details)
// and start the crawling-process.

$crawler = new MyCrawler();

// URL to crawl
// $crawler->setURL("www.php.net");
$crawler->setURL("thichtruyen.vn");

// Only receive content of files with content-type "text/html"
$crawler->addContentTypeReceiveRule("#text/html#");

// Ignore links to pictures, dont even request pictures
$crawler->addURLFilterRule("#\.(jpg|jpeg|gif|png)$# i");

// Store and send cookie-data like a browser does
$crawler->enableCookieHandling(true);

// Set the traffic-limit to 1 MB (in bytes,
// for testing we dont want to "suck" the whole site)
// $crawler->setTrafficLimit(1000 * 1024);

// Thats enough, now here we go
$crawler->go();

// At the end, after the process is finished, we print a short
// report (see method getProcessReport() for more information)
$report = $crawler->getProcessReport();

if (PHP_SAPI == "cli") $lb = "\n";
else $lb = "<br />";
    
echo "Summary:".$lb;
echo "Links followed: ".$report->links_followed.$lb;
echo "Documents received: ".$report->files_received.$lb;
echo "Bytes received: ".$report->bytes_received." bytes".$lb;
echo "Process runtime: ".$report->process_runtime." sec".$lb; 
?>
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
    $listPar = explode("/",$DocInfo->url);
    if(
        count($listPar) > 4 && 
        strpos($DocInfo->url, 'truyen-ngon-tinh') !== false &&
        strpos($DocInfo->url, 'url_redirect=') === false &&
        strpos($DocInfo->url, 'list-ngon-tinh') === false &&
        strpos($DocInfo->url, '?tab=truyen-') === false &&
        strpos($DocInfo->url, 'tong-hop') === false &&
        strpos($DocInfo->url, 'ngon-tinh-xuat-ban') === false &&
        strpos($DocInfo->url, 'getElementsByTagName') === false &&
        strpos($DocInfo->url, 'danh-muc') === false &&
        strpos($DocInfo->url, 'list-truyen') === false &&
        strpos($DocInfo->url, 'mot-vai-truyen') === false &&
        strpos($DocInfo->url, 'ban-chay-nhat') === false &&
        strpos($DocInfo->url, '-chuong-') === false &&
        strpos($DocInfo->url, ';') === false &&
        strpos($DocInfo->url, 'substring') === false
      ){
      echo $DocInfo->url."</br>";
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
<?php
class Output {
  public $title;
  public $thumbnail;
  public $qualities;
}

class AForm {
  public $code;
}

class Link {
  public $type;
  public $url;
}

if(isset($_GET['link'])){
  $link = $_GET['link']; 

  if (   
        strpos($link, 'https://www.dailymotion.com/') !== false ||
        strpos($link, 'https://dai.ly/') !== false
      ) {

      $temp = explode("?",$link);
      $temp2 = explode("/",$temp[0]);

      $id = $temp2[count($temp2) - 1];
      // var_dump($temp2[count($temp2) - 1]);die;

      $url_json = "https://www.dailymotion.com/player/metadata/video/" . $id . "?embedder=https://www.dailymotion.com/video/" . $id . "&referer=&onsite=1&newapp=com.dailymotion.neon&locale=en&client_type=webapp&ion_type=player&component_style=player_icons";

      $context = stream_context_create(array('http' => array('header' => 'User-Agent: Mozilla compatible')));
      $response = json_decode(file_get_contents($url_json, false, $context));

      var_dump($response);die;

      $output = new Output;
      $output->title = $response->title;
      $output->thumbnail = $response->poster_url;
      $output->qualities = $response->qualities;

      echo json_encode( 
        array(
          'status' => 200, 
          'data' => $output
        )
      );die;
  }

  if (   
    strpos($link, 'https://www.liveleak.com/') !== false ||
    strpos($link, 'https://www.instagram.com') !== false
  ) {
    // It may take a whils to crawl a site ...
    set_time_limit(30);

    // Inculde the phpcrawl-mainclass
    include("libs/PHPCrawler.class.php");
    include("simple_html_dom.php");

    // Extend the class and override the handleDocumentInfo()-method 
    class MyCrawler extends PHPCrawler 
    {
      public $listStory = array();

      function handleDocumentInfo($DocInfo) 
      {    
        // var_dump($DocInfo);die;
        $context = stream_context_create(array('http' => array('header' => 'User-Agent: Mozilla compatible')));
        $response = file_get_contents($DocInfo->url, false, $context);
        $html = str_get_html($response);
        if(strpos($DocInfo->url, 'https://www.liveleak.com/') !== false){
          foreach($html->find('video') as $item) {
            if(null !== $item->children){
              if(null !== $item->children[0]){
                if(null !== $item->children[0]->attr){
                  if(null !== $item->children[0]->attr["src"]){
                    echo json_encode( array('status' => 200, 'link' => $item->children[0]->attr["src"]));die;
                  }
                }
              }
            }
          }
        }else if(strpos($DocInfo->url, 'https://www.instagram.com') !== false){
 
          $title = '';
          $image = '';
          $video = '';
          foreach($html->find('meta') as $item) {
            if($title == ''){
              if($item->attr['property'] == 'og:title'){
                $title = $item->attr['content'];
              }
            }
            
            if($image == ''){
              if($item->attr['property'] == 'og:image'){
                $image = $item->attr['content'];
              }
            }

            if($video == ''){
              if($item->attr['property'] == 'og:video'){
                $video = $item->attr['content'];
              }
            }

            if($title != '' && $image != '' && $video != ''){

              $output = new Output;
              $output->title = $title;
              $output->thumbnail = $image;
              // $output->qualities = $video;
              $output->qualities = array(
                '640'=>  array(
                          array('type' => 'video/mp4', 'url' => $video),
                      ),
               );
              // echo "<pre>";
              // print_r($video);
              // echo "</pre>";die;
              echo json_encode( 
                array(
                  'status' => 200, 
                  'data' => $output
                )
              );die;
            }
          }
        }
        die;
      } 
    }

    // Now, create a instance of your class, define the behaviour
    // of the crawler (see class-reference for more options and details)
    // and start the crawling-process.

    $crawler = new MyCrawler();

    // URL to crawl
    // $crawler->setURL("www.php.net");
    $crawler->setURL($link);

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
  }
}
?>
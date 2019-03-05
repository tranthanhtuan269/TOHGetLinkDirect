<?php

// It may take a whils to crawl a site ...
set_time_limit(300);

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
    if(count($listPar) > 4 && (
      strpos($DocInfo->url, 'doc-truyen/xin-chao-chu-tien-sinh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/co-vo-xa-hoi-den-cua-ong-trum-hac-dao') !== false || 
      strpos($DocInfo->url, 'doc-truyen/tong-tai-ba-dao-va-co-vo-luat-su-kieu-ngao-cua-minh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ba-chu-hac-dao-cung-chieu-vo-sat-thu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/song-cung-co-khi-can') !== false || 
      strpos($DocInfo->url, 'doc-truyen/dau-luoi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/co-vo-an-xin') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nhong-nheo-gap-da-tinh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ac-ma-18') !== false || 
      strpos($DocInfo->url, 'doc-truyen/muoi-gio-toi-ngay-thu-sau') !== false || 
      strpos($DocInfo->url, 'doc-truyen/an-em-an-toi-nghien') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hang-dem-thau-hoan-18') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hao-mon-thinh-sung-bao-boi-that-xin-loi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/doi-chong-cung-chieu-em-den-nghien') !== false || 
      strpos($DocInfo->url, 'doc-truyen/vo-yeu-xinh-dep-cua-tong-giam-doc-tan-ac') !== false || 
      strpos($DocInfo->url, 'doc-truyen/5-truyen-hac-bang-khong-the-bo-qua') !== false || 
      strpos($DocInfo->url, 'doc-truyen/doc-gia-chuyen-sung') !== false || 
      strpos($DocInfo->url, 'doc-truyen/han-mai') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ba-dao-tieu-thien-vuong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/bua-may-man') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hop-dong-hon-nhan-100-ngay') !== false || 
      strpos($DocInfo->url, 'doc-truyen/con-dau-nha-giau') !== false || 
      strpos($DocInfo->url, 'doc-truyen/dao-tinh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/yeu-em-tu-cai-nhin-dau-tien') !== false || 
      strpos($DocInfo->url, 'doc-truyen/xin-loi-em-chi-la-con-di') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nguoi-vo-thay-the') !== false || 
      strpos($DocInfo->url, 'doc-truyen/cho-em-lon-duoc-khong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ben-nhau-tron-doi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/kiep-truoc-em-da-chon-cat-cho-anh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/yeu-anh-hon-ca-tu-than') !== false || 
      strpos($DocInfo->url, 'doc-truyen/me-doc-than-tuoi-18') !== false || 
      strpos($DocInfo->url, 'doc-truyen/cam-tinh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hoa-tu-dan') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hon-sung') !== false || 
      strpos($DocInfo->url, 'doc-truyen/dong-cung') !== false || 
      strpos($DocInfo->url, 'doc-truyen/bo-bo-kinh-tam') !== false || 
      strpos($DocInfo->url, 'doc-truyen/vuong-phi-tuoi-13') !== false || 
      strpos($DocInfo->url, 'doc-truyen/du-tinh-loi-moi-cua-boss-than-bi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/anh-trang-noi-da-lang-quen') !== false || 
      strpos($DocInfo->url, 'doc-truyen/giong-nhu-da-tung-quen-biet') !== false || 
      strpos($DocInfo->url, 'doc-truyen/pa-pa-17-tuoi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hoa-khai') !== false || 
      strpos($DocInfo->url, 'doc-truyen/yeu-anh-khong-hoi-han') !== false || 
      strpos($DocInfo->url, 'doc-truyen/tieu-thoi-dai-3-0') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nu-hon-cua-soi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/huong-dan-xu-ly-rac-thai') !== false || 
      strpos($DocInfo->url, 'doc-truyen/sam-sam-den-day-an-ne') !== false || 
      strpos($DocInfo->url, 'doc-truyen/luu-bach-anh-yeu-em') !== false || 
      strpos($DocInfo->url, 'doc-truyen/khong-the-thieu-em') !== false || 
      strpos($DocInfo->url, 'doc-truyen/em-khong-biet') !== false || 
      strpos($DocInfo->url, 'doc-truyen/can-phong-nhung-nho') !== false || 
      strpos($DocInfo->url, 'doc-truyen/dang-cap-quy-co') !== false || 
      strpos($DocInfo->url, 'doc-truyen/huong-dan-su-dung-dan-ong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/am-muu-noi-cong-so') !== false || 
      strpos($DocInfo->url, 'doc-truyen/cap-tren-muon-cuoi-toi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/bua-trua-tinh-yeu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hua-cho-em-mot-doi-am-ap') !== false || 
      strpos($DocInfo->url, 'doc-truyen/mua-tuyet-roi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/chi-duoc-yeu-minh-anh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ai-la-ke-thu-ba') !== false || 
      strpos($DocInfo->url, 'doc-truyen/chi-vi-phut-giay-duoc-gap-em') !== false || 
      strpos($DocInfo->url, 'doc-truyen/tan-hon-phong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/gap-em-duoi-mua-xuan') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ong-chu-quan-tam-them-chut-di') !== false || 
      strpos($DocInfo->url, 'doc-truyen/mua-ha-chung-tinh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/doi-thu-tinh-truong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/dua-vao-hoi-am-cua-em') !== false || 
      strpos($DocInfo->url, 'doc-truyen/khong-chi-trong-loi-noi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nu-thuong-cap-hung-ton-cua-toi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/trai-tim-mau-ho-phach') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ba-nu-hon-doi-lay-mot-doi-chong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/yeu-khong-loi-thoat') !== false || 
      strpos($DocInfo->url, 'doc-truyen/bay-van-phong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/binh-yen-khi-ta-gap-nhau') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nguoi-dep-phai-manh-me') !== false || 
      strpos($DocInfo->url, 'doc-truyen/truc-ma-la-soi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hu-nu-gaga') !== false || 
      strpos($DocInfo->url, 'doc-truyen/tra-tron-phong-con-gai') !== false || 
      strpos($DocInfo->url, 'doc-truyen/chang-mu-hoa-ra-em-that-yeu-anh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/33-ngay-that-tinh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/dong-cua-tha-boss') !== false || 
      strpos($DocInfo->url, 'doc-truyen/danh-cap-tinh-yeu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/em-dung-mong-chung-ta-la-nguoi-dung') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nguoi-khong-vao-dia-nguc-thi-ai-vao') !== false || 
      strpos($DocInfo->url, 'doc-truyen/yeu-em-khong-can-qua-cuong-si') !== false || 
      strpos($DocInfo->url, 'doc-truyen/7788-em-yeu-anh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/boss-den-toi-dung-chay') !== false || 
      strpos($DocInfo->url, 'doc-truyen/chet-sap-bay-roi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nu-hoang-va-ke-cuop') !== false || 
      strpos($DocInfo->url, 'doc-truyen/oan-trai') !== false || 
      strpos($DocInfo->url, 'doc-truyen/anh-ca-khong-lam-khong-cong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nuong-tu-nang-dung-qua-kieu-ngao') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nhat-ky-lay-chong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hac-ba-tuoc-vui-ve') !== false || 
      strpos($DocInfo->url, 'doc-truyen/doc-ngon-tinh-he-hoan') !== false || 
      strpos($DocInfo->url, 'doc-truyen/chuyen-dung-cam-nhat') !== false || 
      strpos($DocInfo->url, 'doc-truyen/thuan-tay-dat-ra-mot-bao-bao') !== false || 
      strpos($DocInfo->url, 'doc-truyen/thang-ngay-uoc-hen') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nhan-duyen') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hoa-thien-cot') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ben-xe') !== false || 
      strpos($DocInfo->url, 'doc-truyen/khong-the-ngung-yeu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nuoi-vo-de-yeu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/cuoc-song-treu-cho-choc-meo-cua-nhi-nuu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/yeu-nguoi-tinh-lang') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ba-xa-thu-ky') !== false || 
      strpos($DocInfo->url, 'doc-truyen/tien-hon-hau-ai') !== false || 
      strpos($DocInfo->url, 'doc-truyen/phu-quan-xin-chao') !== false || 
      strpos($DocInfo->url, 'doc-truyen/cuoi-sau-mot-dem') !== false || 
      strpos($DocInfo->url, 'doc-truyen/huyen-thao-chua-tan') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nho-mai-khong-quen') !== false || 
      strpos($DocInfo->url, 'doc-truyen/cam-da-lai-phu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/sung-the-dai-truong-phu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ca-voi-va-ho-nuoc') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ngai-chu-tich-ac-liet') !== false || 
      strpos($DocInfo->url, 'doc-truyen/vuong-gia-nha-cua-em-chinh-la-phu-cua-anh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/vu-dieu-cua-trung-ta') !== false || 
      strpos($DocInfo->url, 'doc-truyen/tong-tai-phuc-hac-khong-nen-yeu-anh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ca-nuoc-than-mat') !== false || 
      strpos($DocInfo->url, 'doc-truyen/my-man-de-nhat-thien-ha') !== false || 
      strpos($DocInfo->url, 'doc-truyen/duyen-den-kho-thoat') !== false || 
      strpos($DocInfo->url, 'doc-truyen/boss-qua-gian-xao') !== false || 
      strpos($DocInfo->url, 'doc-truyen/chuyen-tinh-new-york-ha-kin') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ban-gai-ngay-tho') !== false || 
      strpos($DocInfo->url, 'doc-truyen/vo-yeu-thich-tan-gai') !== false || 
      strpos($DocInfo->url, 'doc-truyen/osin-nha-bo-truong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/doc-huong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/thanh-mai-ky-truc-ma') !== false || 
      strpos($DocInfo->url, 'doc-truyen/chong-xau-den-quay-roi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/lam-sao-de-het-uu-sau') !== false || 
      strpos($DocInfo->url, 'doc-truyen/me-truoc-cuoi-sau') !== false || 
      strpos($DocInfo->url, 'doc-truyen/tua-nhu-tinh-yeu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/bao-thu-tinh-lang') !== false || 
      strpos($DocInfo->url, 'doc-truyen/truong-mong-luu-ngan') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hen-dep-nhu-mo') !== false || 
      strpos($DocInfo->url, 'doc-truyen/thang-tieu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/benh-tinh-yeu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/chu-tinh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/dan-nu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/co-chap') !== false || 
      strpos($DocInfo->url, 'doc-truyen/vo-dich-tinh-nhan-toi-bam-chuong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/gap-go-vuong-lich-xuyen') !== false || 
      strpos($DocInfo->url, 'doc-truyen/thoi-gian-tuoi-dep') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hai-lan-gap-go') !== false || 
      strpos($DocInfo->url, 'doc-truyen/anh-trang-khong-hieu-long-toi') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nhat-ky-nuoi-ba-xa') !== false || 
      strpos($DocInfo->url, 'doc-truyen/a-nam') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hau-cung-ke') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nguoi-lang-gieng-cua-anh-trang') !== false || 
      strpos($DocInfo->url, 'doc-truyen/meo-hoang') !== false || 
      strpos($DocInfo->url, 'doc-truyen/anh-da-lau-khong-gap') !== false || 
      strpos($DocInfo->url, 'doc-truyen/moi-nguoi-deu-noi-ta-bien-thai') !== false || 
      strpos($DocInfo->url, 'doc-truyen/mai-mai-ben-anh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/dieu-kien-cua-ma-vuong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/anh-trai-xau-xa') !== false || 
      strpos($DocInfo->url, 'doc-truyen/co-can-lay-chong-khong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hat-tinh-ca-cho-em') !== false || 
      strpos($DocInfo->url, 'doc-truyen/nay-mau-buong-co-ay-ra') !== false || 
      strpos($DocInfo->url, 'doc-truyen/thu-ky-khong-len-giuong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/vo-oi-chao-em') !== false || 
      strpos($DocInfo->url, 'doc-truyen/muon-noi-yeu-em') !== false || 
      strpos($DocInfo->url, 'doc-truyen/bao-long-tong-tai') !== false || 
      strpos($DocInfo->url, 'doc-truyen/hom-nay-em-phai-ga-cho-anh') !== false || 
      strpos($DocInfo->url, 'doc-truyen/vi-hon-phu-bat-dac-di') !== false || 
      strpos($DocInfo->url, 'doc-truyen/tinh-nhan-ngam') !== false || 
      strpos($DocInfo->url, 'doc-truyen/thanh-mai-cua-chang-truc-ma-cua-nang') !== false || 
      strpos($DocInfo->url, 'doc-truyen/dac-quyen-cua-giao-su') !== false || 
      strpos($DocInfo->url, 'doc-truyen/cho-mot-ngay-nang') !== false || 
      strpos($DocInfo->url, 'doc-truyen/yeu-em-thien-truong-dia-cuu') !== false || 
      strpos($DocInfo->url, 'doc-truyen/ac-ma-truyen-ky') !== false || 
      strpos($DocInfo->url, 'doc-truyen/van-dam-tim-chong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/bai-hoc-yeu-duong-cua-tieu-ma-vuong') !== false || 
      strpos($DocInfo->url, 'doc-truyen/chay-dau-cho-thoat') !== false || 
      strpos($DocInfo->url, 'doc-truyen/cung-quan-ca') !== false)){
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
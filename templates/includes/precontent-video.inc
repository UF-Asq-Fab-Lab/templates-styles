
<?php
$page = wire('page');
$videoArray = $page->precontent_video;
$videoComponents = array(
  'mp4Url' => '',
  'webmUrl' => '',
  'posterUrl' => ''
);
foreach ($videoArray as $file) {
  if(preg_match('/\.mp4$/', $file->name)){
    $videoComponents['mp4Url'] = $file->httpUrl;
  } else if(preg_match('/\.webm$/', $file->name)){
    $videoComponents['webmUrl'] = $file->httpUrl;
  } else if(preg_match('/\.(jpg|jpeg|png|gif)$/', $file->name)){
    $videoComponents['posterUrl'] = $file->httpUrl;
  }
}
?>
<div class='section precontent-video'>
<video autoplay loop muted poster='<?php echo $videoComponents["posterUrl"] ?>' id='bgvid' style='background: url(<?php echo $videoComponents["posterUrl"] ?>) no-repeat;'>
  <source src='<?php echo $videoComponents["mp4Url"] ?>' type='video/mp4'/>
  <source src='<?php echo $videoComponents["webmUrl"] ?>' type='video/webm'/>
</video>
</div>

<div class='section precontent-slideshow'>
  <?php
  $page = wire('page');
  $images = $page->precontent_images;
  foreach ($images as $image) {
    echo "<div class='precontent-slideshow-image' style='background-image: url($image->url)'></div>";
  }
  ?>
</div>

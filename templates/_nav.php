<nav class="navbar">
  <div class="container">

    <div id="logo-col" class="three columns">
      <a href="<?php echo $homepage->url ?>" id="logo-link"><img id="logo-img" src="<?php echo $homepage->logo->httpUrl ?>"></img></a>
      <div class="navbar-toggle"><i class="fa fa-bars"></i></div>
    </div>

    <ul class="mobile-navbar-list">
      <?php
      foreach($homepage->children as $item) {
        if($item->id == $page->rootParent->id) echo "<li class='navbar-item current'>";
          else echo "<li class='navbar-item'>";
        echo "<div class='container'><a class='navbar-link' href='$item->url'>$item->title</a></div></li>";
      }
      ?>
    </ul>

    <div class="nine columns">
      <ul class="navbar-list">
        <?php
        // top navigation consists of homepage and its visible children
        foreach($homepage->children as $item) {
          if($item->id == $page->rootParent->id) echo "<li class='navbar-item current'>";
            else echo "<li class='navbar-item'>";
          echo "<a class='navbar-link' href='$item->url'>$item->title</a></li>";
        }
        ?>
      </ul>
    </div>

  </div>
</nav>

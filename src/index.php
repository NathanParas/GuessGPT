<?php include('codes.php'); ?>


<?php include('header.php'); ?>


<body>

<div class="loader_bg">
    <div class="loader"></div>
</div>
  <div id="background">
    <video autoplay muted loop controls>
      <source src="static/uploads/bg-video2.mp4" type="video/mp4">
    </video>
  </div>



  <div class="container bg-transparent mt-5 p-3 rounded-3 text-center">
  <form method="post" id="selcatDIV" style="padding-top: 100px;">
  <h1>GUESS THE WORD</h1>
  <div class="button-container">
  <button type="submit" class="game-button" name="catbtn" value="">Start Now!</button>
    </div>
    <br>
    <br>
    <br>
    <div class="category-column">
    <?php 
    $categories = array("TV Show", "School Subject", "Tourist Spot", "Religion", "Movie");
    shuffle($categories);
    foreach ($categories as $category) {
        $class = strtolower(str_replace(' ', '-', $category)); // create class name based on category name
        echo '<a href="#" class="category-link ' . $class . '" style="font-weight: 600;">' . $category . '</a>';
    }
    ?>
    </div>

    <div class="category-column">
    <?php 
    $remainingCategories = array("Animal", "Food", "Celebrity", "Sport","Brand");
    shuffle($remainingCategories);
    foreach ($remainingCategories as $category) {
        $class = strtolower(str_replace(' ', '-', $category)); // create class name based on category name
        echo '<a href="#" class="category-link ' . $class . '" style="font-weight: 600;">' . $category . '</a>';
    }
    ?>
    </div>

    </form>
   
    <form method="post" id="guessDiv">
    <div class="row justify-content-center mb-3">
      <div class="col-md-8">
        <?php if(array_key_exists("catTitle", $_SESSION)) { echo "<h3><strong>".$_SESSION['catTitle']."</strong></h3>"; } ?>
        <?php if(array_key_exists("result", $_SESSION)) { echo "<p>".$_SESSION['result']."</p>"; } ?>
      </div>
    </div>
    <div class="row justify-content-center">
    <div class="col-md-4 text-left" style="text-align: left; font-size: 18px; font-style: italic;">
        <?php if(array_key_exists("clueList", $_SESSION)) { echo $_SESSION['clueList']; } ?>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3 d-flex justify-content-center" id="enterGuess">
        <input id="guesstext" type="text" name="guess" class="form-control" placeholder="Enter your guess" aria-label="Enter your guess" aria-describedby="basic-addon2" autofocus style="width: 50%; border-top-left-radius: 100px; border-bottom-left-radius: 100px;">
        <button id= "guessbtn" class="guess-button" name="cluebtn" type="submit" autofocus style= "border-top-right-radius: 100px; border-bottom-right-radius: 100px;">Enter Guess</button>
        </div>  
        <div id="endGame" style="margin-bottom: 10px;">
        <button type="submit" class="game-button" name="reset" id="reset">Start All Over!</button>
        </div>
      <div id="inGame" style="margin-bottom: 10px;">
        <button type="submit" class="giveup-button" name="giveup" id="reset">Give up</button>
    </div>
    </div>
  </div>
</form>

  </div>

</body>

</html>

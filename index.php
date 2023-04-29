<?php include('codes.php'); ?>


<?php include('header.php'); ?>


<body >

    <div class="container bg-transparent mt-5  p-3 rounded-3 text-center">
        
        
        <form method="post" id="selcatDIV" >
            <h2>IS215 Chatgpt Guessing Game</h2>
            <button  type="submit" class="btn btn-outline-light toggleForms mb-2" name="catbtn"  value="">Start the game!</button>
        </form>
        <form method="post"   id="guessDiv" >
           
            <div><?php if(array_key_exists("catTitle", $_SESSION)) { echo $_SESSION['catTitle'];} ?> </div>
            <p><?php if(array_key_exists("result", $_SESSION)) { echo $_SESSION['result'];} ?></p>
            <div ><?php if(array_key_exists("clueList", $_SESSION)) { echo $_SESSION['clueList'];}  ?> </div>
                
            <div class="input-group mb-3" id="enterGuess"> 
                <input type="text" name="guess" class="form-control" placeholder="Enter your guess" aria-label="Enter your guess" aria-describedby="basic-addon2" autofocus>
                <button class="btn btn-outline-light" name= "cluebtn" type="submit" onclick="">Enter Guess</button>
            </div>
            <div id="endGame">
                <button type="submit" class="btn btn-outline-light mb-2 " name = "reset"  id="reset">Start All Over!</button>
            </div>
            <div id="inGame">
                <button type="submit" class="btn btn-outline-light mb-2 " name = "giveup"  id="reset">Give up</button>
            </div>
        </form>
        

    </div> <!--End of class container div-->
  
</body>

</html>

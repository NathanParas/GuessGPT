<?php 
    session_start();

    if(!isset($_SESSION['category']) ) {
        
        session_unset();
        $_SESSION['counter'] = 0;
        $_SESSION['clueList'] = "";
        $_SESSION['catTitle']="";
        $_SESSION['category']="";
        $_SESSION['answer']="";
        $_SESSION['result']="";
        $_SESSION['clues']=[]; 
        showSelCat();
    }


    if($_POST) {
        // code to execute When Start Game button is clicked
        if (isset($_POST['catbtn'])){
        
            $categories=array( "an Animal", "a Food", "a Celebrity", "a Sport","a Brand", "a Movie","a TV Show", "a School Subject", "a Country", "a Color");
            shuffle($categories);
            
            $_SESSION['category'] = $categories[0] ;
            $_SESSION['catTitle'] = '<h2 id="catTitle"> Let me think of ' . $_SESSION['category']  . '...  </h2>';
            hideSelCat();
            $_SESSION['answer']= askchat("Can you suggest " . $_SESSION['category']. "? Just give me one answer." ,.07,50);
            $clues= askchat("Suggest 10 short sentences that will serve as clues for someone to guess " . $_SESSION['category']. " " . $_SESSION['answer'] . ". each answer delimited by '/' "  ,.07,2500);
            $_SESSION['clues']=  explode("/", $clues );
            $_SESSION['catTitle'] = '<h2 id="catTitle"> Guess ' . $_SESSION['category']  . '</h2>';
            $_SESSION['clueList']  = "<p> " . $_SESSION['clues'][0] . "</p>";
            $_SESSION['counter'] =1;
        }
        // code to execute When Guess button is clicked
        if (isset($_POST['cluebtn'])){
            $guess = strtoupper(trim($_POST['guess']));
            $answer = strtoupper(trim(trim($_SESSION['answer'])));

            if ($guess==$answer ) {
                $_SESSION['result'] = '<h2 id="catTitle"> CORRECT!! The answer is '. $_SESSION['answer'] .'</h2>';

            } else {
                $_SESSION['result'] = '<h2 id="catTitle"> Oops! Try again! </h2>';

                if ($_SESSION['counter']<=10) {
                    $clues= $_SESSION['clues'];
                    $_SESSION['clueList']  .= "<p> " . $clues[$_SESSION['counter']] . "</p>";
                    $_SESSION['counter'] ++;
                }

                if ($_SESSION['counter']===11){
                    $_SESSION['clueList']  .= "<p> Oops! Game Over! The answer is ". trim(trim($_SESSION['answer'])) ."</p>";
                    $_SESSION['counter'] ++;
                }
                
             }
             hideSelCat();

        }

    }//if post exists

    // code to execute When Start All Over! is clicked
    if(isset($_POST['reset'])) {
        $_SESSION['counter'] = 0;
        $_SESSION['clueList'] = "";
        $_SESSION['catTitle']="";
        $_SESSION['category']="";
        $_SESSION['answer']= "";
        $_SESSION['result']="";

        showSelCat();
        session_unset();
        
    }
    // function to show the start message
    function showSelCat() {
        echo "<style type='text/css'>#guessDiv{ display:none;}#selcatDIV{ display:block;}</style>";        
    }

    // function to hide the start message
    function  hideSelCat () {
        echo "<style type='text/css'>#guessDiv{ display:block;}#selcatDIV{ display:none;}</style>";       
    }

    //function to ask chatgpt
    function askchat($prompt, $temperature, $max_tokens){
        #echo $prompt;
        $apiKey = "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";

        $model_engine = "text-davinci-003"; // or curie
        $clues ="";
        $ctr= 0;


        $url = "https://api.openai.com/v1/engines/$model_engine/completions";
        $data = [
            'prompt' => $prompt,
            'temperature' => $temperature,
            'max_tokens' => $max_tokens,
            'stop' => ['\n']
        ];
    
        $payload = json_encode($data);
    
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey,
        ];
    
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);
    
        $result = json_decode($response, true);
        $answer = $result['choices'][0]['text'];
        return $answer;
    }
             
?>

<?php include('header.php'); ?>


<body >

    <div class="container bg-light mt-5  p-3 rounded-3 text-center">
        
        
        <form method="post" id="selcatDIV" >
            <h2>IS215 Chatgpt Guessing Game</h2>
            <button  type="submit" class="btn btn-primary toggleForms mb-2" name="catbtn"  value="">Start the game!</button>

        </form>
        <form method="post"   id="guessDiv" >
           
            <div><?php if(array_key_exists("catTitle", $_SESSION)) { echo $_SESSION['catTitle'];} ?> </div>
            <p><?php if(array_key_exists("result", $_SESSION)) { echo $_SESSION['result'];} ?></p>
            <div ><?php if(array_key_exists("clueList", $_SESSION)) { echo $_SESSION['clueList'];}  ?> </div>
                
            <div class="input-group mb-3" id="enterGuess"> 
                <input type="text" name="guess" class="form-control" placeholder="Enter your guess" aria-label="Enter your guess" aria-describedby="basic-addon2">
                <button class="btn btn-primary" name= "cluebtn" type="submit" onclick="">Enter Guess</button>
            </div>
            <button type="submit" class="btn btn-primary mb-2 " name = "reset"  id="reset">Start All Over!</button>
        </form>
        

    </div> <!--End of class container div-->
  
</body>

</html>
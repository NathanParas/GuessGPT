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
        
            $categories=array( "Animal", "Food", "Celebrity", "Sport","Brand", "Movie","TV Show", "School Subject", "Tourist Spot", "Religion");
            shuffle($categories);
            $randomizer = array ("Philippines", "Canada", "America", "UK", "Australia", "Korea");
            shuffle($randomizer);
            
            $_SESSION['category'] = $categories[0] ;
            $_SESSION['catTitle'] = '<h2 id="catTitle">  Let me think of ' . $_SESSION['category']  . '...  </h2>';
            hideSelCat();
            $_SESSION['answer']= askchat("I am making a guessing game. Can you suggest a random " . $_SESSION['category']. " from ". $randomizer[0] ."? Just give me one answer." ,.07,50);
            $clues= askchat("Suggest 10 short sentences that will serve as clues for someone to guess " . $_SESSION['category']. " " . $_SESSION['answer'] . ". No need to put a numbering but each answer is delimited by '/' "  ,.07,2500);
            #var_dump ($clues);
            $_SESSION['clues']=  explode("/", $clues );
            $_SESSION['catTitle'] = '<h2 > The Category is ' . $_SESSION['category']  . '</h2>';
            $_SESSION['clueList']  = "<p class = 'fade-in-text'> " . $_SESSION['clues'][0] . "</p>";
            $_SESSION['counter'] =1;
            ingamebuttons ();
        }
        // code to execute When Guess button is clicked
        if (isset($_POST['cluebtn'])){
            $guess = strtoupper(trim($_POST['guess']));
            $answer = strtoupper(trim(trim($_SESSION['answer'])));

            if ($guess==$answer ) {
                $_SESSION['result'] = '<h2 > CORRECT!! The answer is '. $_SESSION['answer'] .'</h2>';
                endgamebuttons();
            } else {
                

                if ($_SESSION['counter']<10) {
                    $_SESSION['result'] = '<h2 > Oops! Try again! </h2>';
                    $clues= $_SESSION['clues'];
                    if ( $_SESSION['counter'] < count($clues)){
                        $_SESSION['clueList']  .= "<p> " . $clues[$_SESSION['counter']] . "</p>";
                        $_SESSION['counter'] ++;
                    }
                    ingamebuttons ();
                }

                if ($_SESSION['counter']==10){
                    $_SESSION['clueList']  .= "<p> Oops! Game Over! </p>";
                    $_SESSION['result'] = '<h2>The answer is '. trim(trim($_SESSION['answer'])) .'</h2>';
                    $_SESSION['counter'] ++;
                    endgamebuttons();
                }
                
             }
             hideSelCat();

        }

        // code to execute When giveup button is clicked
        if (isset($_POST['giveup'])){
            $guess = strtoupper(trim($_POST['guess']));
            $answer = strtoupper(trim(trim($_SESSION['answer'])));
            $_SESSION['result'] = '<h2 > Too bad! The answer is '. $_SESSION['answer'] .'</h2>';
            $_SESSION['counter'] = 11;
            hideSelCat();
            endgamebuttons();
        }

    }//end of if post exists

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

    //functions to set 'Give Up' and 'Start Over' buttons
    function  ingamebuttons () {
        echo "<style type='text/css'>#inGame{ display:block;}#endGame{ display:none;}</style>";       
    }

    //functions to set 'Give Up' and 'Start Over' buttons
    function  endgamebuttons () {
        echo "<style type='text/css'>#inGame{ display:none;}#endGame{ display:block;}</style>";       
    }

    //function to ask chatgpt
    function askchat($prompt, $temperature, $max_tokens){
        #echo $prompt;
        $apiKey = "PUT YOUR API";

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

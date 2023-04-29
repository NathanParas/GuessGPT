# IS215-Group 4: ChatGPT Guessing Game

This simple guessing game uses OpenAI's GPT-3 (ChatGPT) language model to generate prompts and clues for the user to guess the word in a particular category.

## Getting Started
These instructions will assist you in getting a copy of the project and running it on your local machine for development and testing purposes.

### Prerequisites
You will need the following software installed:
* [PHP](https://www.php.net/downloads)
* A web server like [Apache](https://httpd.apache.org/download.cgi)

### Installing
1. Clone this repository into your local machine:
git clone https://github.com/<your_username>/is215-ChatGPT-guessing-game.git

2. Place the cloned folder in your web server's document root.

3. Start the web server and open the game in your browser.

## How to Play
1. Click on the "Start Game" button to begin. It will generate a random category and ask the AI (ChatGPT) to suggest ten short sentences as a clue for that category.

2. After entering the clues, the game will begin. You will be given the first clue and a text box to enter your guess.

3. If you guess correctly, you win! Otherwise, you will be presented with another clue. You have up to 10 chances to guess correctly.

4. If you don't guess correctly within ten clues, the game will end, and the answer will be revealed.

5. Click the "Start All Over!" button to start a new game.

## Built With
* [OpenAI](https://openai.com/) - For the GPT-3 language model.
* [Bootstrap](https://getbootstrap.com/) - For styling the user interface.

## Code Explanation
The code uses PHP to implement the game logic and HTML with Bootstrap to create the user interface.

## Session Variables
The game uses PHP's session_start() function to create session variables that store data between page loads. The following session variables are used:

$_SESSION['category']: Stores the randomly selected category.
$_SESSION['catTitle']: Stores the category title.
$_SESSION['answer']: Stores the answer for the selected category.
$_SESSION['result']: Stores the result of the user's guess.
$_SESSION['clues']: Stores the clues for the selected category.
$_SESSION['clueList']: Stores the list of clues displayed to the user.
$_SESSION['counter']: Stores the number of guesses the user makes.

## Functions
The code includes three functions:
`showSelCat(): Displays the "Start Game" button and hides the "Guessing Game" div.
`hideSelCat(): Hides the "Start Game" button and displays the "Guessing Game" div.
`askchat(): Sends a prompt to the OpenAI GPT-3 model and returns the model's response.

showSelCat(): Displays the "Start Game" button and hides the "Guessing Game" div.
hideSelCat(): Hides the "Start Game" button and displays the "Guessing Game" div.
askchat(): Sends a prompt to the OpenAI GPT-3 model and returns the model's response.

## Game Logic
The game logic is implemented using conditional statements that check for POST requests. Once the user hits the "Start Game" button, the game randomly selects a category and asks the OpenAI GPT-3 model to suggest an answer. The game then asks the user to provide ten clues for the category.

When the user makes a guess, the game checks if the guess is correct. The game displays a "CORRECT!" message if the guess is correct. Otherwise, the game provides another clue, and the user can make another guess. If the user has made ten guesses without correctly guessing the category, the game displays an "Oops! Game Over!" message and reveals the correct answer.


## Authors
IS-215-Group 4 members, namely:
* Jomelanie Lee
* Melvir Nathan Paras
* Alvin Llobrera
* Joan Junio


## Acknowledgments
This project is created after completing the IS-215 Course for MIS at the University of the Philippines Open University (UPOU).

References:
* [OpenAI ](https://openai.com/) for ChatGPT
* Albacea, Eliezer A. Advanced Computer Systems. UP Open University, 2002
* Professor Katrina Joy Abriol-Santos
* Professor Blancaflor Arada

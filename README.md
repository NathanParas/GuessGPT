# IS215-Group 4: ChatGPT Guessing Game

This simple guessing game uses OpenAI's GPT-3 (ChatGPT) language model to generate prompts and clues for the user to guess the word in a particular category.

## Getting Started
These instructions will assist you in getting a copy of the project and running it on your local machine for development and testing purposes.

There are 2 ways to run the app in your local machine:

1.  Using docker container
* Prerequisite
  * [Docker desktop](https://www.docker.com/products/docker-desktop/) is installed.
* How to run?
  * Build docker image:
  ```sh
  docker build -t guess-gpt .
  ```
  * Run the app
  ```sh
  docker run -p 80:80 --rm -d guess-gpt
  ```
  * Open browser and access http://localhost/home.php
  
2. Using your locally installed web server
* Prerequisite
  * [PHP](https://www.php.net/downloads)
  * A web server like [Apache](https://httpd.apache.org/download.cgi)
* How to run?
  * Copy the files of `src` directory in your web server's document root.
  * Start the web server and open the game in your browser.

## How to Deploy to EC2 Instance

1. Create an EC2 instance (ensure at least port 80 is allowed to be accessed)
2. Install `docker` engine on the created EC2 instance. If chosen Machine Image is Amazon Linux, the `scripts/init-server.sh` file
   can be used to set up everything in that EC2 instance:
   ```bash
   ./scripts/init-server.sh path/to/file.pem ec2-user@your-ec2-instance-host.com
   ```
3. Update the API Key in `src/codes.php` (`$apiKey = "PUT YOUR API"`) with correct API Key
4. Once EC2 instance is set, run `scripts/deploy.sh` to deploy and run the application in the EC2 instance.
   Make sure `application.yaml` is already set with correct credentials and other app-specific configuration:
   ```bash
   ./scripts/deploy.sh path/to/file.pem ec2-user@your-ec2-instance-host.com
   ```
   Note: the `deploy` command stops a previous version of the code and start another instance with the latest changes in the code.

### Starting and Stopping Application
- To stop application on local machine or without manually connecting to remote EC2 instance, run the following command:
   ```bash
   ./scripts/stop.sh path/to/file.pem ec2-user@your-ec2-instance-host.com
   ```
- Similarly, to start the application (only possible if the app was already deployed):
  ```bash
  ./scripts/start.sh path/to/file.pem ec2-user@your-ec2-instance-host.com
  ```

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

* $_SESSION['category']: Stores the randomly selected category.
* $_SESSION['catTitle']: Stores the category title.
* $_SESSION['answer']: Stores the answer for the selected category.
* $_SESSION['result']: Stores the result of the user's guess.
* $_SESSION['clues']: Stores the clues for the selected category.
* $_SESSION['clueList']: Stores the list of clues displayed to the user.
* $_SESSION['counter']: Stores the number of guesses the user makes.

## Functions
The code includes three functions:
* `showSelCat(): Displays the "Start Game" button and hides the "Guessing Game" div.
* `hideSelCat(): Hides the "Start Game" button and displays the "Guessing Game" div.
* `askchat(): Sends a prompt to the OpenAI GPT-3 model and returns the model's response.

## Game Logic
1. The game logic is implemented using conditional statements that check for POST requests. 
2. Once the user hits the "Start Game" button, the game randomly selects a category and asks the OpenAI GPT-3 model to suggest an answer. 
3. The game then asks the user to provide ten clues for the category.
4. When the user makes a guess, the game checks if the guess is correct. 
5. The game displays a "CORRECT!" message if the guess is correct. 
6. Otherwise, the game provides another clue, and the user can make another guess. 
7. If the user has made ten guesses without correctly guessing the category, the game displays an "Oops! Game Over!" message and reveals the correct answer.


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

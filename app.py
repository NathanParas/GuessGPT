import openai
import random
from flask import Flask, render_template, request

# Setup OpenAI API key
openai.api_key = ""

# Categories
categories = [
    "Countries",
    "Sports",
    "Musical instruments",
    "Philippine Cities"
]

# Function to get a word from ChatGPT
def get_word(category):
    prompt = "Suggest a " + category.lower()
    response = openai.Completion.create(
        engine="davinci",
        prompt=prompt,
        max_tokens=1
    )
    word = response.choices[0].text.strip()
    return word

# Function to get 10 clues for the given word
def get_clues(word):
    prompt = "Suggest 10 short sentences that will serve as clues for someone to guess the " + word.lower()
    response = openai.Completion.create(
        engine="davinci",
        prompt=prompt,
        max_tokens=100
    )
    clues = [choice.text.strip() for choice in response.choices]
    return clues

# Create a Flask app
app = Flask(__name__)

# Define the home page
@app.route("/")
def home():
    return render_template("home.html")

# Define the game page
@app.route("/game", methods=["GET", "POST"])
def game():
    if request.method == "POST":
        guess = request.form["guess"]
        word = request.form["word"]
        guess_count = int(request.form["guess_count"])
        guess_history = request.form["guess_history"].split(",")
        if guess.lower() == word.lower():
            message = "Congratulations! You won the game."
            play_again = True
        else:
            guess_count += 1
            guess_history.append(guess)
            if guess_count == 10:
                message = "Sorry, you have run out of guesses. The word was " + word.lower()
                play_again = True
            else:
                message = "Incorrect guess. Guess again."
                play_again = False
        if play_again:
            return render_template("game_over.html", message=message)
        else:
            category = request.form["category"]
            word = get_word(category)
            clues = get_clues(word)
            guess_count = 0
            guess_history = []
            return render_template("game.html", category=category, word=word, clues=clues, guess_count=guess_count, guess_history=guess_history, message=message)
    else:
        category = random.choice(categories)
        word = get_word(category)
        clues = get_clues(word)
        guess_count = 0
        guess_history = []
        return render_template("game.html", category=category, word=word, clues=clues, guess_count=guess_count, guess_history=guess_history)

if __name__ == '__main__':
    app.run()

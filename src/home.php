
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Guessing Game</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
/* Reset */
*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Global styles */
html {
  scroll-behavior: smooth;
}

body {
  font-family: sans-serif;
}

    /* Navbar */
    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      z-index: 10;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 80px;
      background-color: rgba(0, 0, 0, 0.5);
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .navbar h1 {
      font-size: 2rem;
      font-weight: bold;
      text-transform: inherit;
      color: #fff;
    }

    /* Navigation drawer */
    .nav-drawer {
      position: fixed;
      top: 0;
      left: 0;
      z-index: 9;
      width: 200px;
      height: 100%;
      background-color: #fff;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
      transform: translateX(-100%);
      transition: transform 0.3s ease;
    }

    .nav-drawer.active {
      transform: translateX(0);
    }

    .nav-drawer-close {
      position: absolute;
      top: 0;
      right: 0;
      padding: 1rem;
      font-size: 2rem;
      cursor: pointer;
    }

    .nav-drawer h2 {
      font-size: 1.5rem;
      font-weight: bold;
      padding: 2rem 1rem 1rem;
    }

    .nav-drawer p {
      font-size: 1rem;
      padding: 0 1rem;
      margin-bottom: 2rem;
    }

    /* Navigation toggle */
    .nav-toggle {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 10;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 50px;
      height: 50px;
      background-color: rgba(0, 0, 0, 0.5);
      color: #fff;
      font-size: 2rem;
      cursor: pointer;
    }

/* Container */
.container {
  position: relative;
  z-index: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: calc(100vh - 80px); /* Subtract navbar height from full viewport height */
  padding: 0 2rem;
  text-align: center;
}

.container h2 {
  font-size: 4rem;
  font-weight: bold;
  margin-bottom: 2rem;
  color: #fff;
}

.container p {
  font-size: 2rem;
  margin-bottom: 2rem;
  color: #fff;
}

.play-button {
  display: inline-block;
  padding: 1rem 2rem;
  font-size: 1.5rem;
  font-weight: bold;
  text-transform: uppercase;
  color: #fff;
  background-color: #14f1d9;
  border: none;
  border-radius: 100px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  transition: background-color 0.3s ease;
}

.play-button:hover {
  cursor: pointer;
  background-color: #14f1d9;
  border-radius: 100px;
  color: white;
}

/* Background */
#background {
  position: fixed;
  top: 0;
  left: 0;
  z-index: -1;
  width: 100%;
  height: 100%;
  overflow: hidden;
  background-color: rgba(0, 0, 0, 0.5);
}

#background video {
  position: fixed;
  top: 0;
  left: 0;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: -1;
  opacity: 0.5;
  background-color: rgba(0, 0, 0, 0.5);
}


    .loader_bg{
    position: fixed;
    z-index: 999999;
    background: #fff;
    width: 100%;
    height: 100%;
    }
    .loader{
        border: 0 soild transparent;
        border-radius: 50%;
        width: 150px;
        height: 150px;
        position: absolute;
        top: calc(50vh - 75px);
        left: calc(50vw - 75px);
    }
    .loader:before, .loader:after{
        content: '';
        border: 1em solid #ff5733;
        border-radius: 50%;
        width: inherit;
        height: inherit;
        position: absolute;
        top: 0;
        left: 0;
        animation: loader 2s linear infinite;
        opacity: 0;
    }
    .loader:before{
        animation-delay: .5s;
    }
    @keyframes loader{
        0%{
            transform: scale(0);
            opacity: 0;
        }
        50%{
            opacity: 1;
        }
        100%{
            transform: scale(1);
            opacity: 0;
        }
    }

</style>
</head>

<body>

<div class="loader_bg">
    <div class="loader"></div>
</div>

<div id="background">
    <video autoplay muted loop controls>
      <source src="static/uploads/bg-video3.mp4" type="video/mp4">
    </video>
  </div>
  <nav class="navbar">
    <h1>IS215 Group 4 - GuessGPT-powered by Open.AI</h1>
  </nav>
  <section class="container">
    <h2>Welcome to the Guessing Game!</h2>
    <p>Are you ready to put your skills to the test?</p>
    <a href="index.php"><button class="play-button">Let's Play</button></a>
  </section>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        setTimeout(function(){
            $('.loader_bg').fadeToggle();
        }, 1500);
  </script>

</body>
</html>

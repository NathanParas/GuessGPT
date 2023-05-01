<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    <style type="text/css">
            html{
                
                background-size: cover;

            }
            body{
              background: none;
              background-color:DimGray;
              font-family: Arial, sans-serif;
              color: white;
            }

            h1 {
              font-family: 'Rubik', sans-serif;
              font-weight: bold;
              font-size: 4rem;
            }

            .input-group .form-control {
              width: 100%;
              border-top-right-radius: 0;
              border-bottom-right-radius: 0;
            }

            .form-control:focus {
              border-color: white;
              -webkit-box-shadow: none;
              -moz-box-shadow: none;
              box-shadow: none;
            }

            .form-control:focus {
              border-color: white;
              box-shadow: none;
            }
            .game-button {
              display: inline-block;
              padding: 0.5rem 1.5rem;
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

            .game-button:hover {
              cursor: pointer;
              background-color: #14f1d9;
              border-radius: 100px;
              color: white;
            }

            .giveup-button {
              display: inline-block;
              padding: 0.5rem 1.5rem;
              font-size: 1.5rem;
              font-weight: bold;
              text-transform: uppercase;
              color: #fff;
              background-color: #ff9999;
              border: none;
              border-radius: 100px;
              box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
              transition: background-color 0.3s ease;
            }

            .giveup-button:hover {
              cursor: pointer;
              background-color: #ffcccc;
              border-radius: 100px;
              color: white;
            }

            .flex-container {
              display: flex;
              flex-wrap: wrap;
              justify-content: center;
            }
            .flex-item {
                flex-basis: 33.33%;
                margin: 10px;
                text-align: center;
            }
            .clues {
                order: 1;
            }
            .input-group {
                order: 2;
            }
            .buttons {
                order: 3;
            }

            .category-cloud {
              margin-top: 20px;
              text-align: center;
            }

            .category-link {
              display: inline-block;
              margin: 5px;
              padding: 8px 16px;
              border: 1px solid #ccc;
              border-radius: 20px;
              font-size: 16px;
              text-decoration: none;
              color: #333;
              transition: all 0.2s ease-in-out;
            }

            .category-link:hover {
              background-color: #ccc;
              border-color: #999;
              color: #fff;
            }
  
            .category-link.animal {
              background-color: #ff9999; /* light red */
            }

            .category-link.food {
              background-color: #ffff99; /* light yellow */
            }

            .category-link.celebrity {
              background-color: #99ff99; /* light green */
            }

            .category-link.sport {
              background-color: #9999ff; /* light blue */
            }

            .category-link.brand {
              background-color: #ff99ff; /* light purple */
            }

            .category-link.movie {
              background-color: #ffcc99; /* light orange */
            }

            .category-link.tv-show {
              background-color: #99ccff; /* light sky blue */
            }

            .category-link.school-subject {
              background-color: #ccccff; /* light lavender */
            }

            .category-link.tourist-spot {
              background-color: #99ffcc; /* light seafoam green */
            }

            .category-link.religion {
              background-color: #ffcccc; /* light pink */
            }


            .input-group.mb-3 input[type="text"] {
              border-radius: 0;
              border: none;
              border-bottom: 2px solid #555;
            }

            .input-group.mb-3 button {
              border-radius: 0;
              border: none;
              background-color: #555;
              color: #fff;
            }

            .input-group.mb-3 button:hover {
              background-color: #333;
            }

            .guess-button {
              display: inline-block;
              padding: 0.5rem 1.5rem;
              font-size: 1.5rem;
              font-weight: bold;
              text-transform: uppercase;
              color: #fff;
              background-color: #ff6b6b; /* updated color */
              border: none;
              border-top-right-radius: 100px; /* updated radius */
              border-bottom-right-radius: 100px; /* updated radius */
              box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
              transition: background-color 0.3s ease;
            }

            .guess-button:hover {
              cursor: pointer;
              background-color: #ff4b4b; /* updated hover color */
              border-top-right-radius: 50px; /* updated hover radius */
              border-bottom-right-radius: 50px; /* updated hover radius */
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
              opacity: 0.4;
            }

            .button-3d {
              border: 1px solid #f0f0f0;
              background-color: #f0f0f0;
              color: #444;
              text-shadow: 0 1px 0 #fff;
              font-size: 1.2em;
              padding: 10px 20px;
              border-radius: 5px;
              cursor: pointer;
              position: relative;
              overflow: hidden;
            }

            .button-3d:before {
              content: "";
              display: block;
              position: absolute;
              top: 0;
              left: 0;
              width: 0%;
              height: 100%;
              background-color: rgba(255,255,255,0.3);
              transition: all 0.3s;
              z-index: -1;
            }

            .button-3d:hover:before {
              width: 100%;
            }

            .button-3d:active {
              top: 1px;
            }

            .button-3d:active:before {
              height: 50%;
              top: 25%;
            }

            .button-3d:focus {
              outline: none;
            }

            .button-3d:focus:before {
              width: 100%;
            }

            .button-3d:active:focus:before {
              height: 50%;
              top: 25%;
            }


            .container {
              padding: 50px;
            }

            .category-column {
              padding: 10px;
            }

            .category-column:first-child {
              padding-right: 50px;
            }

            .category-column:last-child {
              padding-left: 50px;
            }
          .loading-spinner{

            position:relative;
            display:block;
          }
          @keyframes spinner {
            to {transform: rotate(360deg);}
          }
          .spinner {
              min-height:36px;
          }
          .spinner:before {
            content: '';
            box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin-top: -10px;
            margin-left: -10px;
            border-radius: 50%;
            border: 2px solid #ccc;
            border-top-color: #333;
            animation: spinner 1s linear infinite;
          }

          </style>
      <title>IS215 A5-Group 4</title>
</head>

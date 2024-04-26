<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Welcome</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Jan 29 2024 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <title>Welcome to Our System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .welcome-section {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Creates three columns */
            gap: 20px; /* Space between grid items */
            padding: 20px;
        }

        .feature {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .add-to-chrome {
            background-color: #4285F4; /* Chrome button color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px; /* Adds some space above the button */
        }

        .button-style {
            display: inline-block;
            background-color: #4285F4; /* Chrome button color */
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none; /* Removes underline from links */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

            .button-style:hover {
                background-color: #357ae8; /* Slightly darker shade for hover effect */
            }
        /*example*/
       
        .container22 {
            display: flex;
            flex-direction: column;
            width: 100%;
            background-color: white;
            border-radius: 15px;
        }

        .row22 {
            display: flex;
            width: 100%;
            border-radius: 15px;
        }

        /* Ensures that all column divs have a consistent base size */
        .column22 {
            display: flex;
            flex-direction: column;
            /*justify-content: center;*/
            /*align-items: center;*/
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 15px;

        }

        /* Controls the size and alignment of images to make them the same */
        .image-container22 {
            flex: 1; /* Allows flexible growth to fill the space */
            max-width: 15%; /* Limits the maximum width */
        }

        /* Specific class for the row that contains image, tutorial text, and code */
        .combined-row22 {
            display: flex;
            flex-wrap: nowrap; /* Ensures no wrapping occurs */
        }

        .text-content22{
            flex: 1; /* Allows these sections to grow and fill the available space */
            max-width: 35%; /* Adjusts maximum width to balance space */
        }
        .code-content {
            flex: 1; /* Allows these sections to grow and fill the available space */
            max-width: 50%; /* Adjusts maximum width to balance space */
        }

        .scrollable-content22 {
            overflow-y: auto;
            max-height: 250px; /* Ensures scrollable area if content is too long */
        }
        .scrollable-content23 {
            overflow-y: auto;
            max-height: 250px; /* Ensures scrollable area if content is too long */
            max-width: 100%;

        }

        .image-style {
            width: 100%; /* Ensures images fill their container */
            border-radius: 10px;
        }
    </style>
    
</head>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/imageNarrator logo.png" alt="">
                <span class="d-none d-lg-block">IMAGE NARRATOR</span>
            </a>
           
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li>
                    <a class="nav-link nav-icon" href="https://chrome.google.com/webstore/detail/summary-for-google-with-c/cmnlolelipjlhfkhpohphpedmkfbobjc">
                        <i class="bx bxl-google"></i>
                    </a><!-- End chrome Icon -->
                </li>
                <!-- Register Button -->
                <li class="ms-3">
                    <!-- Add some margin to the left of the Register button -->
                    <a class="btn btn-sm btn-outline-primary" href="pages-register.php">Register</a> 
                </li>
                <!-- Login Button -->
                <li class="ms-3">
                    <!-- Add some margin to the left of the login button -->
                    <a class="btn btn-sm btn-outline-primary" href="pages-login.php">Login</a> 
                </li>
            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <br />
    <br />
    <div class="welcome-section">
        <h1>Hello Friend!</h1>
        <p>Discover how our system can enhance your workflow with the following features, press [Add to Chrome]button to start:</p>
        <a class="btn btn-sm btn-outline-primary" href="https://chrome.google.com/webstore/detail/summary-for-google-with-c/cmnlolelipjlhfkhpohphpedmkfbobjc" target="_blank" >
            Add to Chrome
        </a>
        <a class="btn btn-sm btn-outline-primary example-btn"  href="#example">
            Example
        </a>
    </div>

    <div class="features-grid">
    <div class="feature">
            <h2>Natural Language Interaction</h2>
            <p> Interact with our AI in real-time conversations, effortlessly seeking information or help.</p>
        </div>
        <div class="feature">
            <h2>Image Text Recognition</h2>
            <p>This is the process of recognizing and extracting text from images and documents. This feature would allow the system to take an image as input and provide the extracted text as output.</p>
        </div>
        <div class="feature">
            <h2>Image Caption</h2>
            <p>This feature would likely generate descriptive text for images, which is particularly useful for accessibility, allowing visually impaired users to understand the content of images.</p>
        </div>
        <div class="feature">
            <h2>Personalized Learning Record</h2>
            <p>Monitor your educational progress by tracking video consumption, engagement with image captions, and completion of various exercises.</p>
        </div>
        <div class="feature">
            <h2>Assessment</h2>
            <p>The assessment feature is generally used to evaluate the user's understanding or skill in a particular area. This could be through quizzes, tests, or interactive challenges that gauge progress or competency.</p>
        </div>
        <div class="feature">
            <h2>NonVisual Desktop Access</h2>
            <p>NVDA is an actual screen reader application that allows blind and visually impaired users to read the screen with a text-to-speech output or braille display. This feature implies the software is compatible or integrated with NVDA to ensure accessibility.</p>
        </div>
    </div>
    <!--example-->
    <div style="padding: 20px;"id="example">
        <h3>
            
            <a href="https://www.youtube.com/watch?v=QZE9ohRRwRA&list=PLCX-BLZ1hDpCAZmO8XjAC3dJrIv2807kR">
                Python Programming Foundation 01. Lecture 1: Data Types and If Else
            </a>
        </h3>
        
        <div class="container22">
            <div class="row22">
                
                <!-- This empty div is for aligning the first image to maintain the layout consistency -->
                <div class="column22" style="flex: 2;">
                    python tutorial<br />This tutorial introduces Python basics in less than 10 minutes,
                    covering variable assignment, data types, math operations, logic statements,
                    loops, functions, and error handling using try and except blocks.
                </div>
            </div>
            <!--1-->
            <table>
                <tr>
            <div class="row22 combined-row22">
                <!-- Second Image Container -->
                <div class="column22 image-container22">
                    <h1>Image 1</h1>
                </div>
                <!-- Tutorial Text Container -->
                <div class="column22 text-content22">
                    <div class="scrollable-content22">
                        The image shows a screenshot of a Jupyter notebook which is running a Python code cell.
                        The code is meant to print a simple text representation of a triangle by using asterisks (*).
                        The output of the code is displayed below the cell, showing the triangle with one asterisk 
                        in the first row, two in the second, and so on, up to six asterisks in the sixth row.
                    </div>
                </div>
                <!-- Code Snippet Container -->
                <div class="column22 code-content">
                    <div class="scrollable-content23">
                        <pre>
# draw triangle 
print("triangle") 
print("*") 
print("**") 
print("***") 
print("****") 
print("*****") 
print("******") 
                    </pre>
                    </div>
                </div>
            </div>
    </tr>
            <!--2-->
            <div class="row22 combined-row22">
                <!-- Second Image Container -->
                <div class="column22 image-container22">
                <h1>Image 2</h1>
                </div>
                <!-- Tutorial Text Container -->
                <div class="column22 text-content22">
                    <div class="scrollable-content22">
                        The image you've provided appears to be a screenshot of a Jupyter notebook
                        that is part of a Python programming course, 
                        specifically Lecture 1 on Data Types and If Else statements.
                        The notebook is from NTU's (likely National Taiwan University) Chemical Engineering department,
                        as indicated by the logos, and is part of their OpenCourseWare (OCW) offerings.
                    </div>
                </div>
                <!-- Code Snippet Container -->
                <div class="column22 code-content">
                    <div class="scrollable-content23">
                        <pre>
# Give the initial amount 
allowance = int(float(input("x = "))) 
# Compute residual 
if allowance >= 70: 
    allowance -= 70 
if allowance >= 30: 
    allowance -= 30 
if allowance >= 150: 
    allowance -= 150 
print("Total residual is", allowance) 
                    </pre>
                    </div>
                </div>
            </div>
            <!--3-->
            <div class="row22 combined-row22">
                <!-- Second Image Container -->
                <div class="column22 image-container22">
                <h1>Image 3</h1>
                </div>
                <!-- Tutorial Text Container -->
                <div class="column22 text-content22">
                    <div class="scrollable-content22">
                        The image you've uploaded is a screenshot of a Jupyter notebook, 
                        which appears to be part of a programming lecture related to Python data types 
                        and conditional (if-else) statements. It includes instructions for a classic programming 
                        challenge known as "FizzBuzz". The notebook is from an NTU (National Taiwan University) course,
                        as indicated by the NTU and OCW (OpenCourseWare) logos.
                        The instructions outlined in the screenshot are as follows:
                        If the input integer is a multiple of 3, print "Fizz".
                        If the input integer is a multiple of 5, print "Buzz".
                        If the input integer is a multiple of both 3 and 5, print "FizzBuzz".
                        If the input integer is none of the above, print "Whoops".
                        The code cell in the screenshot is partially visible and includes a Python code snippet that takes an input number and checks whether it's within a certain range (between 0 and 100). It then applies the "FizzBuzz" logic based on the rules provided.
                    </div>
                </div>
                <!-- Code Snippet Container -->
                <div class="column22 code-content">
                    <div class="scrollable-content23">
                        <pre>
iii. floor(4.00) = 4
c. Next, if the input integer is:
i. multiples of 3, print "Fizz"
ii. multiples of 5, print "Buzz"
iii. multiples of both 3 and 5, print "FizzBuzz"
iv. none of above, print "Whoops"
In [ ]: num = input('FizzBuzz! please enter a number between 0 and 100: \n')
# convert input into float then integer.
num = int(float(num))
# you might try "num int(num)" instead, in this way our program couldn't handle negative numbers.
# check if our input is within the range between 0 and 100
# 1st way
if (num >= 0) and (num <= 100):
    # check if the number is divisible by 3 and 5 using the modulo operator (%)
    if (num % 3 == 0) and (num % 5 == 0):
        print("FizzBuzz")
    # check if the number is divisible by 3 only
    elif (num % 3 == 0):
        print("Fizz")
    # check if the number is divisible by 5 only
    elif (num % 5 == 0):
        print("Buzz")
    # if none of the above conditions are met, print "Whoops"
    else:
        print("Whoops")

else:
    print("Your number is out of range. Please enter a number between 0 and 100.")
                    </pre>
                    </div>
                </div>
            </div>
</table>
        </div>
    </div>
</body>
</html>

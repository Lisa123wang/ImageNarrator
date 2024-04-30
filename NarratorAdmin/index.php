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
            
            <a href="https://www.youtube.com/watch?v=D0Nb2Fs3Q8c&t=167s">
            While Loops in Python
            </a>
        </h3>
        
        <div class="container22">
    
        <!-- This empty td is for aligning the first image to maintain the layout consistency -->
        
            <div class="column22" style="flex: 2;">
            Seeing that a while loop can do the same thing as a for loop
            </div>
        
        <table class="row22">
        <!--1-->
        <tr class="row22 combined-row22">
            <!-- Second Image Container -->
            <td class="column22 image-container22">
                <h3>00-01-52</h3>
            </td>
            <!-- Tutorial Text Container -->
            <td class="column22 text-content22" >
                <div class="scrollable-content22">
                The image shows a computer screen with a Python code editor open. 
                The editor is displaying a Python script titled 'testarea.py', 
                which includes a simple program. 
                This program appears to calculate the cumulative sum of numbers from 0 to 9, 
                printing out the running total at each step in a loop. Below the editor,
                 there's an output panel displaying the results of running this script, 
                 showing the cumulative sums. The user interface of the code editor has 
                 several toolbars with various icons for file and edit operations, 
                 as well as for running and debugging Python scripts.
                </div>
            </td>
            <!-- Code Snippet Container -->
            <td class="column22 code-content">
                <div class="scrollable-content23">
                    <pre>
The image showcases a Python script opened in an IDE 
(probably a Python-specific IDE given the built-in Python Interpreter at the bottom). 
The script includes a loop that cumulatively adds integers from 0 up to 9 
to a sum variable and prints the sum after each addition. 
Here’s the script cleaned up and ready for execution:

```python
sum = 0
for i in range(10):
sum += i
print(sum)
```

When this script is executed, 
it will output the cumulative sum for each iteration of the loop, 
producing the following outputs in order:

```
0
1
3
6
10
15
21
28
36
45
```

This output sequence can be seen in the Python Interpreter 
window at the bottom of the image.
                    </pre>
                </div>
            </td>
        </tr>
        <!--2-->
        <tr class="row22 combined-row22">
            <!-- Second Image Container -->
            <td class="column22 image-container22">
                <h3>00-02-30</h3>
            </td>
            <!-- Tutorial Text Container -->
            <td class="column22 text-content22">
                <div class="scrollable-content22">
                The image displays a Python programming environment, 
                specifically an editor called PyScripter. You can see Python code written in the upper portion 
                of the window, which appears to involve two different loops for summing numbers. Below the code, 
                there is an output panel showing the result of the executed Python script. 
                Toolbars and menu options of the PyScripter IDE are visible at the top of the window, 
                providing different functionalities for coding and debugging
                </div>
            </td>
            <!-- Code Snippet Container -->
            <td class="column22 code-content">
                <div class="scrollable-content23">
                    <pre>
The image contains Python code that demonstrates two approaches 
for accumulating the sum of numbers from 0 to 9, 
and displaying the sum at every step of the addition.

Here's a corrected and executable version of the code displayed in the image:

```python
# Initialize sum and i
sum_result = 0
i = 0

# Using a while loop to add numbers from 0 to 9
while i < 10:
sum_result += i
print(sum_result)
i += 1

# Reset sum_result for the next loop
sum_result = 0

# Using a for loop to do the same addition
for i in range(10):
sum_result += i
print(sum_result)
```

This code will print the cumulative sum at each step from 0 to 9 
for both the while loop and the for loop. The outputs for each loop are the same, 
providing a step-by-step sum that helps illustrate how accumulation works inside loops. 
                    </pre>
                </div>
            </td>
        </tr>
        <!--3-->
        <tr class="row22 combined-row22">
            <!-- Second Image Container -->
            <td class="column22 image-container22">
                <h3>00-05-12</h3>
            </td>
            <!-- Tutorial Text Container -->
            <td class="column22 text-content22">
                <div class="scrollable-content22">
                The image shows a computer screen with an open Python development environment, 
                specifically the PyScripter application. There's a script named \"testarea.py\" 
                actively displayed in the editor window, and some elements of the 
                program's user interface are visible, such as menu bars and toolbars 
                with various icons for file and edit operations, debugging, and running scripts.
                Below the scripting area, the Python interpreter pane is visible, 
                displaying some output results from executed code. 
                Additionally, there are multiple tabs for Python files, 
                including \"factorial.py\" and \"fibonacci.py\" alongside \"testarea.py\". 
                The environment is set up for coding and running Python scripts, 
                and it appears to be used for testing or learning purposes.
                </div>
            </td>
            <!-- Code Snippet Container -->
            <td class="column22 code-content">
                <div class="scrollable-content23">
                    <pre>
The code in the image is partially visible. 
It is designed to calculate the sum of integers from 0 to 9 
and prints the running total after each addition. 
The visible part of the code is a Python script, and it works with a while loop.

Here is the complete and executable version of the code based on the part shown:

```python
sum = 0
i = 0
while i < 10:
sum += i
print(sum)
i += 1
```

When this code is executed, it prints the running total after each addition of a 
new integer from 0 up to 9. For example, after the first iteration (i=0), 
it prints 0; after the second (i=1), it prints 1; after the third (i=2), 
it prints 3; and so on, up until it adds 9 and 
prints the total sum of these numbers, which is 45
                    </pre>
                </div>
            </td>
        </tr>
    </table>
</div>

    </div>
</body>
</html>

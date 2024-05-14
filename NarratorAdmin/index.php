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
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 15px;
        overflow: auto; /* Enable scroll bars for overflowing content */
    }

    /* Controls the size and alignment of images to make them the same */
    .time-container22 {
        width: 10%; /* Limits the maximum width */
        overflow: hidden; /* Hide overflow for time container */
    }

    /* Specific class for the row that contains image, tutorial text, and code */
    .combined-row22 {
        display: flex;
        flex-wrap: nowrap; /* Ensures no wrapping occurs */
    }

    .caption-content22 {
        flex: 1; /* Allows these sections to grow and fill the available space */
        width: 20%; /* Adjusts maximum width to balance space */
    }

    .text-content {
        flex: 1; /* Allows these sections to grow and fill the available space */
        width: 40%; /* Adjusts maximum width to balance space */
    }

    .exercise-content22 {
        flex: 1; /* Allows these sections to grow and fill the available space */
        width: 30%; /* Adjusts maximum width to balance space */
    }

    /* Scrollable content */
    .scrollable-content22,
    .scrollable-content23 {
        overflow-y: auto;
        max-height: 250px; /* Ensures scrollable area if content is too long */
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
                <!--
                <li>
                    <a class="nav-link nav-icon" href="https://chrome.google.com/webstore/detail/summary-for-google-with-c/cmnlolelipjlhfkhpohphpedmkfbobjc">
                        <i class="bx bxl-google"></i>
                    </a><!-- End chrome Icon -->
                <!--</li>-->
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
        <p>Discover how our system can enhance your workflow with the following features:</p>
        <!--
        <a class="btn btn-sm btn-outline-primary" href="https://chrome.google.com/webstore/detail/summary-for-google-with-c/cmnlolelipjlhfkhpohphpedmkfbobjc" target="_blank" >
            Add to Chrome
        </a>
        -->
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
                <tr class="row22 combined-row22">
                    <td class="column22 time-container22">Time</td>
                    <td class="column22 caption-content22" >Image Caption</td>
                    <td class="column22 text-content">Image Text Detection</td>
                    <td class="column22 exercise-content22" >Exercise</td>
                </tr>
                <!--1-->
                <tr class="row22 combined-row22">
                    <!-- Second Image Container -->
                    <td class="column22 time-container22">
                        <h5>00-00-47</h5>
                    </td>
                    <!-- Tutorial Text Container -->
                    <td class="column22 caption-content22" >
                        <div class="scrollable-content22">
                        The image displays a Python programming environment called IDLE. There is Python code written in the editor window, and the corresponding output of this code is shown in the Python interpreter window at the bottom. The code is designed to calculate cumulative sums of integers from 0 to 9 in a loop and prints each sum, but the specific details of the code have not been analyzed as per your request. The environment features various menu options and toolbar icons typical for editing and running Python scripts.
                        </div>
                    </td>
                    <!-- Code Snippet Container -->
                    <td class="column22 text-content">
                        <div class="scrollable-content23">
                            <p>
The image displays a Python program 
written in an editor.
Below is the transcription of the code, 
with corrections and improvements 
for clarity and functionality:
</p>
<pre style="border: 1px solid #000;">
```python
sum = 0
for i in range(10):
sum = sum + i
print(sum)
```
</pre>
<p>
In this corrected script, 
`sum` is initialized to `0`, 
and then a `for` loop iterates from `0` to `9` 
(because `range(10)` generates numbers from `0` to `9`). 
In each iteration, the current number `i` is added to `sum`, 
and then `sum` is printed. This means the program will 
print the cumulative sum at each step of the loop.

Here's how the output will look when this code is run:
</p>
<pre>
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
</pre>
<p>
The output represents the cumulative total 
of the numbers from `0` to `9`. 
Each line is the sum of all numbers up to that point 
in the sequence generated by `range(10)`.
                            </p>
                        </div>
                    </td>
                    <td class="column22 exercise-content22" >
                        <div class="scrollable-content22">
                            <p>
The image is clearly about coding, 
specifically it looks like Python code in an editor environment. 
The Python script calculates the sum of numbers from 0 to 9 
(since it uses `range(10)`) and prints the sum after every addition.

### Coding Problem:
Modify the given program to calculate the sum of the squares
 of the numbers from 1 to N, where N is provided by the user.
</p>
<pre style="border: 1px solid #000;">
### Solution:
```python
N = int(input("Enter the value of N: "))
sum_squares = 0

for i in range(1, N+1):
sum_squares += i**2

print("The sum of the squares from 1 to", N, "is", sum_squares)
```
</pre>
<p>
This modification of the original script 
includes a variable `N` which takes input from the user 
to define the range up to which squares of numbers are summed, 
improving the functionality to be more dynamic and user-controlled.
                            </p>

                        </div>
                    </td>
                </tr>
                <!--2-->
                <tr class="row22 combined-row22">
                    <!-- Second Image Container -->
                    <td class="column22 time-container22">
                        <h5>00-02-49</h5>
                    </td>
                    <!-- Tutorial Text Container -->
                    <td class="column22 caption-content22">
                        <div class="scrollable-content22">
                        The image displays a software interface, which appears to be an Integrated Development Environment (IDE) for coding in Python. The main section of the window shows a text editor with Python code. Below the code editor, there's an output panel where the results of the code appear when executed. The environment includes various menu options like 'File', 'Edit', and 'Run', and a toolbar with buttons for common actions such as saving files, running scripts, and debugging. The IDE seems to be set up for writing and testing Python programs, as evidenced by the presence of visible Python code and output.
                        </div>
                    </td>
                    <!-- Code Snippet Container -->
                    <td class="column22 text-content">
                        <div class="scrollable-content23">
                            <p>
The image contains a screenshot of a Python script running in an IDE environment. The Python code presented in the screenshot is visible and includes the following lines of an executable script:
</p>
<pre style="border: 1px solid #000;">
```python
sum = 0
i = 0
while i < 10:
sum = sum + i
print(sum)
i = i + 1
```
</pre>
<p>
This script initializes two variables: `sum` at 0 and `i` at 0. It then enters a `while` loop, which runs as long as `i` is less than 10. In each iteration of the loop, it adds `i` to `sum` and prints the current value of `sum`. After this, it increments `i` by 1.

The output of the script, as can be inferred from the image's Python interpreter section where the outcome is displayed, shows the cumulative sum after each addition:
</p>
<pre>
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
</pre>
<p>
These values correspond to the sequential addition of each number from 0 to 9 to the sum. Each printed line reflects the total after each new number is added.
                            </p>
                        </div>
                    </td>
                    <td class="column22 exercise-content22" >
                        <div class="scrollable-content22">
                            <p>
                        The image shows a coding environment with a Python script that computes and prints the sum of an increasing integer series using a while loop.

**Coding Problem:**
The script in the image continually adds `i` to `sum` where `i` starts from 0 and increments until it is less than 10. The script then prints the current value of `sum` each time after adding `i`. Modify the script to compute the sum of all numbers from 0 to 9 (inclusive) and print the final sum after the loop finishes instead of printing the sum during each iteration.

**Solution:**
Here is the modified script that accomplishes this task:
    </p>
    <pre style="border: 1px solid #000;">
```python
sum = 0
i = 0
while i < 10:
sum = sum + i
i = i + 1
print(sum) # Move the print statement outside of the loop
```
</pre>
<p>
When executed, this script will output `45`, which is the sum of numbers 0 through 9.
</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">

    <link rel="stylesheet" href="../style/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summary.js/1.0.2/summary.min.js"></script>

    <title>Log Complaint - CMS</title>
    <style>
        /* Style for the description field */
        #complaint {
            font-family: Arial, sans-serif;
            /* Use a nice font */
            font-size: 16px;
            /* Adjust font size */
            color: #333;
            /* Text color */
            padding: 10px;
            /* Padding for better readability */
            border: 1px solid #ccc;
            /* Border */
            border-radius: 5px;
            /* Rounded corners */
            width: 100%;
            /* Full width */
            box-sizing: border-box;
            /* Include padding and border in the width */
        }

        /* CSS for the purple checkbox */
        .verify-checkbox input[type="checkbox"] {
            visibility: hidden;
        }

        .verify-checkbox label {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 20px;
            cursor: pointer;
            font-size: 16px;
            color: #333;
        }

        .verify-checkbox label:before {
            content: '';
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 25px;
            height: 25px;
            border: 2px solid #8A2BE2;
            /* Purple color */
            background-color: #fff;
            border-radius: 5px;
        }

        .verify-checkbox input[type="checkbox"]:checked+label:before {
            background-color: #8A2BE2;
            /* Purple color */
        }

        .verify-checkbox label:after {
            content: '';
            display: block;
            position: absolute;
            top: 5px;
            left: 9px;
            width: 8px;
            height: 15px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            visibility: hidden;
        }

        .verify-checkbox input[type="checkbox"]:checked+label:after {
            visibility: visible;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="blob-container">
            <div class="blob"></div>
            <div class="blob one"></div>
            <div class="blob two"></div>
            <div class="blob three"></div>
            <div class="blob four"></div>
            <div class="blob five"></div>
            <div class="blob six"></div>
            <div class="blob seven"></div>
            <div class="blob eight"></div>
            <div class="blob nine"></div>
            <div class="blob ten"></div>
        </div>
        <section>
            <div class="card">
                <div class="title">
                    <img src="../assets/graphics_log.svg" class='logGraphics' style='height: 250px' />
                    <h1 style='font-size: 40px'><span>CMS<br></span> Log Complaint</p>
                </div>
                <div class="description">
                    <div class="login-form">
                        <h2>Complaint Details</h2>
                        <form action="../handlers/recordComplaint.php" method="POST">
                            <label for="name">Name:</label>
                            <input placeholder="Enter your name" type="text" id="name" name="name" required><br>
                            <label for="contact">Contact number</label>
                            <input placeholder="Enter your Contact number" pattern="[789][0-9]{9}" type="text"
                                id="contact" name="contact" required><br>
                            <label for="email">Email:</label>
                            <input placeholder="Enter your email address" type="email" id="email" name="email"
                                required><br>
                            <label for="title">Title</label>
                            <input placeholder="Title of your complaint" type="text" id="title" name="title"
                                required><br>
                            <label for="pdf">Upload PDF:</label>
                            <input type="file" id="pdf" name="pdf" accept=".pdf" required><br>
                            <label for="complaint">Complaint:</label><br>
                            <!-- <textarea placeholder="Explain your complaint briefly" id="complaint" name="complaint"
                                rows="4" cols="50" required></textarea><br>
                            <button type="submit">Submit</button> -->
                            <textarea placeholder="Explain your complaint briefly" id="complaint" name="complaint"
                                rows="10" cols="20" required></textarea><br>
                            <div class="verify-checkbox">
                                <input type="checkbox" id="verify" name="verify" required>
                                <label for="verify">I verify that the details provided above are correct</label>
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                        <!-- Include PDF.js library -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

                        <script>
                            document.getElementById('pdf').addEventListener('change', function () {
                                var file = this.files[0];
                                var reader = new FileReader();

                                reader.onload = function () {
                                    var typedarray = new Uint8Array(reader.result);

                                    // Load the PDF file using PDF.js
                                    pdfjsLib.getDocument(typedarray).promise.then(function (pdf) {
                                        // Fetch the first page of the PDF
                                        return pdf.getPage(1);
                                    }).then(function (page) {
                                        // Extract text content from the page
                                        return page.getTextContent();
                                    }).then(function (textContent) {
                                        // Combine text items into a single string
                                        var text = textContent.items.map(function (item) {
                                            return item.str;
                                        }).join(' ');

                                        // Summarize the text (Here, we simply limit to first 100 characters as a basic summary)
                                        var summary = text.substring(0, 10000) + '...';

                                        // Populate the summary into the description field
                                        document.getElementById('complaint').value = summary;
                                    }).catch(function (error) {
                                        console.error(error);
                                        alert('An error occurred while summarizing the PDF content.');
                                    });
                                };

                                reader.readAsArrayBuffer(file); // Read the contents of the PDF file as ArrayBuffer
                            });
                        </script>



                        <?php
                        if ($_GET) {
                            if ($_GET['id']) {
                                $ref = $_GET['id'];
                                echo "<h3 style='font-weight: 600; color: green'>Reference id: $ref</h3>";
                            }
                        }
                        ?>
                    </div>
                </div>


            </div>
    </div>
    <form action="../handlers/goHome.php" method="POST">
        <button class="homeBtn" href="http://localhost/Complaint-Management-PHP-main/pages/landing.php">Home</button>
    </form>
    </section>
    </div>
    <?php
    $message = "Not recorded";
    if ($_GET) {
        if ($_GET["success"]) {
            $val = $_GET["success"];
            if ($val == '1') {
                echo '<script>
      alert("Updated Successfully")
      </script>';
            } else {
                echo '<script>
      alert("Error Occurred")
      </script>';
            }
        }
    }
    ?>
</body>

</html>
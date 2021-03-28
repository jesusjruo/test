<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Chicksgold Test</title>
</head>

<body>
    <div>
        <h2> #1 </h2>
        <form id="numberForm" method="post">
            <div>
                Number: <input type="number" name="num" id="number" required />
                <input type="submit" name="submitBtn" id="submitBtn" value="submit" />
            </div>
        </form>
    </div>
    <div>
        Result: <textarea id="result" style="display: none;"></textarea>
    </div>

    <div>
        <h2> #2 </h2>
        <p> First of all, I'll apply the <b>PDO class</b> and the __construct() method in order to establish my database connection. <br />
            <b>PDO::beginTransaction()</b> , <b>PDO::commit()</b> , <b>PDO::query() and/or PDO::exec()</b> depending whether
            I want to get an object from the method as a response (containing the data from the database) or the number of columns affected by the sentence.<br />
            <b>PDO::errorCode() or PDO::errorInfo()</b> to handle errors.<br />
            <b>PDO:: Rollback()</b> to roll back the current transaction initiated by PDO::beginTransaction().<br />
            etc...
        </p>

    </div>

    <div>
        <h2> #3 </h2>
        <p> There are couple ways to prevent Cross-site Scripting. <br />
            <b>Htmlspecialchars: </b> Convert special characters to HTML entities. This is one of the famous methods to prevent XSS <br />
            <b> Strip_tags: </b> Strip HTML and PHP tags from a string. This function tries to return a string with all NULL bytes, HTML, and PHP tags stripped from a given string.<br />
            <b> Style-src: </b> Limits the sources for CSS files. <br />
            <b> Connect-src: </b> Directive restricts the URLs which can be loaded using script interfaces. This helps guard against cross-site scripting attacks (XSS) on PHP Applications.<br />
            We can also make use of third-party PHP libraries such as PHP Anti-XSS or HTML Purifier.
        </p>

    </div>

    <div>
        <h2> #4 </h2>

        <p> <b>Code added:</b> <br /><br />

            $extension = pathinfo($filepath, PATHINFO_EXTENSION); <br />

            if (!$extension) {<br />
            return "";<br />
            } else {<br>
            return $extension;<br />
            }<br>

        </p>

        <p> <b> Result: </b> </p>

        <?php
        function getExtension($filepath)
        {
            //----------DO NOT MODIFY CODE ABOVE THIS ROW, IT WILL ANYWAY BE RESET BEFORE EXECUTION----------

            $extension = pathinfo($filepath, PATHINFO_EXTENSION);

            if (!$extension) {
                return "";
            } else {
                return $extension;
            }

            //----------DO NOT MODIFY CODE BELOW THIS ROW, IT WILL ANYWAY BE RESET BEFORE EXECUTION----------
        }
        print "<b>blah.gif:</b>      " . getExtension("blah.gif") . "<br />\n";
        print "<b>my.file.gif:</b>   " . getExtension("my.file.gif") . "<br />\n";
        print "<b>this/is/afile:</b> " . getExtension("this/is/afile") . "<br />\n";
        ?>

    </div>

    <div>
        <h2> #5 </h2>

        <p> <b>Code added:</b> <br /><br />

        $result = checkObject($obj);<br /><br />

        if($result) {<br />
            echo "True";<br />
        }else{<br />
            echo "False";<br />
        }<br /><br />

        function checkObject($obj)<br />
        {<br /><br />
            //----------DO NOT MODIFY CODE ABOVE THIS ROW, IT WILL ANYWAY BE RESET BEFORE EXECUTION----------<br /><br />

            if($obj instanceof First || $obj instanceof Second || $obj instanceof Third){<br />

                return true;<br />

            }else{<br />

                return false;<br />
            }<br /><br />

            //----------DO NOT MODIFY CODE BELOW THIS ROW, IT WILL ANYWAY BE RESET BEFORE EXECUTION----------<br />
        }<br />

        </p>

        <p> <b> Result: </b> </p>

        <?php

        class First
        {
        }

        class Second
        {
        }

        class Third extends Second
        {
        }

        class Fourth
        {
        }

        $obj = new Third;

        $result = checkObject($obj);

        if($result) {
            echo "True";
        }else{
            echo "False";
        }

        function checkObject($obj)
        {
            //----------DO NOT MODIFY CODE ABOVE THIS ROW, IT WILL ANYWAY BE RESET BEFORE EXECUTION----------

            if($obj instanceof First || $obj instanceof Second || $obj instanceof Third){

                return true;

            }else{

                return false;
            }

            //----------DO NOT MODIFY CODE BELOW THIS ROW, IT WILL ANYWAY BE RESET BEFORE EXECUTION----------
        }

        ?>

    </div>

</body>

</html>

<script>
    $(document).ready(function() {

        $(document).ready(function() {
            $('#numberForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'backend.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    processData: false,
                    success: function(response) {
                        // var jsonData = JSON.parse(response);
                        if (response.success == "1") {
                            $('#result').css("display", "block");
                            $('#result').text(response.data);
                            alert("Success");
                        }

                        if (response.success == "2") {
                            alert("Limit exceeded");
                        }

                        if (response.success == "3") {
                            alert("Not integer value");
                        }

                        if (response.success == "0") {
                            alert("Oops, something went wrong");
                        }
                    }
                });
            });
        });
    });
</script>
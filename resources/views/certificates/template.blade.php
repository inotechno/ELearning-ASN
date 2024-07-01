<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f3f3f3;
        }
        .container {
            position: relative;
            width: 270mm; /* Adjusted width for padding */
            height: 184mm; /* Adjusted height for padding */
            padding: 10mm; /* Adjusted padding to fit content within A4 size */
            background-color: white;
            border: 10px solid tan; /* Adjusted border to fit within the page */
            box-sizing: border-box;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .logo {
            color: tan;
            font-size: 28px;
            margin-bottom: 10px;
        }
        .marquee {
            color: tan;
            font-size: 58px;
            margin: 10px 0;
        }
        .assignment, .reason {
            margin: 10px 0;
        }
        .person {
            border-bottom: 2px solid black;
            font-size: 42px;
            font-style: italic;
            margin: 10px auto;
            width: 400px;
        }
    </style>
</head>

<body>
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="logo">
            An Organization
        </div>
        <div class="marquee">
            Certificate of Completion
        </div>
        <div class="assignment">
            This certificate is presented to
        </div>
        <div class="person">
            {{ $name }}
        </div>
        <div class="reason">
            For deftly defying the laws of gravity<br/>
            and flying high in the course<br/>
            {{ $course }}
        </div>
        <div class="assignment">
            Awarded on {{ $date }}
        </div>
    </div>
</body>

</html>

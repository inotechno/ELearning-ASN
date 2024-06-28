<!DOCTYPE html>
<html>
<head>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        body {
            color: black;
            font-family: Georgia, serif;
            font-size: 24px;
            text-align: center;
            background: url("https://cdn.pixabay.com/photo/2023/11/24/10/07/background-8409643_1280.jpg") no-repeat center center;
            background-size: cover;
        }
        .container {
            background: rgba(255, 255, 255, 0.8); /* Semi-transparent background for text contrast */
            padding: 15px;
            margin: 0 auto;
            border: 15px solid tan;
            text-align: center;
            box-sizing: border-box;
        }
        .logo {
            color: tan;
        }
        .marquee {
            color: tan;
            font-size: 48px;
            margin: 20px;
        }
        .assignment {
            margin: 20px;
        }
        .person {
            border-bottom: 2px solid black;
            font-size: 32px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;
        }
        .reason {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
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
            and flying high
        </div>
    </div>
</body>
</html>

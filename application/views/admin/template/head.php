<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Pablo Camara" name="author"/>

    <title><?= !empty($title) ? $title : 'Pannello di controllo'; ?></title>
    <style type="text/css">
        body {
            margin-top: 20px;
            font-family: Arial, sans-serif;
            text-align: center;
            font-size: 12px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .logo {
            background-image: url('<?= site_url('/resources/img/logo.png'); ?>');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;
            width: 100%;
            max-width: 198px;
            height: 164px;
            margin: auto;
        }

        a {
            color: #223f03;
        }

        h1 {
            color: #386304;
            font-size: 26px;
        }

        h1 a {
            text-decoration: none;
        }

        h2 {
            color: #223f03;
            font-size: 20px;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            padding: 5px 10px;
            width: 100%;
            height: 25px;
            line-height: 25px;
            margin-bottom: 10px;
        }


        .menu a {
            text-decoration: none;
        }
        button[type="submit"],
        button[type="button"] {
            background-color: #386304;
            color: #FFFFFF;
            text-align: center;
            font-size: 14px;
            display: block;
            width: 100%;
            padding: 10px 0;
            cursor: pointer;
            cursor: hand;
        }

        button[type="submit"]:hover,
        button[type="button"]:hover {
            font-weight: bold;
        }

        .feedback {
            font-size: 12px;
            text-align: left;
            padding: 10px 0;
            font-weight: bold;
            color: #000000;
        }

        .feedback.error {
            color: red;
        }

        .feedback.success {
            color: green;
        }

        .margin-auto {
            margin: auto;
        }
    </style>
</head>

<body>
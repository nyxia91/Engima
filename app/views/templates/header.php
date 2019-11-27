<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title><?php echo $this->data['title'] ?></title>

        <link rel="stylesheet" href="<?php echo CSSURL ?>common.css"/>
        <?php
        if (isset($this->data['page_css'])) {
            echo '<link rel="stylesheet"href="' . CSSURL . $this->data['page_css'] . '.css"/>';
        }
        if (!(isset($this->data['header_off']) && $this->data['header_off'])) {
            echo '<link rel="stylesheet"href="' . CSSURL . 'navbar.css"/>';
        }
        ?>
<!--        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap" rel="stylesheet">-->
<!--        <script type="text/javascript" src="./script.js"></script>-->
    </head>
    <body>
        <?php
            if (!(isset($this->data['header_off']) && $this->data['header_off'])) {
                $this->view('navbar/index', $data);
            }
        ?>
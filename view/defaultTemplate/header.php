<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <?php
        foreach ($this->css as $link) {
            ?>
            <link rel="stylesheet" href="<?=$link?>">
            <?php
        }
    ?>

</head>
<body>

<header class="">
    <div class="container">
        <div class="row upperRow">
            <div class="col-1 logo ">
                <img id="mainLogo" src="<?=$this->images?>logo.png" alt="siteLogo">
            </div>
            <div class="col-7 h" >
                <div class="row h flex-middle">
                    <ul id="1" class="col-3 menuItem ">Item1
                        <div id="sub1" class = 'hide'>
                            <li class="subMenu click">sub1</li>
                            <li class="subMenu click">sub2</li>
                            <li class="subMenu click">sub3</li>
                            <li class="subMenu click">sub4</li>
                            <li class="subMenu click">sub5</li>
                        </div>
                    </ul>
                    <ul id="2" class="col-3 menuItem  ">Item2
                        <div id="sub2" class = 'hide'>
                            <li class="subMenu click">sub1</li>
                            <li class="subMenu click">sub2</li>
                            <li class="subMenu click">sub3</li>
                            <li class="subMenu click">sub4</li>
                            <li class="subMenu click">sub5</li>
                        </div>
                    </ul>
                    <ul id="3" class="col-3 menuItem  ">Item3
                        <div id="sub3" class = 'hide'>
                            <li class="subMenu click">sub1</li>
                            <li class="subMenu click">sub2</li>
                            <li class="subMenu click">sub3</li>
                            <li class="subMenu click">sub4</li>
                            <li class="subMenu click">sub5</li>
                        </div>
                    </ul>
                    <ul id="4" class="col-3 menuItem  ">FeedBack
                        <div id="sub4" class = 'hide'>
                            <li id="writeFeedBack" class="subMenu">Write to developer</li>
                            <?php if($_COOKIE['role'] == 'admin'){?>
                            <li id="showFeedBacks" class="subMenu">Show FeedBacks</li>
                            <?php } ?>
                            <li class="subMenu click">sub3</li>
                            <li class="subMenu click">sub4</li>
                            <li class="subMenu click">sub5</li>
                        </div>
                    </ul>
                </div>

            </div>
            <div class="col-4 h">
                <?php
                if(isset($_COOKIE['userName'])){ ?>
                    <div id="userPlace" class="buttonContainer">
                        <p>Welcome<?php if($_COOKIE['role'] == 'admin'){print_r(' admin');}?>:
                            <?=$_COOKIE['userName']?></p>
                        <div id='logout' onclick="LogOut()"class="button">LogOut</div>
                    </div>
                    <?php
                }else{
                ?>
                <div id="userPlace" class="buttonContainer">
                    <div id="login" onclick="login()" class="button">Войти</div>
                    <div id='registration' onclick="Registration()" class="button">Регистрация</div>
                </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</header>

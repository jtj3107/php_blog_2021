<?php
  $isLogined = $GLOBALS['App__isLogined'];
  $loginedMemberId = $GLOBALS['App__loginedMemberId'];
  $loginedMember = $GLOBALS['App__loginedMember'];
  global $App__isLogined;  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta n ame="viewport" content="width=device-width, initial-scale=1.0">  
        <title><?=$pageTitle?></title>
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../article/index.php">홈으로</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <?php if($App__isLogined) { ?>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../article/index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../article/list.php">List</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/usr/member/modify.php">정보 수정</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/usr/member/doLogout.php">Logout</a></li>  
                            <li class="nav-item"><a onclick = "if(!confirm('정말로 탈퇴하시겠습니까?')){return false;}" class="nav-link px-lg-3 py-3 py-lg-4" href="/usr/member/doDelete.php?id=<?=$_SESSION['loginedMemberId']?>">회원탈퇴</a></li>  
                        <?php } else  { ?>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../article/index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../article/list.php">List</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/usr/member/login.php">Sing in</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/usr/member/join.php">Sing up</a></li>  
                        <?php } ?>    
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>TEST BOARD</h1>
                            <span class="subheading">연습용 게시판 입니다.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    
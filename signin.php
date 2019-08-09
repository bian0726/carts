<?php
session_start();
if (isset($_SESSION["login"]) && $_SESSION['login'] != "") {
    header("Location: memberCenter.php");
}
if (isset($_POST['login']) && $_POST["login"] == "login") {
    require_once('conn.php');
    $login_query = "SELECT * FROM member WHERE m_ID = '{$_POST['id']}'";
    $result = $mysqli->query($login_query);
    $row = $result->fetch_assoc();
    $pwd = $row["m_Password"];
    $userPwd = $_POST['password'];
    if (password_verify($userPwd, $pwd)) {
        $_SESSION['login'] = "ok";
        $_SESSION['names'] = $row['m_Name'];
        $_SESSION['level'] = $row['m_Level'];
        $_SESSION['uid'] = $row['m_UID'];
        echo "login ok";
        header("Location: memberCenter.php");
    } else {
        header('Location: signin.php?error=1');
        //header('location:index.php');
    }
    $result->close();
}
?>
<?php if (isset($_GET["error"]) && ($_GET["error"] == "1")) { ?>
    <script language="javascript">
        alert('帳號或密碼錯誤');
        //window.location.href = 'signin.php';
    </script>
<?php } ?>
<?php include("head.php") //引用頁首頁尾
?>
<section id="fh5co-blog" data-section="blog">
    <div class="fh5co-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading text-center">
                    <h2 class="animate-box"><span>Sign In</span></h2>
                    <div class="row">
                        <h3 class="animate-box" style="font-family:'Microsoft JhengHei'">歡迎來到會員系統，請登入以繼續. </h3>
                        <div class="col-md-8 col-md-offset-2 subtext">
                            <form method="post" id="login" class="contact-form">
                                <div class="form-group">
                                    <label for="name" class="sr-only">ID</label>
                                    <input type="text" class="form-control" id="id" name="id" placeholder="ID" required="" pattern="[a-zA-Z0-9]*">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="sr-only">password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-send-message btn-md" value="Login"><br />
                                    <a href="signup.php">I don't have an account</a>
                                    <input type="hidden" id="login" name="login" value="login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include("foot.php") ?>
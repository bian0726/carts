<?php include("head.php") ?>
<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] != "") { //已經登入 則重新導向
    header("Location:memberCenter.php");
}
if ($_POST['action'] == "join") {
    require_once("conn.php"); //連線資料庫
    $findUser_query = "SELECT m_ID FROM member WHERE m_ID='{$_POST['id']}'"; //檢查帳號重複
    $findUser = $mysqli->query($findUser_query);
    if ($findUser->num_rows > 0) {
        header("Location: signup.php?error=1&username={$_POST["id"]}");
    } else {
        //若沒有重複 則執行新增的動作
        //$pwd = $_POST['Password'];
        $pwd = password_hash($_POST['Password'],PASSWORD_DEFAULT);
        $id = $_POST['id'];
        $name = $_POST['Name'];
        $birth = $_POST['Birth'];
        $address = $_POST['Address'];
        $phone = $_POST['Phone'];
        $insert_query = "INSERT INTO member (m_ID, m_Name, m_Password, m_Birth, m_Address, m_Phone) VALUES ('$id','$name','$pwd','$birth','$address','$phone')";
        $mysqli->query($insert_query);
        $mysqli->close();
        header("Location: signup.php?stats=1");//註冊成功
    }
}
?>
<?php if (isset($_GET["error"]) && ($_GET["error"] == "1")) { ?>
    <script language="javascript">
        alert('帳號已經被使用');
        //window.location.href = 'signup.php';
    </script>
<?php } ?>
<?php if (isset($_GET["stats"]) && ($_GET["stats"] == "1")) { ?>
    <script language="javascript">
        alert('會員新增成功\n請用申請的帳號密碼登入。');
        window.location.href = 'signin.php';
    </script>
<?php } ?>
<section id="fh5co-blog" data-section="blog">
    <div class="fh5co-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading text-center">
                    <h2 class="animate-box"><span>Sign up</span></h2>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 subtext">
                            <form method="post" id="join" name="join" class="contact-form">
                                <div class="form-group">
                                    <label for="name" class="sr-only">User ID</label>
                                    <input type="text" name="id" class="form-control" id="id" placeholder="User ID" required="">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="sr-only">User Name</label>
                                    <input type="text" name="Name" class="form-control" id="Name" placeholder="User Name" required="">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="sr-only">Birthday</label>
                                    <input type="date" name="Birth" class="form-control" id="Birth" placeholder="Birthday">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="sr-only">Phone</label>
                                    <input type="text" name="Phone" class="form-control" id="Phone" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="sr-only">Address</label>
                                    <input type="text" name="Address" class="form-control" id="Address" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="sr-only">Password</label>
                                    <input type="text" name="Password" id="Password" class="form-control" placeholder="Password" required="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Sing up"></br>
                                    <a href="signin.php">I have an account</a>
                                    <input type="hidden" id="action" name="action" value="join">
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
<?php include("head.php") //引用頁首頁尾?>
<section id="fh5co-blog" data-section="blog">
    <div class="fh5co-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading text-center">
                    <h2 class="animate-box"><span>Sign In</span></h2>
                    <div class="row">
                        <h3 class="animate-box" style="font-family:'Microsoft JhengHei'">歡迎來到會員系統，請登入以繼續. </h3>
                        <div class="col-md-8 col-md-offset-2 subtext">
                            <form class="contact-form">
                                <div class="form-group">
                                    <label for="name" class="sr-only">ID</label>
                                    <input type="text" class="form-control" id="name" placeholder="ID">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="sr-only">password</label>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Login"><br/>
                                    <a href="signup.php">I don't have an account</a>
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

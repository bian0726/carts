<?php
session_start();
if (!$_SESSION['login']) {
    header("Location:signin.php");
    exit();
}
if (isset($_POST["logout"])) {
    //unset($_SESSION['login']);
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<?php include("head.php") ?>
<section id="fh5co-blog" data-section="blog">
    <div class="fh5co-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading text-center">
                    <h2 class="animate-box"><span>Member Center</span></h2>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 subtext">
                            <h3 class="animate-box">Welcome <?= $_SESSION['level'] . " " . $_SESSION['names'] ?></h3>
                            <form method="post">
                                <input class="btn" type="submit" id="logout" name="logout" value="Logout"><br />
                                <a class="btn" href="index.php">go to home page</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 animate-box blog">
                    <a href="#" class="entry">
                        <div class="blog-bg" style="background-image: url(images/blog-1.jpg);">
                            <div class="date">
                                <span>27</span>
                                <small>Feb</small>
                            </div>
                            <div class="desc">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            </div>
                        </div>
                        <div class="desc-grid">
                            <h3>Download Free HTML5 Template</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 animate-box blog">
                    <a href="#" class="entry">
                        <div class="blog-bg" style="background-image: url(images/blog-1.jpg);">
                            <div class="date">
                                <span>27</span>
                                <small>Feb</small>
                            </div>
                            <div class="desc">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            </div>
                        </div>
                        <div class="desc-grid">
                            <h3>Download Free HTML5 Template</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 animate-box blog">
                    <a href="#" class="entry">
                        <div class="blog-bg" style="background-image: url(images/blog-1.jpg);">
                            <div class="date">
                                <span>27</span>
                                <small>Feb</small>
                            </div>
                            <div class="desc">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            </div>
                        </div>
                        <div class="desc-grid">
                            <h3>Download Free HTML5 Template</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("foot.php") ?>
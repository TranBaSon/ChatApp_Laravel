<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chat</title>
    <link href="/css/messages.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/Utilities/jquery.js"></script>
    <script src="/Utilities/socket_io.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!-- Chat Box start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>

<div id="frame">
    <div id="sidepanel">
        <div id="top-search">
            <div id="search">
                <input type="text" placeholder="Search contacts..." />
                <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
            </div>
            <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
        </div>
        <div id="contacts">
            <ul class="list-unstyled">
                <li class="contact">
                    <div class="wrap">
                        <div class="img-block">
                            <span class="contact-status online"></span><img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt="" /></div>

                        <div class="meta">
                            <h5 class="name bold my-0 text-primary">Myrtle Erickson</h5>
                            <p class="preview">They have to improve on time mana...</p>
                        </div>
                    </div>
                </li>
                <li class="contact">
                    <div class="wrap">
                        <div class="img-block">
                            <span class="contact-status online"></span><img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt="" /></div>

                        <div class="meta">
                            <h5 class="name bold my-0 text-primary">Myrtle Erickson</h5>
                            <p class="preview">They have to improve on time mana...</p>
                        </div>
                    </div>
                </li><li class="contact">
                    <div class="wrap">
                        <div class="img-block">
                            <span class="contact-status online"></span><img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt="" /></div>

                        <div class="meta">
                            <h5 class="name bold my-0 text-primary">Myrtle Erickson</h5>
                            <p class="preview">They have to improve on time mana...</p>
                        </div>
                    </div>
                </li><li class="contact">
                    <div class="wrap">
                        <div class="img-block">
                            <span class="contact-status online"></span><img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt="" /></div>

                        <div class="meta">
                            <h5 class="name bold my-0 text-primary">Myrtle Erickson</h5>
                            <p class="preview">They have to improve on time mana...</p>
                        </div>
                    </div>
                </li><li class="contact">
                    <div class="wrap">
                        <div class="img-block">
                            <span class="contact-status online"></span><img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt="" /></div>

                        <div class="meta">
                            <h5 class="name bold my-0 text-primary">Myrtle Erickson</h5>
                            <p class="preview">They have to improve on time mana...</p>
                        </div>
                    </div>
                </li><li class="contact">
                    <div class="wrap">
                        <div class="img-block">
                            <span class="contact-status online"></span><img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt="" /></div>

                        <div class="meta">
                            <h5 class="name bold my-0 text-primary">Myrtle Erickson</h5>
                            <p class="preview">They have to improve on time mana...</p>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <div class="content">
        <div class="contact-profile">
            <img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt="" />
            <div class="text-area">
                <h4 class="bold my-0">Harvey Specter</h4>
                <p><i>is typing...</i></p>

            </div>

        </div>
        <div class="messages">
            <ul class="list-unstyled">
                <li class="sent">
                    <div class="img-block">
                        <span class="contact-status online"></span><img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt=""></div>
                    <div class="msgbox">
                        <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!
                        </p>
                        <small class="timeBlock">07:00 am, Today
                        </small>
                    </div>
                </li>
                <li class="replies">
                    <div class="img-block">
                        <span class="contact-status online"></span>
                        <img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt="" /></div>
                    <div class="msgbox">
                        <p>When you're backed against the wall, break the god damn thing down.</p>
                        <small class="timeBlock">07:10 am, Today
                        </small>
                    </div>
                </li>
                <li class="sent">
                    <div class="img-block">
                        <span class="contact-status online"></span><img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt=""></div>
                    <div class="msgbox">
                        <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!
                        </p>
                        <small class="timeBlock">07:00 am, Today
                        </small>
                    </div>
                </li>
                <li class="replies">
                    <div class="img-block">
                        <span class="contact-status online"></span>
                        <img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt="" /></div>
                    <div class="msgbox">
                        <p>When you're backed against the wall, break the god damn thing down.</p>
                        <small class="timeBlock">07:10 am, Today
                        </small>
                    </div>
                </li><li class="sent">
                    <div class="img-block">
                        <span class="contact-status online"></span><img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt=""></div>
                    <div class="msgbox">
                        <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!
                        </p>
                        <small class="timeBlock">07:00 am, Today
                        </small>
                    </div>
                </li>
                <li class="replies">
                    <div class="img-block">
                        <span class="contact-status online"></span>
                        <img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt="" /></div>
                    <div class="msgbox">
                        <p>When you're backed against the wall, break the god damn thing down.</p>
                        <small class="timeBlock">07:10 am, Today
                        </small>
                    </div>
                </li><li class="sent">
                    <div class="img-block">
                        <span class="contact-status online"></span><img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt=""></div>
                    <div class="msgbox">
                        <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!
                        </p>
                        <small class="timeBlock">07:00 am, Today
                        </small>
                    </div>
                </li>
                <li class="replies">
                    <div class="img-block">
                        <span class="contact-status online"></span>
                        <img src="https://mir-s3-cdn-cf.behance.net/user/276/7d903270114907.5a6865b2c984d.jpg" alt="" /></div>
                    <div class="msgbox">
                        <p>When you're backed against the wall, break the god damn thing down.</p>
                        <small class="timeBlock">07:10 am, Today
                        </small>
                    </div>
                </li>
            </ul>
        </div>
        <div class="message-input">
            <div class="wrap">
                <a class="attachment"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                <input type="text" placeholder="Write your message..." />
                <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div><!--frame-->
<!-- Chat Box close-->


</body>

</html>








<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nested comments</title>
    <style>

        .post-comments {
            padding-bottom: 9px;
            margin: 5px 0 5px;
        }

        .comments-nav {
            border-bottom: 1px solid #eee;
            margin-bottom: 5px;
        }

        .post-comments .comment-meta {
            border-bottom: 1px solid #eee;
            margin-bottom: 5px;
        }

        .post-comments .media {
            border-left: 1px dotted #000;
            border-bottom: 1px dotted #000;
            margin-bottom: 5px;
            padding-left: 10px;
        }

        .post-comments .media-heading {
            font-size: 12px;
            color: grey;
        }

        .post-comments .comment-meta a {
            font-size: 12px;
            color: grey;
            font-weight: bolder;
            margin-right: 5px;
        }
    </style>
    <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous">
    </script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script type="text/javascript">$('[data-toggle="collapse"]').on('click', function () {
            var $this = $(this),
                $parent = typeof $this.data('parent') !== 'undefined' ? $($this.data('parent')) : undefined;
            if ($parent === undefined) {
                $this.find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                return true;
            }

            /* Open element will be close if parent !== undefined */
            var currentIcon = $this.find('.glyphicon');
            currentIcon.toggleClass('glyphicon-plus glyphicon-minus');
            $parent.find('.glyphicon').not(currentIcon).removeClass('glyphicon-minus').addClass('glyphicon-plus');

        });
    </script>
</head>
<body>
<div class="container">
    <div class="post-comments">
        <div class="comments-nav">
        </div>

        <div class="row">
            <div class="media">
                <!-- first comment -->
                <div class="media-heading">
                    <button class="btn btn-default btn-xs" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="false" aria-controls="collapseExample">
                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </button>
                    <span class="label label-info">366 votes</span> 12 hours ago
                </div>

                <div class="panel-collapse collapse in" id="collapseOne">
                    <div class="media-left">
                        <div class="vote-wrap">
                            <div class="save-post">
                                <a href="#"><span class="glyphicon glyphicon-star" aria-label="Save"></span></a>
                            </div>
                            <div class="vote up">
                                <i class="glyphicon glyphicon-menu-up"></i>
                            </div>
                            <div class="vote inactive">
                                <i class="glyphicon glyphicon-menu-down"></i>
                            </div>
                        </div>
                        <!-- vote-wrap -->
                    </div>
                    <!-- media-left -->

                    <div class="media-body">
                        <p>Hey yo! Seems I'm the first one to comment this post! Heard that russians usually say that
                            they're "Pervij nah", don't know what it means :(</p>
                        <div class="comment-meta">
                            <span><a href="#">delete</a></span>
                            <span><a href="#">report</a></span>
                            <span><a href="#">hide</a></span>
                            <span>
                                    <a class="" role="button" data-toggle="collapse" href="#replyCommentT"
                                       aria-expanded="false" aria-controls="collapseExample">reply</a>
                                </span>
                            <div class="collapse" id="replyCommentT">
                                <form>
                                    <div class="form-group">
                                        <label for="comment">Your Comment</label>
                                        <textarea name="comment" class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">Send</button>
                                </form>
                            </div>
                        </div>
                        <!-- comment-meta -->

                        <div class="media">
                            <!-- answer to the first comment -->
                            <div class="media-heading">
                                <button class="btn btn-default btn-collapse btn-xs" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseExample"><span class="glyphicon glyphicon-minus"
                                                                              aria-hidden="true"></span></button>
                                <span class="label label-info">109 votes</span> 12 hours ago
                            </div>
                            <div class="panel-collapse collapse in" id="collapseTwo">

                                <div class="media-left">
                                    <div class="vote-wrap">
                                        <div class="save-post">
                                            <a href="#"><span class="glyphicon glyphicon-star" aria-label="Save"></span></a>
                                        </div>
                                        <div class="vote up">
                                            <i class="glyphicon glyphicon-menu-up"></i>
                                        </div>
                                        <div class="vote inactive">
                                            <i class="glyphicon glyphicon-menu-down"></i>
                                        </div>
                                    </div>
                                    <!-- vote-wrap -->
                                </div>
                                <!-- media-left -->

                                <div class="media-body">
                                    <p>Damn! I wanted to be the first but I'm second :(</p>
                                    <div class="comment-meta">
                                        <span><a href="#">delete</a></span>
                                        <span><a href="#">report</a></span>
                                        <span><a href="#">hide</a></span>
                                        <span>
                                                <a class="" role="button" data-toggle="collapse"
                                                   href="#replyCommentThree" aria-expanded="false"
                                                   aria-controls="collapseExample">reply</a>
                                            </span>
                                        <div class="collapse" id="replyCommentThree">
                                            <form>
                                                <div class="form-group">
                                                    <label for="comment">Your Comment</label>
                                                    <textarea name="comment" class="form-control" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-default">Send</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- comment-meta -->
                                </div>
                            </div>
                            <!-- comments -->
                        </div>
                        <!-- answer to the first comment -->
                    </div>
                </div>
                <!-- comments -->
            </div>
            <!-- first comment -->
            <div class="media">
                <!-- first comment -->

                <div class="media-heading">
                    <button class="btn btn-default btn-xs" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseExample"><span
                            class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                    <span class="label label-info">64 votes</span> 12 hours ago
                </div>

                <div class="panel-collapse collapse in" id="collapseThree">
                    <div class="media-left">
                        <div class="vote-wrap">
                            <div class="save-post">
                                <a href="#"><span class="glyphicon glyphicon-star" aria-label="Report"></span></a>
                            </div>
                            <div class="vote up">
                                <i class="glyphicon glyphicon-menu-up"></i>
                            </div>
                            <div class="vote inactive">
                                <i class="glyphicon glyphicon-menu-down"></i>
                            </div>
                        </div>
                        <!-- vote-wrap -->
                    </div>
                    <!-- media-left -->
                    <div class="media-body">
                        <p>Nice memes, bro! It's something new, haven's seen anything like this before! GJ</p>
                        <div class="comment-meta">
                            <span><a href="#">delete</a></span>
                            <span><a href="#">report</a></span>
                            <span><a href="#">hide</a></span>
                            <span>
                                    <a class="" role="button" data-toggle="collapse" href="#replyCommentFour"
                                       aria-expanded="false" aria-controls="collapseExample">reply</a>
                                </span>
                            <div class="collapse" id="replyCommentFour">
                                <form>
                                    <div class="form-group">
                                        <label for="comment">Your Comment</label>
                                        <textarea name="comment" class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">Send</button>
                                </form>
                            </div>
                        </div>
                        <!-- comment-meta -->

                        <div class="media">
                            <!-- answer to the first comment -->

                            <div class="media-heading">
                                <button class="btn btn-default btn-collapse btn-xs" type="button" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseExample"><span class="glyphicon glyphicon-minus"
                                                                              aria-hidden="true"></span></button>
                                <span class="label label-info">13 votes</span> 11 hours ago
                            </div>

                            <div class="panel-collapse collapse in" id="collapseFour">

                                <div class="media-left">
                                    <div class="vote-wrap">
                                        <div class="save-post">
                                            <a href="#"><span class="glyphicon glyphicon-star"
                                                              aria-label="Report"></span></a>
                                        </div>
                                        <div class="vote up">
                                            <i class="glyphicon glyphicon-menu-up"></i>
                                        </div>
                                        <div class="vote inactive">
                                            <i class="glyphicon glyphicon-menu-down"></i>
                                        </div>
                                    </div>
                                    <!-- vote-wrap -->
                                </div>
                                <!-- media-left -->


                                <div class="media-body">
                                    <p>I'm new here! It's my first comment actually! Mom, I'm on TV!!</p>
                                    <div class="comment-meta">
                                        <span><a href="#">delete</a></span>
                                        <span><a href="#">report</a></span>
                                        <span><a href="#">hide</a></span>
                                        <span>
                                                <a class="" role="button" data-toggle="collapse"
                                                   href="#replyCommentFive" aria-expanded="false"
                                                   aria-controls="collapseExample">reply</a>
                                            </span>
                                        <div class="collapse" id="replyCommentFive">
                                            <form>
                                                <div class="form-group">
                                                    <label for="comment">Your Comment</label>
                                                    <textarea name="comment" class="form-control" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-default">Send</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- comment-meta -->

                                    <div class="media">
                                        <!-- first comment -->

                                        <div class="media-heading">
                                            <button class="btn btn-default btn-xs" type="button" data-toggle="collapse"
                                                    data-target="#collapseFive" aria-expanded="false"
                                                    aria-controls="collapseExample"><span
                                                    class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                            </button>
                                            <span class="label label-info">370 votes</span> 10 hours ago
                                        </div>

                                        <div class="panel-collapse collapse in" id="collapseFive">

                                            <div class="media-left">
                                                <div class="vote-wrap">
                                                    <div class="save-post">
                                                        <a href="#"><span class="glyphicon glyphicon-star"
                                                                          aria-label="Report"></span></a>
                                                    </div>
                                                    <div class="vote up">
                                                        <i class="glyphicon glyphicon-menu-up"></i>
                                                    </div>
                                                    <div class="vote inactive">
                                                        <i class="glyphicon glyphicon-menu-down"></i>
                                                    </div>
                                                </div>
                                                <!-- vote-wrap -->
                                            </div>
                                            <!-- media-left -->


                                            <div class="media-body">
                                                <p>Dude, so much gratz! (no)</p>
                                                <div class="comment-meta">
                                                    <span><a href="#">delete</a></span>
                                                    <span><a href="#">report</a></span>
                                                    <span><a href="#">hide</a></span>
                                                    <span>
                                                            <a class="" role="button" data-toggle="collapse"
                                                               href="#replyCommentSix" aria-expanded="false"
                                                               aria-controls="collapseExample">reply</a>
                                                        </span>
                                                    <div class="collapse" id="replyCommentSix">
                                                        <form>
                                                            <div class="form-group">
                                                                <label for="comment">Your Comment</label>
                                                                <textarea name="comment" class="form-control"
                                                                          rows="3"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-default">Send</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- comment-meta -->

                                                <div class="media">
                                                    <!-- answer to the first comment -->

                                                    <div class="media-heading">
                                                        <button class="btn btn-default btn-collapse btn-xs"
                                                                type="button" data-toggle="collapse"
                                                                data-target="#collapseSix" aria-expanded="false"
                                                                aria-controls="collapseExample"><span
                                                                class="glyphicon glyphicon-minus"
                                                                aria-hidden="true"></span></button>
                                                        <span class="label label-info">3 votes</span> 8 hours ago
                                                    </div>

                                                    <div class="panel-collapse collapse in" id="collapseSix">

                                                        <div class="media-left">
                                                            <div class="vote-wrap">
                                                                <div class="save-post">
                                                                    <a href="#"><span class="glyphicon glyphicon-star"
                                                                                      aria-label="Report"></span></a>
                                                                </div>
                                                                <div class="vote up">
                                                                    <i class="glyphicon glyphicon-menu-up"></i>
                                                                </div>
                                                                <div class="vote inactive">
                                                                    <i class="glyphicon glyphicon-menu-down"></i>
                                                                </div>
                                                            </div>
                                                            <!-- vote-wrap -->
                                                        </div>
                                                        <!-- media-left -->


                                                        <div class="media-body">
                                                            <p>U too, dude! <3</p>
                                                            <div class="comment-meta">
                                                                <span><a href="#">delete</a></span>
                                                                <span><a href="#">report</a></span>
                                                                <span><a href="#">hide</a></span>
                                                                <span>
                                                                        <a class="" role="button" data-toggle="collapse"
                                                                           href="#replyCommentOne" aria-expanded="false"
                                                                           aria-controls="collapseExample">reply</a>
                                                                    </span>
                                                                <div class="collapse" id="replyCommentOne">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <label for="comment">Your Comment</label>
                                                                            <textarea name="comment"
                                                                                      class="form-control"
                                                                                      rows="3"></textarea>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-default">
                                                                            Send
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- comment-meta -->


                                                        </div>
                                                    </div>
                                                    <!-- comments -->

                                                </div>
                                                <!-- answer to the first comment -->

                                            </div>
                                        </div>
                                        <!-- comments -->

                                    </div>
                                    <!-- first comment -->
                                </div>
                            </div>
                            <!-- comments -->

                        </div>
                        <!-- answer to the first comment -->

                    </div>
                </div>
                <!-- comments -->

            </div>
            <!-- first comment -->
        </div>

    </div>
    <!-- post-comments -->
</div>

</body>
</html>
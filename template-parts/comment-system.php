<div class="comments-section single-entry-section">
    <div id="comments" class="comments-area">
        <div class="block-heading block-heading_style-1 block-heading-no-line">
            <h4 class="block-heading__title"><?php echo $comments_counts; ?>Comments</h4>
        </div>

    </div><!-- #comments -->
</div>

<ol class="comment-list">
    <li id="comment-4" class="comment even thread-even depth-1 parent">
        <div id="div-comment-4" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <img src="<?php echo $comment_user_image_url; ?>" class="avatar photo" alt="avatar"><b class="fn"><?php echo $comment_user_name; ?></b><span class="says">says:</span>
                </div><!-- .comment-author -->
                <div class="comment-metadata">
                    <a href="#">
                        <time datetime="2016-10-21T13:31:45+00:00">October 21, 2016 at 1:31 pm</time>
                    </a>
                    <!-- display only for same commented users on logged in -->
                    <?php if (is_user_logged_in()) : ?>
                        <span class="edit-link">
                            <a class="comment-edit-link" href="#">Edit</a>
                        </span>
                    <?php endif; ?>
                </div><!-- .comment-metadata -->
            </footer><!-- .comment-meta -->
            <div class="comment-content">
                <p><?php echo $comment_text_content; ?></p>
            </div><!-- .comment-content -->
            <!-- append textarea for a while only when click and user is replying to the parent commentor -->
            <div class="reply">
                <a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Sculpture Fan">Reply</a>
            </div>
            <!-- append for a while only user is replying to the parent commentor -->
        </div><!-- .comment-body -->
        <ol class="children">
            <li id="comment-5" class="comment byuser comment-author-melchoyce bypostauthor odd alt depth-2 parent">
                <div id="div-comment-5" class="comment-body">
                    <footer class="comment-meta">
                        <div class="comment-author vcard">
                            <img src="<?php echo $comment_user_image_url; ?>" class="avatar photo" alt="avatar"><a href="#" rel="external nofollow" class="url"><?php echo $comment_user_name; ?></a><span class="says">says:</span>
                        </div><!-- .comment-author -->
                        <div class="comment-metadata">
                            <a href="#">
                                <time datetime="2016-10-21T13:31:45+00:00">October 21, 2016 at 1:31 pm</time>
                            </a>
                            <?php if (is_user_logged_in()) : ?>
                                <span class="edit-link">
                                    <a class="comment-edit-link" href="#">Edit</a>
                                </span>
                            <?php endif; ?>
                        </div><!-- .comment-metadata -->
                    </footer><!-- .comment-meta -->
                    <div class="comment-content">
                        <p><?php echo $replied_user_comment_text_content; ?></p>
                    </div><!-- .comment-content -->
                    <div class="reply">
                        <a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Sculpture Fan">Reply</a>
                    </div>
                </div><!-- .comment-body -->
                <ol class="children">
                    <li id="comment-6" class="comment even depth-3">
                        <div id="div-comment-6" class="comment-body">
                            <footer class="comment-meta">
                                <div class="comment-author vcard">
                                    <img src="http://via.placeholder.com/180x180" class="avatar photo" alt="avatar"><b class="fn">Diane Gregory</b><span class="says">says:</span>
                                </div><!-- .comment-author -->
                                <div class="comment-metadata">
                                    <a href="#">
                                        <time datetime="2016-10-21T13:31:45+00:00">October 21, 2016 at 1:31 pm</time>
                                    </a>
                                </div><!-- .comment-metadata -->
                            </footer><!-- .comment-meta -->
                            <div class="comment-content">
                                <!-- nested reply from same and other users -->
                                <p><?php echo $comment_text_content; ?></p>
                            </div><!-- .comment-content -->
                            <div class="reply">
                                <a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Sculpture Fan">Reply</a>
                            </div>
                        </div><!-- .comment-body -->
                    </li><!-- #comment-## -->
                </ol><!-- .children -->
            </li><!-- #comment-## -->
        </ol><!-- .children -->
    </li><!-- #comment-## -->
    <li id="comment-7" class="comment byuser bypostauthor odd alt thread-odd thread-alt depth-1">
        <div id="div-comment-7" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <img src="http://via.placeholder.com/180x180" class="avatar photo" alt="avatar"><b class="fn">Ryan Reynold</b><span class="says">says:</span>
                </div><!-- .comment-author -->
                <div class="comment-metadata">
                    <a href="#">
                        <time datetime="2016-10-21T13:31:45+00:00">October 21, 2016 at 1:31 pm</time>
                    </a>
                </div><!-- .comment-metadata -->
            </footer><!-- .comment-meta -->
            <div class="comment-content">
                <p> It's just Thursday. Like the 260th Thursday as a passenger on the
                    cruise ship "Mental Health." On the plus side I've mastered eating
                    with a spoon.
                </p>
            </div><!-- .comment-content -->
            <div class="reply">
                <a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Sculpture Fan">Reply</a>
            </div>
        </div><!-- .comment-body -->
    </li><!-- #comment-## -->
    <li id="comment-8" class="comment byuser odd alt thread-odd thread-alt depth-1">
        <div id="div-comment-8" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <img src="http://via.placeholder.com/180x180" class="avatar photo" alt="avatar"><b class="fn">Diane Gregory</b><span class="says">says:</span>
                </div><!-- .comment-author -->
                <div class="comment-metadata">
                    <a href="#">
                        <time datetime="2016-10-21T13:31:45+00:00">October 21, 2016 at 1:31 pm</time>
                    </a>
                </div><!-- .comment-metadata -->
            </footer><!-- .comment-meta -->
            <div class="comment-content">
                <p>I know, I don't have to be afraid. But I am because look at you. All
                    of you. You're gods, and someday you are going to wake up and
                    realize you don't have to listen to us anymore.
                </p>
            </div><!-- .comment-content -->
            <div class="reply">
                <a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Sculpture Fan">Reply</a>
            </div>
        </div><!-- .comment-body -->
    </li><!-- #comment-## -->
</ol>
<div id="respond" class="comment-respond">
    <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display: none;">Cancel reply</a></small></h3>
    <form action="#" method="post" id="commentform" class="comment-form" novalidate="">
        <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span>Required fields are marked <span class="required">*</span></p>
        <p class="comment-form-comment">
            <label for="comment">Comment</label>
            <textarea id="comment" class="form-control-custom" name="comment" cols="45" rows="8" maxlength="65525" required="required" placeholder="Your review"></textarea>
        </p>
        <p class="comment-form-author">
            <label for="author">Name <span class="required">*</span></label>
            <input id="author" class="form-control-custom" name="author" type="text" value="" size="30" maxlength="245" required="required" placeholder="Name *">
        </p>
        <p class="comment-form-email">
            <label for="email">Email <span class="required">*</span></label>
            <input id="email" class="form-control-custom" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required" placeholder="Email *">
        </p>
        <p class="form-submit">
            <input name="submit" type="submit" id="submit" class="submit" value="Post Comment">
            <input type="hidden" name="comment_post_ID" value="44" id="comment_post_ID">
            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
        </p>
    </form>
</div><!-- #respond -->




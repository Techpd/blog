<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://thebetterbit.com
 *
 * @package WordPress
 * @subpackage Custom_Theme
 * @since custom_theme 1.0
 * @version 1.0
 */
?>

<footer class="site-footer footer-1">
    <div class="site-footer__section">
        <div class="site-footer__section-inner inverse-text">
            <div class="section-row">
                <div class="section-column section-column-left text-left">
                    <div class="site-logo">
                        <a href="./<?php echo site_url(); ?>">
                            <?php //the_custom_logo() ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mob-logo.png" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="section-column section-column-center text-center">
                    <nav class="footer-menu text-center">
                        <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'footermenu',
                                'container'            => '',
                                'container_class'      => '',
                                'menu_id'              => 'menu-footer-menu',
                                'menu_class'           => 'navigation navigation--footer navigation--inline',
                                'echo'                 => true,
                            )
                        ); ?>
                    </nav>
                </div>
                <div class="section-column section-column-right text-right section-socials">
                    <ul class="social-list social-list--md list-horizontal">
                        <li><a href="#" target="_blank"><i class="mdicon mdicon-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="mdicon mdicon-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="mdicon mdicon-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Sticky header -->
<div id="atbs-sticky-header" class="sticky-header js-sticky-header">
    <!-- Navigation bar -->
    <nav class="navigation-bar navigation-bar--fullwidth hidden-xs hidden-sm">
        <div class="navigation-bar__inner">
            <div class="navigation-bar__section">
                <a href="#atbs-offcanvas-primary" class="offcanvas-menu-toggle navigation-bar-btn js-atbs-offcanvas-toggle">
                    <i class="mdicon mdicon-menu icon--2x"></i>
                </a>
                <div class="site-logo header-logo">
                    <a href="<?php echo site_url(); ?>">
                        <?php //the_custom_logo() ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/mob-logo.png" alt="logo">
                    </a>
                </div>
            </div>

            <div class="navigation-wrapper navigation-bar__section js-priority-nav">
                <?php wp_nav_menu(
                    array(
                        'theme_location'  => 'primary-menu',
                        'container'            => '',
                        'container_class'      => '',
                        'menu_id'              => 'menu-main-menu-1',
                        'menu_class'           => 'navigation navigation--main navigation--inline',
                        'echo'                 => true,
                    )
                ); ?>
            </div>

            <div class="navigation-bar__section">
                <a href="#login-modal" class="navigation-bar__login-btn navigation-bar-btn" data-toggle="modal" data-target="#login-modal"><i class="mdicon mdicon-person"></i></a>
                <button type="submit" class="navigation-bar-btn js-search-dropdown-toggle"><i class="mdicon mdicon-search"></i></button>
            </div>
        </div> <!-- .navigation-bar__inner -->
    </nav><!-- Navigation-bar -->
</div><!-- Sticky header -->
<!-- Login modal -->
<div class="modal fade login-modal" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content login-signup-form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#10005;</span></button>
                <div class="modal-title" id="login-modal-label">
                    <ul class="nav nav-tabs js-login-form-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#login-tab" aria-controls="login-tab" role="tab" data-toggle="tab">Log in</a></li>
                        <li role="presentation"><a href="#signup-tab" aria-controls="signup-tab" role="tab" data-toggle="tab">Sign up</a></li>
                    </ul>
                </div>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="login-tab">
                        <div class="login-with-social">
                            <p>Log in with social account</p>
                            <ul class="social-list social-list--circle list-center ">
                                <li><a href="#" class="facebook-theme-bg text-white"><i class="mdicon mdicon-facebook"></i></a>
                                </li>
                                <li><a href="#" class="twitter-theme-bg text-white"><i class="mdicon mdicon-twitter"></i></a>
                                </li>
                                <li><a href="#" class="googleplus-theme-bg text-white"><i class="mdicon mdicon-google-plus"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="block-divider"><span>or</span></div>
                        <form name="loginform" id="loginform" action="#" method="post">
                            <p class="login-username">
                                <label for="user_login">Username</label>
                                <input type="text" name="log" id="user_login" class="input" value="" size="20">
                            </p>
                            <p class="login-password">
                                <label for="user_pass">Password</label>
                                <input type="password" name="pwd" id="user_pass" class="input" value="" size="20">
                            </p>
                            <p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember
                                    Me</label></p>
                            <p class="login-submit">
                                <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-block btn-primary" value="Log In">
                                <input type="hidden" name="redirect_to" value="#">
                            </p>
                            <p class="login-lost-password">
                                <a href="#" class="link link--darken">Lost your password?</a>
                            </p>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="signup-tab">
                        <form name="registerform" id="registerform" action="#" method="post">
                            <p class="register-username">
                                <label for="user_register">Username</label>
                                <input type="text" name="log" id="user_register" class="input" value="" size="20">
                            </p>
                            <p class="register-password">
                                <label for="user_register_pass">Password</label>
                                <input type="password" name="pwd" id="user_register_pass" class="input" value="" size="20">
                            </p>
                            <p class="register-submit">
                                <input type="submit" name="wp-submit" id="wp-submit-register" class="btn btn-block btn-primary" value="Sign Up">
                                <input type="hidden" name="redirect_to" value="#">
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Login modal -->
<!-- Subscribe modal -->
<div class="modal fade subscribe-modal" id="subscribe-modal" tabindex="-1" role="dialog" aria-labelledby="subscribe-modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#10005;</span></button>
                <h4 class="modal-title" id="subscribe-modal-label">Subscribe</h4>
            </div>
            <div class="modal-body">
                <div class="subscribe-form subscribe-form--horizontal text-center max-width-sm">
                    <p class="typescale-1">
                        Join our <b>868,537</b> subscribers and get access to the latest tools, freebies, product
                        announcements and much more!
                    </p>
                    <div class="subscribe-form__fields">
                        <p>
                            <input type="email" name="EMAIL" placeholder="Your email address" required="">
                            <input type="submit" value="Subscribe" class="btn btn-primary">
                        </p>
                    </div>
                    <small>Don't worry, we don't spam</small>
                </div>
            </div>
        </div>
    </div>
</div><!-- Subscribe modal -->
<!-- Off-canvas menu -->
<div id="atbs-offcanvas-primary" class="atbs-offcanvas js-atbs-offcanvas js-perfect-scrollbar">
    <div class="atbs-offcanvas__title">
        <h2 class="site-logo"><a href="<?php echo site_url(); ?>"><?php ///the_custom_logo() ?><img src="<?php echo get_template_directory_uri(); ?>/img/mob-logo.png" alt="logo"></a></h2>
        <ul class="social-list list-horizontal">
            <li><a href="#"><i class="mdicon mdicon-facebook"></i></a>
            </li>
            <li><a href="#"><i class="mdicon mdicon-twitter"></i></a>
            </li>
            <li><a href="#"><i class="mdicon mdicon-youtube"></i></a>
            </li>
            <li><a href="#"><i class="mdicon mdicon-google-plus"></i></a>
            </li>
        </ul>
        <a href="#atbs-offcanvas-primary" class="atbs-offcanvas-close js-atbs-offcanvas-close" aria-label="Close"><span aria-hidden="true">&#10005;</span></a>
    </div>

    <div class="atbs-offcanvas__section atbs-offcanvas__section-navigation">
        <?php wp_nav_menu(
            array(
                'theme_location'  => 'primary-menu',
                'container'            => '',
                'container_class'      => '',
                'menu_id'              => 'menu-offcanvas-menu',
                'menu_class'           => 'navigation navigation--offcanvas',
                'echo'                 => true,
            )
        ); ?>
    </div>

    <div class="atbs-offcanvas__section visible-xs visible-sm">
        <div class="text-center">
            <a href="#login-modal" class="btn btn-default btn-form-author" data-toggle="modal" data-target="#login-modal"><i class="mdicon mdicon-person mdicon--first"></i><span>Login / Sign
                    up</span></a>
        </div>
    </div>
</div><!-- Off-canvas menu -->
<a href="#" class="atbs-go-top btn btn-default hidden-xs js-go-top-el"><i class="mdicon mdicon-arrow_upward"></i></a>
</div><!-- .site-wrapper -->
<?php wp_footer(); ?>
</body>

</html>
<?php
/**
 * Template header, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** HEADER ********** -->
<div id="dokuwiki__header"><div class="pad group">

        <?php tpl_includeFile('header.html') ?>

        <div class="top_navbar">
            <div class="site_tools">
            <span class="mobileTools">
                <?php tpl_actiondropdown($lang['tools']); ?>
            </span>
                <span class="tool_links">
                    <?php
                    tpl_toolsevent('sitetools', array(
                        tpl_action('recent', true, 'span', true),
                        tpl_action('media', true, 'span', true)
                    ));
                    ?>
                </span>
                <span class="search_form">
                    <?php tpl_searchform();?>
                </span>
            </div>
            <div class="navbar_main_links">
                <h3 class="a11y"></h3>
                <span class="fa fa-leaf"></span><?php
                tpl_toolsevent('sitetools', array(
                    tpl_action('index', true, 'span', true)));
                ?>
                <span class="fa fa-leaf"></span><a class="navbar_main_link" target="_blank" href="http://forum.stardew-valley.de">Zum Forum</a>
                <span class="fa fa-leaf"></span><a class="navbar_main_link" target="_blank" href="http://stardewvalley.net/">Zur offiziellen Seite</a>
            </div>

        </div>

        <div class="headings group">
            <ul class="a11y skip">
                <li><a href="#dokuwiki__content"><?php echo $lang['skip_to_content']; ?></a></li>
            </ul>

            <h1><?php
                // get logo either out of the template images folder or data/media folder
                $logoSize = array();
                $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', ':logo.jpg', 'images/logo.png'), false, $logoSize);

                // display logo and wiki title in a link to the home page
                tpl_link(
                    wl(),
                    '<img src="'.$logo.'" '.$logoSize[3].' alt="" /> <span>'.$conf['title'].'</span>',
                    'accesskey="h" title="Stardew Valley Wiki"'
                );
                ?></h1>
            <?php if ($conf['tagline']): ?>
                <p class="claim"><?php echo $conf['tagline']; ?></p>
            <?php endif ?>
        </div>


        <div id="stardew__usertools">
            <h3 class="a11y"><?php echo $lang['user_tools']; ?></h3>
            <div class="header_side_icons">
                <ul>
                    <?php
                    tpl_toolsevent('usertools', array(
                        tpl_action('admin', true, 'li', true),
                        tpl_action('profile', true, 'li', true),
                        tpl_action('register', true, 'li', true),
                        tpl_action('login', true, 'li', true)
                    ));
                    ?>
                </ul>
            </div>
        </div>

        <?php
        if (!empty($_SERVER['REMOTE_USER'])) {
            echo '<span class="logged_in_user">';
            tpl_userinfo(); /* 'Logged in as ...' */
            echo '</span>';
        }
        ?>

        <!-- BREADCRUMBS -->

        <?php if($conf['breadcrumbs'] || $conf['youarehere']): ?>
            <div class="breadcrumbs">
                <?php if($conf['youarehere']): ?>
                    <div class="youarehere"><?php tpl_youarehere() ?></div>
                <?php endif ?>
                <?php if($conf['breadcrumbs']): ?>
                    <div class="trace"><?php tpl_breadcrumbs() ?></div>
                <?php endif ?>
            </div>
        <?php endif ?>



        <hr class="a11y" />
    </div></div><!-- /header -->

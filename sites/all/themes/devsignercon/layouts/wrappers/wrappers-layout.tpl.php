<div<?php print $attributes; ?>>
  <div class="container" id="container">
    <div class="z-header zone">
      <div class="w-header">
        <header class="l-header <?php echo ($page['header'] ? 'slideshow dark' : 'light') ?>" role="banner">
          <div class="l-branding">
            <?php if ($site_name || $site_slogan || $logo): ?>
              <?php if ($logo): ?>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site-logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
              <?php endif; ?>
              
              <?php if ($site_name): ?>
                <div class="logo-mark">
                  <h1 class="site-name">
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print drupal_strtolower($site_name); ?></span></a>
                  </h1>
                  <div class="branding--tagline"><span class="branding--tagline__location">portland:oregon</span><span class="branding--tagline__date">5/23 &ndash; 25, 2014</span></div>
                </div>
              <?php endif; ?>

              <?php if ($site_slogan): ?>
                <h2 class="site-slogan"><?php print $site_slogan; ?></h2>
              <?php endif; ?>
            <?php endif; ?>

            <?php print render($page['branding']); ?>
          </div>

          <?php print render($page['header']); ?>
        </header>
      </div>
      <div class="w-navigation">
        <div class="l-navigation">
          <?php print render($page['navigation']); ?>
        </div>
      </div>
    </div>
    <div class="z-preface zone">
      <div class="w-preface">
        <?php if ($page['preface']) : ?>
        <div class="l-preface">
          <?php print render($page['preface']); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="z-highlight zone">
      <div class="w-highlight">
        <?php if ($page['highlight']) : ?>
        <div class="l-highlight">
          <?php print render($page['highlight']); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php if (!$is_front): ?>
      <div class="z-breadcrumb zone">
        <div class="w-breadcrumb">
            <div class="l-breadcrumb">
              <?php print render($page['breadcrumb']); ?>
            </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="z-content zone">
      <div class="l-main">
        <?php if ($page['sidebar_first']) : ?>
        <div class="l-sidebar-first">
          <?php print render($page['sidebar_first']); ?>
        </div>
        <?php endif; ?>
        <div class="l-content" role="main">
          <a id="main-content"></a>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <h1 class="page--title"><?php print $title; ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php print $messages; ?>
          <?php print render($tabs); ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <?php print render($page['content']); ?>
          <?php print $feed_icons; ?>
        </div>
        <?php if ($page['sidebar_second']) : ?>
        <div class="l-sidebar-second">
          <?php print render($page['sidebar_second']); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="z-postscript zone">
      <div class="w-postscript">
        <div class="l-postscript">
          <?php print render($page['postscript']); ?>
        </div>
      </div>
    </div>
    <div class="z-footer zone">
      <div class="w-footer">
        <footer class="l-footer" role="contentinfo">
          <?php print render($page['footer']); ?>
        </footer>
      </div>
      <div class="w-footer-sub">
        <div class="l-footer-sub">
          <?php print render($page['footer_sub']); ?>
        </div>
      </div>
    </div>
  </div>
</div>

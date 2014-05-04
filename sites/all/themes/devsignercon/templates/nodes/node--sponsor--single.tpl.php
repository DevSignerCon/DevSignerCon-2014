<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php
    hide($content['comments']);
    hide($content['links']);
    // hide the default image from manage display
    hide($content['field_sponsor_logo']);
    // show the correct image size with a custom variable from preprocess
    print render($sponsor_logo);
    print render($content);
  ?>
  
</article>
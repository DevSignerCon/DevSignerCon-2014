<?php

/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 *
 * @ingroup themeable
 */
?>
<article class="user--profile user--profile__bare"<?php print $attributes; ?>>
  <?php
    hide($user_profile['flags']);
    hide($user_profile['user_picture']);
    hide($user_profile['field_profile_first']);
    hide($user_profile['field_profile_last']);
    hide($user_profile['field_profile_location']);
  ?>
  
  <header class="user--profile__info">
    <div class="user--profile__picture">
      <?php print render($user_profile['user_picture']) ?>
    </div>
    <div class="user--profile__content">
      <?php if( !empty($user_profile['field_profile_first']['#items'][0]['safe_value']) || !empty($user_profile['field_profile_last']['#items'][0]['safe_value']) ) : ?>
        <h2 class="user--profile__full-name">
          <a href="<?php print $user_profile['user_link']; ?>" alt="View <?php print $user_profile['user_name']; ?>'s profile." title="View <?php print $user_profile['user_name']; ?>'s profile.">
            <span class="user--full-name__first"><?php print $user_profile['field_profile_first']['#items'][0]['safe_value']; ?></span>&nbsp;
            <span class="user--full-name__last"><?php print $user_profile['field_profile_last']['#items'][0]['safe_value']; ?></span>
          </a>
        </h2>
      <?php endif; ?>
        
        <?php print render($user_profile); ?>
      
      <?php if( !empty($user_profile['field_profile_location']['#items'][0]['locality']) || !empty($user_profile['field_profile_location']['#items'][0]['administrative_area']) ) : ?>
        <div class="locale">
          <span class="city"><?php print $user_profile['field_profile_location']['#items'][0]['locality']; ?></span>,&nbsp;<span class="state"><?php print $user_profile['field_profile_location']['#items'][0]['administrative_area']; ?></span>
        </div>
      <?php endif; ?>
    </div>
  </header>
</article>

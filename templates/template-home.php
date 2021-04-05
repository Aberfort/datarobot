<?php
/*
 * Template Name: Home Page
 */
get_header(); ?>

  <section class="careers">
    <div class="row">
      <div class="columns medium-6">
        <h1><?php echo __( 'Our open positions' ); ?></h1>
      </div>
      <div class="columns medium-6 text-right">
        dropdown
      </div>
    </div>
    <div class="row">
      <?php

      $url  = 'https://api.jsonbin.io/b/5dd7cefb040d843991f7183c';
      $data = json_decode( file_get_contents( $url ), true );

      $jobs        = $data['jobs'];
      $departments = $data['departments'];

      $departments = array_map( function ( $tag ) {
        return array(
          'name'        => $tag['name'],
          'departments' => $tag['id']
        );
      }, $departments );

      $combined = array();
      foreach ( $jobs as $arr ) {
        $comb = array( 'departments' => $arr['departments'][0], 'title' => $arr['title'], 'location' => $arr['location']['name'], 'absolute_url' => $arr['absolute_url'], 'name' => '' );

        foreach ( $departments as $arr2 ) {
          if ( $arr2['departments'] == $arr['departments'][0] ) {
            $comb['name'] = $arr2['name'];
          }
        }
        $combined[] = $comb;
        ?>
        <div class="medium-6 small-12 columns">
          <div class="careers__item">
            <h3 class="title">
              <?php echo $comb['title']; ?>
            </h3>
            <div class="careers__item--location">
                  <span class="location">
                    <?php echo $comb['location']; ?>
                  </span>
              <span class="department">
                    <?php echo $comb['name']; ?>
                  </span>
            </div>
            <a href="<?php echo $comb['absolute_url'] ?>"><?php echo __('Learn more'); ?></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>

<?php get_footer(); ?>
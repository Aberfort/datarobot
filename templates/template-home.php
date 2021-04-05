<?php
/*
 * Template Name: Home Page
 */
get_header();

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

?>

  <section class="careers">
    <div class="row">
      <div class="columns medium-6">
        <h1><?php echo __( 'Our open positions' ); ?></h1>
      </div>
      <div class="columns medium-3 medium-offset-3 text-right">
        <select class="filters-select">
          <option value="*"><?php echo __( 'All departments' ); ?></option>
          <?php
          foreach ( $departments as $item ) { ?>
            <option value=".<?php echo $item['name'] ?>"><?php echo $item['name']; ?></option>
            <?php
          }
          ?>
        </select>
      </div>
    </div>
    <div class="row grid">
      <?php

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
        <div class="medium-6 small-12 columns careers__item1 <?php echo $comb['name']; ?>">
          <div class="careers__item">
            <h3 class="title">
              <?php echo $comb['title']; ?>
            </h3>
            <div class="careers__item--location">
              <span class="location"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $comb['location']; ?></span>
              <span class="department"><i class="fa fa-users" aria-hidden="true"></i><?php echo $comb['name']; ?></span>
            </div>
            <a href="<?php echo $comb['absolute_url'] ?>"><?php echo __( 'Learn more' ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="row">

    </div>
  </section>

<?php get_footer(); ?>
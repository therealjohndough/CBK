<?php
if (!defined('ABSPATH')) exit;

// Register widget areas
add_action('widgets_init', 'cbkny_widgets_init');

function cbkny_widgets_init() {
  
  // Homepage Hero Widget Area
  register_sidebar([
    'name' => 'Homepage Hero',
    'id' => 'homepage-hero',
    'description' => 'Widget area for homepage hero section',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ]);

  // Homepage Services Widget Area
  register_sidebar([
    'name' => 'Homepage Services',
    'id' => 'homepage-services',
    'description' => 'Widget area for homepage services section',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ]);

  // Homepage Why Cannabis Widget Area
  register_sidebar([
    'name' => 'Homepage Why Cannabis',
    'id' => 'homepage-why-cannabis',
    'description' => 'Widget area for "Why Cannabis Needs Specialists" section',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ]);

  // Footer Widget Areas
  register_sidebar([
    'name' => 'Footer Column 1',
    'id' => 'footer-1',
    'description' => 'First footer column',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ]);

  register_sidebar([
    'name' => 'Footer Column 2',
    'id' => 'footer-2',
    'description' => 'Second footer column',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ]);

  register_sidebar([
    'name' => 'Footer Column 3',
    'id' => 'footer-3',
    'description' => 'Third footer column',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ]);

  register_sidebar([
    'name' => 'Footer Column 4',
    'id' => 'footer-4',
    'description' => 'Fourth footer column',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ]);

  // Sidebar Widget Area
  register_sidebar([
    'name' => 'Sidebar',
    'id' => 'sidebar-1',
    'description' => 'Main sidebar widget area',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ]);

  // Resources Page Widget Areas
  register_sidebar([
    'name' => 'Resources Lead Magnets',
    'id' => 'resources-lead-magnets',
    'description' => 'Widget area for lead magnets on resources page',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ]);

  register_sidebar([
    'name' => 'Resources Articles',
    'id' => 'resources-articles',
    'description' => 'Widget area for articles on resources page',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ]);
}

// Custom widget for lead magnets
class CBKNY_Lead_Magnet_Widget extends WP_Widget {
  
  public function __construct() {
    parent::__construct(
      'cbkny_lead_magnet',
      'CBKNY Lead Magnet',
      ['description' => 'Display a lead magnet with download button']
    );
  }

  public function widget($args, $instance) {
    $title = !empty($instance['title']) ? $instance['title'] : 'Download Free Guide';
    $description = !empty($instance['description']) ? $instance['description'] : 'Get our free cannabis accounting guide';
    $button_text = !empty($instance['button_text']) ? $instance['button_text'] : 'Download Free Guide';
    $resource_type = !empty($instance['resource_type']) ? $instance['resource_type'] : 'compliance-checklist';

    echo $args['before_widget'];
    ?>
    <div class="card" style="padding: 2rem; text-align: center;">
      <div style="width: 80px; height: 80px; background: var(--cbkny-pink); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--cbkny-white); font-size: 2rem;">📋</div>
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;"><?php echo esc_html($title); ?></h3>
      <p style="margin-bottom: 1.5rem;"><?php echo esc_html($description); ?></p>
      <button class="btn btn-primary" onclick="downloadResource('<?php echo esc_attr($resource_type); ?>')" style="width: 100%;">
        <?php echo esc_html($button_text); ?>
      </button>
    </div>
    <?php
    echo $args['after_widget'];
  }

  public function form($instance) {
    $title = !empty($instance['title']) ? $instance['title'] : '';
    $description = !empty($instance['description']) ? $instance['description'] : '';
    $button_text = !empty($instance['button_text']) ? $instance['button_text'] : '';
    $resource_type = !empty($instance['resource_type']) ? $instance['resource_type'] : '';
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('description'); ?>">Description:</label>
      <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo esc_textarea($description); ?></textarea>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('button_text'); ?>">Button Text:</label>
      <input class="widefat" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo esc_attr($button_text); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('resource_type'); ?>">Resource Type:</label>
      <input class="widefat" id="<?php echo $this->get_field_id('resource_type'); ?>" name="<?php echo $this->get_field_name('resource_type'); ?>" type="text" value="<?php echo esc_attr($resource_type); ?>">
    </p>
    <?php
  }

  public function update($new_instance, $old_instance) {
    $instance = [];
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    $instance['description'] = (!empty($new_instance['description'])) ? strip_tags($new_instance['description']) : '';
    $instance['button_text'] = (!empty($new_instance['button_text'])) ? strip_tags($new_instance['button_text']) : '';
    $instance['resource_type'] = (!empty($new_instance['resource_type'])) ? strip_tags($new_instance['resource_type']) : '';
    return $instance;
  }
}

// Register the custom widget
add_action('widgets_init', function() {
  register_widget('CBKNY_Lead_Magnet_Widget');
});

// Custom widget for services
class CBKNY_Service_Widget extends WP_Widget {
  
  public function __construct() {
    parent::__construct(
      'cbkny_service',
      'CBKNY Service',
      ['description' => 'Display a service card']
    );
  }

  public function widget($args, $instance) {
    $title = !empty($instance['title']) ? $instance['title'] : 'Service Title';
    $description = !empty($instance['description']) ? $instance['description'] : 'Service description';
    $icon = !empty($instance['icon']) ? $instance['icon'] : '💼';

    echo $args['before_widget'];
    ?>
    <div class="card">
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;"><?php echo esc_html($title); ?></h3>
      <p><?php echo esc_html($description); ?></p>
    </div>
    <?php
    echo $args['after_widget'];
  }

  public function form($instance) {
    $title = !empty($instance['title']) ? $instance['title'] : '';
    $description = !empty($instance['description']) ? $instance['description'] : '';
    $icon = !empty($instance['icon']) ? $instance['icon'] : '';
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('description'); ?>">Description:</label>
      <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo esc_textarea($description); ?></textarea>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('icon'); ?>">Icon (emoji):</label>
      <input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo esc_attr($icon); ?>">
    </p>
    <?php
  }

  public function update($new_instance, $old_instance) {
    $instance = [];
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    $instance['description'] = (!empty($new_instance['description'])) ? strip_tags($new_instance['description']) : '';
    $instance['icon'] = (!empty($new_instance['icon'])) ? strip_tags($new_instance['icon']) : '';
    return $instance;
  }
}

// Register the service widget
add_action('widgets_init', function() {
  register_widget('CBKNY_Service_Widget');
});

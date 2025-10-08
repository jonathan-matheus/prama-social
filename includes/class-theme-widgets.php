<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Theme_Widgets
{
    public function init()
    {
        add_action('widgets_init', [$this, 'register_widgets']);
    }

    public function register_widgets()
    {
        register_sidebar([
            'name' => __('Our services section', 'pragmasocial'),
            'id' => 'services-section',
            'description' => __('Widgets in this area will be shown on the services section.', 'pragmasocial'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="text-4xl font-semibold text-[' . get_theme_mod('theme_color_text-secondary', '#000000') . ']">',
            'after_title' => '</h3>'
        ]);

        register_widget('PS_Services_Intro_Widget');
    }
}

class PS_Services_Intro_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'ps_services_intro_widget',
            __('Services Intro Widget', 'pragmasocial'),
            ['description' => __('A widget to display the services section intro.', 'pragmasocial')]
        );
    }

    public function widget($args, $instance)
    {
        $title = $instance['title'] ?? '';
        $text = $instance['text'] ?? '';

        echo $args['before_widget'];

        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        if (!empty($text)) {
            echo '<p class="text-xl max-w-5xl pt-2 text-[' . get_theme_mod('theme_color_text-primary', '#2d3748') . ']">' . esc_html($text) . '</p>';
        }

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = $instance['title'] ?? '';
        $text = $instance['text'] ?? '';

        ?>
        <p>
            <label for="<?= $this->get_field_id('title'); ?>">Titulo</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                name="<?= $this->get_field_name('title'); ?>" type="text" value="<?= esc_attr($title); ?>">
        </p>

        <p>
            <label for="<?= $this->get_field_id('text'); ?>">Texto</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>"
                name="<?= $this->get_field_name('text'); ?>"><?= esc_textarea($text); ?></textarea>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['text'] = (!empty($new_instance['text'])) ? sanitize_textarea_field($new_instance['text']) : '';

        return $instance;
    }
}


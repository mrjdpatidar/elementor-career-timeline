<?php
if (!defined('ABSPATH')) exit;
class Career_Timeline_Widget extends \Elementor\Widget_Base {
    public function get_name() { return 'career_timeline'; }
    public function get_title() { return 'Career Timeline'; }
    public function get_icon() { return 'eicon-time-line'; }
    public function get_categories() { return ['general']; }
    public function get_style_depends() { return ['career-timeline']; }
    public function get_script_depends() { return ['career-timeline']; }
    protected function register_controls() {
        $this->start_controls_section('section_content', ['label'=>'Content']);
        $this->add_control('scroll_progress', ['label'=>'Scroll Progress Animation','type'=>\Elementor\Controls_Manager::SWITCHER,'label_on'=>'Yes','label_off'=>'No','return_value'=>'yes','default'=>'yes']);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control('year', ['label'=>'Year','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'2024']);
        $repeater->add_control('description', ['label'=>'Description','type'=>\Elementor\Controls_Manager::WYSIWYG,'default'=>'Career milestone description.']);
        $repeater->add_control('side', ['label'=>'Position','type'=>\Elementor\Controls_Manager::SELECT,'options'=>['auto'=>'Alternate','left'=>'Left','right'=>'Right'],'default'=>'auto']);
        $repeater->add_control('link', ['label'=>'Optional Link','type'=>\Elementor\Controls_Manager::URL,'placeholder'=>'https://example.com']);
        $repeater->add_control('link_text', ['label'=>'Link Text','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'Read more']);
        $this->add_control('items', ['label'=>'Timeline Items','type'=>\Elementor\Controls_Manager::REPEATER,'fields'=>$repeater->get_controls(),'title_field'=>'{{{ year }}}','default'=>[
            ['year'=>'2016','description'=>'Joined corporate operations and led strategic customer experience initiatives.'],
            ['year'=>'2018','description'=>'Spearheaded organizational transformation and achieved top leadership awards.'],
            ['year'=>'2020','description'=>'Published acclaimed business insights and customer service methodology.'],
            ['year'=>'2022','description'=>'Founded modern hospitality venture and expanded brand across major metropolitan hubs.'],
            ['year'=>'2024','description'=>'Launched flagship international presence and global consulting operations.'],
        ]]);
        $this->end_controls_section();
        $this->start_controls_section('section_layout', ['label'=>'Layout','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
        $this->add_responsive_control('max_width', ['label'=>'Maximum Width','type'=>\Elementor\Controls_Manager::SLIDER,'size_units'=>['px','%'],'range'=>['px'=>['min'=>300,'max'=>1600],'%' => ['min'=>50,'max'=>100]],'default'=>['unit'=>'px','size'=>1000],'selectors'=>['{{WRAPPER}} .mct-inner'=>'max-width: {{SIZE}}{{UNIT}};']]);
        $this->add_responsive_control('item_height', ['label'=>'Item Minimum Height','type'=>\Elementor\Controls_Manager::SLIDER,'range'=>['px'=>['min'=>50,'max'=>400]],'default'=>['size'=>130],'selectors'=>['{{WRAPPER}} .mct-item'=>'min-height: {{SIZE}}px;']]);
        $this->add_responsive_control('item_padding', ['label'=>'Item Padding','type'=>\Elementor\Controls_Manager::DIMENSIONS,'size_units'=>['px','em'],'selectors'=>['{{WRAPPER}} .mct-item-content'=>'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};']]);
        $this->add_responsive_control('section_padding', ['label'=>'Section Padding','type'=>\Elementor\Controls_Manager::DIMENSIONS,'size_units'=>['px','em'],'selectors'=>['{{WRAPPER}} .mct-section'=>'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};']]);
        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), ['name'=>'background','selector'=>'{{WRAPPER}} .mct-section']);
        $this->end_controls_section();
        $this->start_controls_section('section_heading_style', ['label'=>'Timeline Text','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
        foreach (['year'=>'Year','description'=>'Description'] as $key=>$label) {
            $selector = '{{WRAPPER}} .mct-item .mct-'.$key;
            $this->add_control($key.'_color', ['label'=>$label.' Normal Color','type'=>\Elementor\Controls_Manager::COLOR,'default'=>$key==='year'?'#222222':'#444444','selectors'=>[$selector=>'color: {{VALUE}};']]);
            $this->add_control($key.'_active_color', ['label'=>$label.' Active Color','type'=>\Elementor\Controls_Manager::COLOR,'default'=>$key==='year'?'#222222':'#444444','selectors'=>['{{WRAPPER}} .mct-item.is-active .mct-'.$key=>'color: {{VALUE}};']]);
            $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), ['name'=>$key.'_typography','label'=>$label.' Typography','selector'=>$selector]);
        }
        $this->add_control('default_text_opacity', [
            'label'=>'Normal Item Opacity (%)', 'type'=>\Elementor\Controls_Manager::SLIDER,
            'range'=>['px'=>['min'=>0,'max'=>100,'step'=>1]],
            'default'=>['size'=>70],
            'selectors'=>['{{WRAPPER}} .mct-section'=>'--mct-default-opacity: calc({{SIZE}} / 100);']
        ]);
        $this->add_control('active_text_opacity', [
            'label'=>'Active Item Opacity (%)', 'type'=>\Elementor\Controls_Manager::SLIDER,
            'range'=>['px'=>['min'=>0,'max'=>100,'step'=>1]],
            'default'=>['size'=>100],
            'selectors'=>['{{WRAPPER}} .mct-section'=>'--mct-active-opacity: calc({{SIZE}} / 100);']
        ]);
        $this->end_controls_section();
        $this->start_controls_section('section_link_hover', ['label'=>'Link Style & Hover','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
        $this->add_control('link_color', ['label'=>'Normal Link Color','type'=>\Elementor\Controls_Manager::COLOR,'default'=>'#ff963e','selectors'=>['{{WRAPPER}} .mct-section .mct-item a.mct-link, {{WRAPPER}} .mct-section .mct-item a.mct-link:visited'=>'color: {{VALUE}};']]);
        $this->add_control('link_hover_color', ['label'=>'Hover Link Color','type'=>\Elementor\Controls_Manager::COLOR,'default'=>'#111111','selectors'=>['{{WRAPPER}} .mct-section .mct-item a.mct-link:hover, {{WRAPPER}} .mct-section .mct-item a.mct-link:focus-visible'=>'color: {{VALUE}};']]);
        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), ['name'=>'link_typography','label'=>'Link Typography','selector'=>'{{WRAPPER}} .mct-section .mct-item a.mct-link']);
        $this->add_control('link_underline_color', ['label'=>'Underline Color','type'=>\Elementor\Controls_Manager::COLOR,'default'=>'#ff963e','selectors'=>['{{WRAPPER}} .mct-section .mct-item a.mct-link::after'=>'background-color: {{VALUE}};']]);
        $this->add_control('link_animation', ['label'=>'Hover Effect','type'=>\Elementor\Controls_Manager::SELECT,'default'=>'underline','options'=>['underline'=>'Underline Left to Right','lift'=>'Lift Up','none'=>'None']]);
        $this->add_control('link_animation_duration', ['label'=>'Animation Duration (ms)','type'=>\Elementor\Controls_Manager::SLIDER,'range'=>['px'=>['min'=>100,'max'=>1000,'step'=>50]],'default'=>['size'=>300],'selectors'=>['{{WRAPPER}} .mct-section'=>'--mct-hover-duration: {{SIZE}}ms;']]);
        $this->end_controls_section();
        $this->start_controls_section('section_line_style' , ['label'=>'Timeline Line & Markers','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
        $this->add_control('line_color', ['label'=>'Line Color','type'=>\Elementor\Controls_Manager::COLOR,'default'=>'#e3e3e3','selectors'=>['{{WRAPPER}} .mct-track'=>'background-color: {{VALUE}};']]);
        $this->add_control('progress_color', ['label'=>'Progress Color','type'=>\Elementor\Controls_Manager::COLOR,'default'=>'#ff963e','selectors'=>['{{WRAPPER}} .mct-progress'=>'background-color: {{VALUE}};']]);
        $this->add_control('marker_color', ['label'=>'Marker Color','type'=>\Elementor\Controls_Manager::COLOR,'default'=>'#dddddd','selectors'=>['{{WRAPPER}} .mct-marker'=>'background-color: {{VALUE}};']]);
        $this->add_control('active_marker_color', ['label'=>'Active Marker Color','type'=>\Elementor\Controls_Manager::COLOR,'default'=>'#ff963e','selectors'=>['{{WRAPPER}} .mct-item.is-active .mct-marker'=>'background-color: {{VALUE}};']]);
        $this->add_responsive_control('line_width', ['label'=>'Line Width','type'=>\Elementor\Controls_Manager::SLIDER,'range'=>['px'=>['min'=>1,'max'=>12]],'default'=>['size'=>2],'selectors'=>['{{WRAPPER}} .mct-track'=>'width: {{SIZE}}px;']]);
        $this->add_responsive_control('marker_width', ['label'=>'Marker Width','type'=>\Elementor\Controls_Manager::SLIDER,'range'=>['px'=>['min'=>4,'max'=>35]],'default'=>['size'=>12],'selectors'=>['{{WRAPPER}} .mct-marker'=>'width: {{SIZE}}px;']]);
        $this->add_responsive_control('marker_height', ['label'=>'Marker Height','type'=>\Elementor\Controls_Manager::SLIDER,'range'=>['px'=>['min'=>2,'max'=>25]],'default'=>['size'=>6],'selectors'=>['{{WRAPPER}} .mct-marker'=>'height: {{SIZE}}px;']]);
        $this->end_controls_section();
    }
    protected function render() {
        $s = $this->get_settings_for_display();
        $animated = ($s['scroll_progress'] ?? '') === 'yes';
        echo '<section class="mct-section"><div class="mct-inner">';
        echo '<div class="mct-timeline mct-hover-'.esc_attr($s['link_animation'] ?? 'underline').'" data-animate="'.($animated?'yes':'no').'"><div class="mct-track"><div class="mct-progress"></div></div>';
        foreach (($s['items'] ?? []) as $i=>$item) {
            $side = $item['side'] ?? 'auto';
            if ($side === 'auto') $side = $i % 2 === 0 ? 'right' : 'left';
            echo '<article class="mct-item mct-side-'.esc_attr($side).'"><span class="mct-marker" aria-hidden="true"></span><div class="mct-item-content">';
            echo '<h3 class="mct-year">'.esc_html($item['year'] ?? '').'</h3>';
            echo '<div class="mct-description">'.wp_kses_post($item['description'] ?? '').'</div>';
            if (!empty($item['link']['url'])) {
                $target = !empty($item['link']['is_external']) ? ' target="_blank" rel="noopener noreferrer"' : '';
                echo '<a class="mct-link" href="'.esc_url($item['link']['url']).'"'.$target.'>'.esc_html($item['link_text'] ?: 'Read more').'</a>';
            }
            echo '</div></article>';
        }
        echo '</div></div></section>';
    }
}

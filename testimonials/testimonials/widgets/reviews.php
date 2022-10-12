<?php
class Elementor_Reviews extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reviews';
	}

	public function get_title() {
		return esc_html__( 'Reviews', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'reviews', 'testimonials' , 'slider' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Reviews', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'review_image', [
				'label' => esc_html__( 'Choose Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'review_icon', [
				'label' => esc_html__( 'Icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				
			]
		);
		$repeater->add_control(
			'review_title', [
				'label' => esc_html__( 'Name', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe' , 'plugin-name' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'review_designation', [
				'label' => esc_html__( 'Designation', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'review_content', [
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Review', 'plugin-name' ),
				'placeholder' => esc_html__( 'Type your Review here', 'plugin-name' ),
			]
		);
		$repeater->add_control(
			'review_rating_enable',
			[
				'label' => esc_html__( 'Show Rating', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$repeater->add_control(
			'review_rating',
			[
				'label' => esc_html__( 'Rating', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 5,
				'step' => 1,
				'default' => 5,
                'condition' => [
                    'review_rating_enable' => 'true',
                ],
			]
		);

        $repeater->add_control(
			'review_user_location',
			[
				'label' => esc_html__( 'Show Location?', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

        $repeater->add_control(
			'location', [
				'label' => esc_html__( 'Location', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
                'condition' => [
                    'review_user_location' => 'true',
                ],
			]
		);

		$repeater->add_control(
			'location_icon', [
				'label' => esc_html__( 'location Icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition' => [
                    'review_user_location' => 'true',
                ],
				
			]
		);

		

		$this->add_control(
			'reviews',
			[
				'label' => esc_html__( 'Repeater List', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'review_title' => esc_html__( 'Title #1', 'plugin-name' ),
						'review_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'plugin-name' ),
					],
					[
						'review_title' => esc_html__( 'Title #2', 'plugin-name' ),
						'review_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'plugin-name' ),
					],
				],
				'title_field' => '{{{ review_title }}}',
			]
		);


        $this->add_responsive_control(
			'width',
			[
				'label' => esc_html__( 'Width', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1350,
						'step' => 10,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'slide_per_view',
			[
				'label' => esc_html__( 'Slide Per View', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => esc_html__( 'One', 'textdomain' ),
					'2'  => esc_html__( 'Two', 'textdomain' ),
					'3'  => esc_html__( 'Three', 'textdomain' ),
				],
			]
		);


		$this->end_controls_section();

       // Content Tab End



        // Start Additional Options


        $this->start_controls_section(
			'setting_section',
			[
				'label' => esc_html__( 'Additional Options', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


        $this->add_control(
			'enable_arrow',
			[
				'label' => esc_html__( 'Enable Arrow ?', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
        $this->add_control(
			'autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
        $this->add_control(
			'loop',
			[
				'label' => esc_html__( 'Infinite Loop', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
        $this->add_control(
			'lazyload',
			[
				'label' => esc_html__( 'Lazy load', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
        

		$this->end_controls_section();

        // End Additional Options

		


		// Style  Section Style

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => esc_html__( 'Name Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review-details  .user-desc h4' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
	        \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .review-details  .user-desc h4',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );

		$this->add_control(
			'review_designation_color',
			[
				'label' => esc_html__( 'Designation Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review-details  .user-desc h5' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
	        \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typography',
                'selector' => '{{WRAPPER}} .review-details  .user-desc h5',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );

		$this->add_control(
			'review_content_color',
			[
				'label' => esc_html__( 'Content Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review-details  .review-dsc' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
	        \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .review-details  .review-dsc',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );
		

		$this->end_controls_section();

        // End Section Style

        // Start Section Responsive

        $this->start_controls_section(
			'section_responsive',
			[
				'label' => esc_html__( 'Review Section', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
			'review_padding',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ss' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        // End Section Responsive     

		

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$reviews = $settings['reviews'];

		

		if ( !empty($reviews) ) {
			?>
				<div class="review-area-wrapper">

					<?php foreach ( $reviews as $review ): ?>

						<div class="single-review-area">
							<?php if($review['review_image']['url']):?>
								<div class="user-thumbnail">
									<img src="<?php echo$review['review_image']['url'] ?>">
								</div>
							<?php endif;?>
							<div class="icon-wrapper-area">
								<?php if(!empty($review['review_icon'])):?>
								<div class="icon-section">
									<?php \Elementor\Icons_Manager::render_icon( $review['review_icon'], [ 'aria-hidden' => 'true' ] ); ?>
								</div>

								<?php endif; if(true == $review['review_rating_enable']):?>
										<div class="rating-section">
											<?php 
												for ($i = 1; $i <= 5; $i++) {
													echo '<i class="eicon-star"></i>';
												}
											?>
										</div>	
								<?php endif;?>	

							</div>

							<div class="review-details">
								<div class="review-dsc">
									<?php echo $review['review_content'];?>
								</div>
								<div class="user-desc">
									<h4><?php echo $review['review_title'];?></h4>
									<h5><?php echo $review['review_designation'];?></h5>
								</div>
								<?php if(true == $review['review_user_location']):?>
									<div class="user-location">
										<span><?php \Elementor\Icons_Manager::render_icon( $review['review_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
										<h5><?php echo $review['location'];?></h5>
									</div>
								<?php endif;?>
							</div>
						</div>

						<?php endforeach;?>
				</div>
			<?php
			
		}
	}
}
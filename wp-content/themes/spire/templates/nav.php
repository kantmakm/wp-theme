			<div id="primary-navigation">

				<input type="checkbox" name="menu-toggle" id="menu-toggle" />

				<label for="menu-toggle">
					<svg width="24" height="16" viewBox="0 0 24 16" version="1.1" xmlns="http://www.w3.org/2000/svg"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-322.000000, -52.000000)" fill="#FFFFFF"><g transform="translate(322.000000, 52.000000)"><rect x="0" y="0" width="24" height="2.9"/><rect x="0" y="6.6" width="24" height="2.9"/><rect x="0" y="13.1" width="24" height="2.9"/></g></g></g></svg>
				</label>

				<nav role="navigation">
				<?php $args = array(
					'menu'				=> 'Primary Navigation',
					'container'			=> FALSE,
					'container_id'		=> FALSE,
					'menu_class'		=> '',
					'menu_id'			=> FALSE,
					'items_wrap'		=> '%3$s',
					'echo'				=> FALSE
				);
				echo str_replace( array('<li', '<ul', '</li>', '</ul>'), array('<div', '<div', '</div>', '</div>'), wp_nav_menu($args) ); ?>
				</nav>
			</div>

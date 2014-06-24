<?php

add_action('genesis_meta', 'beta_home_meta');

function beta_home_meta() {

    remove_action('genesis_loop', 'genesis_do_loop');
}
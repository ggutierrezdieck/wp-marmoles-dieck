<?php
// add custum post types to the theme
function post_types(){


  register_post_type('Materiales', array(
    'supports'=>array('title','editor' ,'thumbnail','excerpt','custom-fieled'),
    'rewrite'=>array('slug'=>'Materiales'),
    'has_archive'=>true,
    'public'=>true,
    'labels'=>array(
        'name'=>'Materiales',
        'add_new_item'=>'Agregar nuevo Material',
        'edit_item' =>'Modificar Material',
        'all_items'=> 'Ver todos los Materiales',
        'singular_name'=>'Material'
    ),
    'menu_icon'=>'dashicons-schedule',
  ));


  register_post_type('Inspiraciones', array(
    'supports'=>array('title','editor' ,'thumbnail','excerpt','custom-fieled'),
    'rewrite'=>array('slug'=>'Inspiraciones'),
    'has_archive'=>true,
    'public'=>true,
    'labels'=>array(
        'name'=>'Inspiraciones',
        'add_new_item'=>'Agregar nueva Inspiracion',
        'edit_item' =>'Modificar Inspiracion',
        'all_items'=> 'Ver todos las Inspiraciones',
        'singular_name'=>'Inspiracion'
    ),
    'menu_icon'=>'dashicons-building',
  ));


  register_post_type('Servicios', array(
    'supports'=>array('title','editor' ,'thumbnail','excerpt','custom-fieled'),
    'rewrite'=>array('slug'=>'Servicios'),
    'has_archive'=>true,
    'public'=>true,
    'labels'=>array(
        'name'=>'Servicios',
        'add_new_item'=>'Agregar nueva Servicio',
        'edit_item' =>'Modificar Servicio',
        'all_items'=> 'Ver todos las Servicios',
        'singular_name'=>'Servicio'
    ),
    'menu_icon'=>'dashicons-businessman',
  ));

   register_post_type('Sucursales', array(
     'supports'=>array('title','editor' ,'thumbnail','excerpt','custom-fieled'),
     'rewrite'=>array('slug'=>'Sucursales'),
     'has_archive'=>true,
     'public'=>true,
     'labels'=>array(
         'name'=>'Sucursales',
         'add_new_item'=>'Agregar nueva Sucursal',
         'edit_item' =>'Modificar Sucursal',
         'all_items'=> 'Ver todos las Sucursales',
         'singular_name'=>'Sucursal'
     ),
     'menu_icon'=>'dashicons-location',
  ));
}add_action('init','post_types');

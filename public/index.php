<?php $title = 'Test'; ?>

<?php ob_start(); ?>

<h1>Mon super blog</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, accusamus.</p>

<?php $content = ob_get_clean(); ?>

<?php require('../templates/layout.php');?>
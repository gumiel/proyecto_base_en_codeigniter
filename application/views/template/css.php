<!-- Bootstrap 3.3.7 -->
<?php foreach ($this->templateci->listCss() as $css): ?>
  <link rel="stylesheet" href="<?php echo base_url().$css['url']; ?>" >
<?php endforeach ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->

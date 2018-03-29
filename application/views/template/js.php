<?php foreach ($this->templateci->listJs() as $js): ?>
  <script src="<?php echo base_url().$js['url']; ?>"></script>
<?php endforeach ?>


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
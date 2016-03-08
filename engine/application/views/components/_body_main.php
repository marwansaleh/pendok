<?php if (isset($page_header)):?>
<h1 class="page-header"><?php echo $page_header; ?></h1>
<?php endif;

if (isset($subview)):
    $this->load->view($subview);
endif;
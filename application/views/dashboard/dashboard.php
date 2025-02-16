<?php $this->load->view('templates/header'); ?>

<div class="container d-flex justify-content-center align-items-center flex-grow-1">
    <h2>Welcome to the Dashboard!</h2>
    <p>You are logged in as <strong><?php echo $this->session->userdata('email'); ?></strong></p>
</div>

<?php $this->load->view('templates/footer'); ?>
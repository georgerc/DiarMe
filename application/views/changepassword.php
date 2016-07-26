<?php $this->load->library('form_validation'); ?>
<?php echo validation_errors(); ?>
<div class="content">

    <?php echo form_open('scripts/change_password'); ?>
    <table class=”table table-bordered”>

        <tbody>

        <tr>
            <td>
                <small><?php echo "Old Password:"; ?></small>
            </td>
            <td><?php echo form_password('opassword'); ?></td>

        </tr>
        <tr>
            <td>
                <small><?php echo "New Password:"; ?></small>
            </td>
            <td><?php echo form_password('npassword'); ?></td>

        </tr>
        <tr>
            <td>
                <small><?php echo "Confirm Password:"; ?></small>
            </td>
            <td><?php echo form_password('cpassword'); ?></td>
        </tr>
        </tbody>
    </table>
    &nbsp;&nbsp;
    <div id="some" style="position:relative;">
        <button type="submit" class="btn btn-primary"><i class=" icon-ok-sign icon-white"></i>&nbsp;Submit</button>

        <?php

        echo form_close();

        ?>
    </div>
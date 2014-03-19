<div class="users form">
    <?php
        // Pass the model name into the Create function, also pass where the data will be sent
        echo $this->Form->create('User', array( 'controller' => 'users', 'action' => 'login' ) );

        // Cake automatically knows, based on the input, to create input fields for these two. Cool eh?
        echo $this->Form->input('uid');
        echo $this->Form->input('pswd');

        // Create the submit button
        echo $this->Form->end('Login');
    ?>
</div>

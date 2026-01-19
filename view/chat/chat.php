<?php

?>

<div class="container">
    <h1>Chatting with <?= $this->user->user_name; ?></h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <div class="chatbox"
            style="border: 1px black solid; padding: 10px; height: 400px; width: 400px; overflow-y: scroll; margin-bottom: 10px; margin-left: 30% ;">
            <section class="discussion">

                <!-- ??? -->
                <?php if ($this->message) { ?>

                    <!-- output all messages -->
                    <?php foreach ($this->message as $message) { ?>

                        <!-- check if P1 in db is the same as current user -->
                        <?php if ($message->person1_user_id == $_SESSION['user_id']) { ?>
                            <div class="bubble sender first"><?php echo $message->message; ?></div>

                        <?php } else { ?>

                            <!-- everything else gets the recipient class -->
                            <div class="bubble recipient first"><?php echo $message->message; ?></div>
                        <?php } ?>

                    <?php } ?>

                <?php  } ?>

            </section>

        </div>



    </div>
    <div style="margin-left: 40%;">
        <form action="/huge/huge-3.3.1/chat/chat/<?= $this->user->user_id ?>" method="post">
            <input type="text" name="message" id="message">
            <button type="submit" name="submit">Send</button>
        </form>
    </div>
</div>

<?php


$user_id = '';

if (
    isset($_REQUEST['submit'])
) {
    $person1_user_id = Session::get('user_id');
    $person2_user_id = $this->user->user_id;
    $message = $_POST['message'];
    //echo $person2_user_id . $person1_user_id . $message;
    //FriendModel::befriendUser($user_id);
    ChatModel::insertMessagesToDatabase($person1_user_id, $person2_user_id, $message);
    //Refresh page when message sent
    echo '<script>window.location.href = "' . Config::get('URL') . 'chat/chat/' . $this->user->user_id . '";</script>';
}
?>
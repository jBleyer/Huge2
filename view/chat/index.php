<div class="container">
    <h1>Chat</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h3>What happens here ?</h3>
        <div>
            Chat function
        </div>
        <div>

            <table class="overview-table">
                <thead>
                    <tr>
                        <td>Avatar</td>
                        <td>Username</td>
                        <td>User's email</td>
                        <td>Activated ?</td>
                        <td>Link to user's profile</td>
                    </tr>
                </thead>
                <?php foreach ($this->users as $user) { ?>
                    <tr class="<?= ($user->user_active == 0 ? 'inactive' : 'active'); ?>">
                        <td class="avatar">
                            <?php if (isset($user->user_avatar_link)) { ?>
                                <img src="<?= $user->user_avatar_link; ?>" />
                            <?php } ?>
                        </td>
                        <td><?= $user->user_name; ?></td>
                        <td><?= $user->user_email; ?></td>
                        <td><?= ($user->user_active == 0 ? 'No' : 'Yes'); ?></td>
                        <td>
                            <a href="<?= Config::get('URL') . 'chat/chat/' . $user->user_id; ?>">chat</a>

                            <!-- Check for notifications -->
                            <!--User 1 = session: and user 2 = user->id fro-->
                            <?php $notifications = ChatModel::getNotifications(Session::get('user_id'), $user->user_id);

                            //can also be placed in the model function and echo'd i supposed
                            if ($notifications > 0) { ?>
                                <span
                                    style="margin: 5px; padding: 5px; padding-left:7px; padding-right:7px; border-radius: 25px; background-color: #dc2020;">
                                    <?= $notifications; ?>
                                </span>

                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
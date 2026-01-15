<div class="container">
    <h1>Add as Friend</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h3>Just a simple soon-to-be-friend list </h3>
        <div>
            Here you can see all your possible friends! <br>
            This controller/action/view shows a list of all users that are (currently) not your friends.
        </div>
        <div style="text-align: center; justify-content: center; display: flex; margin-top: 20px;">
            <table class="overview-table">
                <thead>
                    <tr>
                        <td>Avatar</td>
                        <td>Username</td>
                        <td>User's email</td>
                        <td>Friend actions</td>
                    </tr>
                </thead>
                <?php foreach ($this->users as $user) { ?>
                <tr class="<?= ($user->user_active == 0 ? 'inactive' : 'active'); ?>">
                    <!-- <td><?= $user->user_id; ?></td>-->
                    <td class="avatar">
                        <?php if (isset($user->user_avatar_link)) { ?>
                        <a href="<?= Config::get('URL') . 'addFriends/showProfile/' . $user->user_id; ?>">
                            <img src="<?= $user->user_avatar_link; ?>" /></a>
                        <?php } ?>
                    </td>

                    <td><?= $user->user_name; ?></td>
                    <td><?= $user->user_email; ?></td>

                    <!-- !TODO check if user is already a friend. If not, show them in this list -->

                    <td>
                        <button name="delete" style="background-color: green;">befriend</button>
                    </td>
                    <!-- <td><?= ($user->user_active == 0 ? 'No' : 'Yes'); ?></td>-->
                    <!-- <td>
                        <a href="<?= Config::get('URL') . 'profile/showProfile/' . $user->user_id; ?>">Profile</a>
                    </td>-->
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
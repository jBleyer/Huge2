<div class="container">
    <h1>Contacts</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h3>Just a simple contact list </h3>
        <div>
            Here you can see all your friends! <br>
            This controller/action/view shows a list of all users that are your friends.
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

                <?php if ($user->is_friend == true) {
                    ?>

                <tr class="<?= ($user->user_active == 0 ? 'inactive' : 'active'); ?>">
                    <!-- <td><?= $user->user_id; ?></td>-->
                    <td class="avatar">
                        <?php if (isset($user->user_avatar_link)) { ?>
                        <a href="<?= Config::get('URL') . 'contacts/showProfile/' . $user->user_id; ?>">
                            <img src="<?= $user->user_avatar_link; ?>" /></a>
                        <?php } ?>
                    </td>
                    <td><?= $user->user_name; ?></td>
                    <td><?= $user->user_email; ?></td>
                    <td>
                        <!-- If befriend button is pressed change the isFriend attribute to true, where the Profile id is in DB-->
                        <form action="index?userId=<?= $user->user_id ?>" method="post">
                            <button name="unfriend" style="background-color: #df2a3c;">unfriend</button>
                        </form>

                    </td>
                    <!-- <td><?= ($user->user_active == 0 ? 'No' : 'Yes'); ?></td>-->
                    <!-- <td>
                        <a href="<?= Config::get('URL') . 'profile/showProfile/' . $user->user_id; ?>">Profile</a>
                    </td>-->
                </tr>
                <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<!-- I do not know how i can make php recognize a button press to save my life, so now I have to work with this. Good luck! -->
<!-- If unfriend button is pressed change the isFriend attribute to false, where the Profile id is in DB -->
<?php

$user_id = '';

if (
    isset($_REQUEST['unfriend'])
) {
    //echo "lmao";
    $user_id = $_GET['userId'];
    FriendModel::unfriendUser($user_id);
}
?>
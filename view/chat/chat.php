<div class="container">
    <h1>Chatting with <?= $this->user->user_name; ?></h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h3>What happens here ?</h3>
        <div>This controller/action/view shows all public information about a certain user.</div>

        <?php if ($this->user) { ?>
            <div>

                <section class="discussion">

                    <div class="bubble sender first">Hello</div>
                    <div class="bubble sender last">This is a CSS demo of the Messenger chat bubbles, that merge when
                        stacked together.</div>

                    <div class="bubble recipient first">Oh that's cool!</div>
                    <div class="bubble recipient last">Did you use JavaScript to perform that kind of effect?</div>

                    <div class="bubble sender first">No, that's full CSS3!</div>
                    <div class="bubble sender middle">Take a look to the 'JS' section of this Pen... it's empty! 😃</div>
                    <div class="bubble sender last">And it's also really lightweight!</div>

                    <div class="bubble recipient">Dope!</div>

                    <div class="bubble sender first">Yeah, but I still didn't succeed to get rid of these stupid .first and
                        .last classes.</div>
                    <div class="bubble sender middle">The only solution I see is using JS, or a &lt;div&gt; to group
                        elements together, but I don't want to ...</div>
                    <div class="bubble sender last">I think it's more transparent and easier to group .bubble elements in
                        the same parent.</div>
                    <p>
                        <!-- User controller here!-->
                        <!--<?= $this->user_name; ?>-->
                    </p>
                </section>


                <!-- Get your own user ID-->








                <!--<table class="overview-table">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Avatar</td>
                            <td>Username</td>
                            <td>User's email</td>
                            <td>Activated ?</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="<?= ($this->user->user_active == 0 ? 'inactive' : 'active'); ?>">
                            <td><?= $this->user->user_id; ?></td>
                            <td class="avatar">
                                <?php if (isset($this->user->user_avatar_link)) { ?>
                                    <img src="<?= $this->user->user_avatar_link; ?>" />
                                <?php } ?>
                            </td>
                            <td><?= $this->user->user_name; ?></td>
                            <td><?= $this->user->user_email; ?></td>
                            <td><?= ($this->user->user_active == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                    </tbody>
                </table>-->
            </div>
            <div>
                <form action="/huge/huge-3.3.1/chat/chat/<?= $this->user->user_id ?>" method="post">
                    <input type="text" name="message" id="message">
                    <button type="submit" name="submit">Send</button>
                </form>
            </div>
        <?php } ?>

    </div>
</div>

<?php

$user_id = '';

if (
    isset($_REQUEST['submit'])
) {
    echo "lmao";
    $person1_user_id = Session::get('user_id');
    $person2_user_id = $this->user->user_id;
    $message = $_POST['message'];
    //echo $person2_user_id . $person1_user_id . $message;
    //FriendModel::befriendUser($user_id);
    ChatModel::insertMessagesToDatabase($person1_user_id, $person2_user_id, $message);
}
?>
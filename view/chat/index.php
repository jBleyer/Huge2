<div class="container">
    <h1>Chat</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h3>What happens here ?</h3>
        <div>
            This controller/action/view shows a list of all users in the system. You could use the underlying code to
            build things that use profile information of one or multiple/all users.
        </div>
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

            </section>






            <!--<table class="overview-table">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Avatar</td>
                        <td>Username</td>
                        <td>User's email</td>
                        <td>Activated ?</td>
                        <td>Link to user's profile</td>
                    </tr>
                </thead>
                <?php foreach ($this->users as $user) { ?>
                    <tr class="<?= ($user->user_active == 0 ? 'inactive' : 'active'); ?>">
                        <td><?= $user->user_id; ?></td>
                        <td class="avatar">
                            <?php if (isset($user->user_avatar_link)) { ?>
                                <img src="<?= $user->user_avatar_link; ?>" />
                            <?php } ?>
                        </td>
                        <td><?= $user->user_name; ?></td>
                        <td><?= $user->user_email; ?></td>
                        <td><?= ($user->user_active == 0 ? 'No' : 'Yes'); ?></td>
                        <td>
                            <a href="<?= Config::get('URL') . 'profile/showProfile/' . $user->user_id; ?>">Profile</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>-->
        </div>
    </div>
</div>
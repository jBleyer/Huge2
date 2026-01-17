<?php

class ChatController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This method controls what happens when you move to /contacts/index in your app.
     * Shows a list of all users.
     * 
     * renders the view made in contacts/index.php 
     */
    public function index()
    {
        $this->View->render(
            'chat/index',
            array(
                'users' => UserModel::getPublicProfilesOfAllUsers()
            )
        );
    }


// I will only modify one (1!) showProfile in contacts/showProfile (I have the original in ProfileController/showProfile)
    /**
     * This method controls what happens when you move to /contacts/showProfile in your app.
     * Shows the (public) details of the selected user.
     * @param $user_id int id the the user
     */
    public function showProfile($user_id)
    {
        if (isset($user_id)) {
            $this->View->render(
                'contacts/showProfile',
                array(
                    'user' => UserModel::getPublicProfileOfUser($user_id)
                )
            );
        } else {
            Redirect::home();
        }
    }
}

<?php

/**
 * Class UserRoleModel
 *
 * This class contains everything that is related to up- and downgrading accounts.
 */
class ChatModel
{

    public static function insertMessagesToDatabase($person1_user_id, $person2_user_id, $message)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("INSERT INTO messages (person1_user_id, person2_user_id, message) VALUES (:person1_user_id, :person2_user_id, :message)");
        $query->execute(array(
            ':person1_user_id' => $person1_user_id,
            ':person2_user_id' => $person2_user_id,
            ':message' => $message

        ));

        if ($query->rowCount() == 1) {
            return true;
        }

        return false;
    }

    public static function getMessagesFromDatabase($person1_user_id, $person2_user_id,)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = 'SELECT person1_user_id, message, person2_user_id FROM messages 
        WHERE person1_user_id = :person1_user_id AND person2_user_id = :person2_user_id 
        OR (person1_user_id = :person2_user_id AND person2_user_id = :person1_user_id)
        ORDER BY timestamp ASC';

        $statement = $database->prepare($sql);

        $statement->bindParam(':person1_user_id', $person1_user_id);
        $statement->bindParam(':person2_user_id', $person2_user_id);

        $statement->execute();

        return $statement->fetchAll();
    }



    /**
     * Upgrades / downgrades the user's account. Currently it's just the field user_account_type in the database that
     * can be 1 or 2 (maybe "basic" or "premium"). Put some more complex stuff in here, maybe a pay-process or whatever
     * you like.
     *
     * @param $type
     *
     * @return bool
     */
    /*public static function changeUserRole($type)
    {
        if (!$type) {
            return false;
        }

        // save new role to database
        if (self::saveRoleToDatabase($type)) {
            Session::add('feedback_positive', Text::get('FEEDBACK_ACCOUNT_TYPE_CHANGE_SUCCESSFUL'));
            return true;
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_ACCOUNT_TYPE_CHANGE_FAILED'));
            return false;
        }
    }*/

    /**
 * Writes the new account type marker to the database and to the session
 *
 * @param $type
 *
 * @return bool
 */
    /*public static function saveRoleToDatabase($type)
    {
        // if $type is not 1 or 2
        if (!in_array($type, [1, 2])) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_account_type = :new_type WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(
            ':new_type' => $type,
            ':user_id' => Session::get('user_id')
        ));

        if ($query->rowCount() == 1) {
            // set account type in session
            Session::set('user_account_type', $type);
            return true;
        }

        return false;
    }*/
}

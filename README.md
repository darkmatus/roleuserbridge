ZfcUser-BjyAuthorize-Bridge
===========================

ZfcUser/BjyAuthorize Bridge for auto-adding User to the user_role_table from BjyAuthorize

Requires: ZF2 latest master,
          ZfcUser,
          BjyAuthorize

Installation:

- Install ZfcUser and BjyAuthorize as shown on thier pages
- Copy the ZfcUser/BjyAuthorize Bridge into your module or vendor directory
- Copy 'roleuserbridge/config/linker.config.php' to your 'config/autoload/'
- add a entry to your application.config.php with 'RoleUserBridge'

Comments:

The bridge works actually only with an standard user after registration with ZfcUser.
At this moment there is no administration backend to change the role of an User after 
registration (only with DB-Tools). If you need an admin you need to edit manually your
user_role_linker table.

If you has your own linker-table edit the linker.config.php with your own table name.
You should also set the id of the user record in your 'user_role' table. For example, if your
role table looks like this:

mysql> SELECT * FROM `user_role`;
+----+---------+------------+-----------+
| id | role_id | is_default | parent_id |
+----+---------+------------+-----------+
|  1 | guest   |          1 |      NULL |
|  2 | user    |          0 |      NULL |
|  3 | admin   |          0 |         2 |
+----+---------+------------+-----------+
3 rows in set (0.00 sec)

you should modify the linker.config.php so that

'user_role_id' => 2

!!!ATTENTION!!!

For compatibility with packagist the repo was renamed to lowercase characters

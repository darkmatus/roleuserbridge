ZfcUser-BjyAuthorize-Bridge
===========================

ZfcUser/BjyAuthorize Bridge for auto-adding User to the user_role_table from BjyAuthorize

Requires: ZF2 latest master,
          ZfcUser,
          BjyAuthorize

Installation:

- Install ZfcUser and BjyAuthorize as shown on thier pagesdingus
- Copy the ZfcUser/BjyAuthorize Bridge into your module or vendor directory
- Copy 'roleuserbridge/config/linker.config.php' to your 'config/autoload/'
- add a entry to your application.config.php with 'RoleUserBridge'

Comments:

The bridge works by automatically adding an entry to the user\_role\_linker table so   
that new users are automatically registered with a 'user' role.  
  
At this moment there is no administration backend to change the role of a User after  
registration (only with DB-Tools).  
If you need an admin you must edit your user\_role\_linker table manually.  
  
If you have created your own linker-table, you must edit the linker.config.php with your own table name.  
In linker.config.php you must also configure the id of the user record as you have set it up in  
your 'user_role' table. For example, if your role table looks like this:  

<pre>
mysql> SELECT * FROM `user_role`;
+----+---------+------------+-----------+
| id | role\_id | is\_default | parent\_id |
+----+---------+------------+-----------+
|  1 | guest   |          1 |      NULL |
|  2 | user    |          0 |      NULL |
|  3 | admin   |          0 |         2 |
+----+---------+------------+-----------+
3 rows in set (0.00 sec)
</pre>
you should modify the linker.config.php so that  
'user\_role\_id' => 2

!!!ATTENTION!!!

For compatibility with packagist the repo was renamed to lowercase characters
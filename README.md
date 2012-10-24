ZfcUser-BjyAuthorize-Bridge
===========================

ZfcUser/BjyAuthorize Bridge for auto-adding User to the user_role_table from BjyAuthorize

Requires: ZF2 latest master,
          ZfcUser,
          BjyAuthorize

Installation:

- Install ZfcUser and BjyAuthorize as shown on thier pages
- Copy the ZfcUser/BjyAuthorize Bridge into your module or vendor directorie
- add a entry to your application.config.php with 'RoleUserBridge'

Comments:

The bridge works actually only with an standard user after registration with ZfcUser.
At this moment there is no administration backend to change the role of an User after 
registration (only with DB-Tools). If you need an admin you need to edit manually your
user_role_linker table.

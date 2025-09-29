# ONLYOFFICE DocSpace plugin for Moodle

This plugin enables users to connect [ONLYOFFICE DocSpace](https://www.onlyoffice.com/docspace.aspx) rooms as activities in Moodle for collaboration.

## Plugin installation 📥

Moodle admins can install the plugin following the usual Moodle plugin installation steps. Once installed, the plugin appears on the *Site Administration -> Plugins* page.

## Plugin configuration ⚙️

### If you are new to ONLYOFFICE DocSpace

You can register a free account on the official website: [onlyoffice.com/docspace-registration.aspx](https://www.onlyoffice.com/docspace-registration.aspx).

The STARTUP plan of ONLYOFFICE DocSpace is absolutely free to use. If you want to check other tariff plans, visit [this page](https://www.onlyoffice.com/docspace-prices.aspx).

### Connection settings

At first, go to your ONLYOFFICE DocSpace ([sign up](https://www.onlyoffice.com/docspace-registration.aspx) / [sign in](https://www.onlyoffice.com/docspace-signin.aspx)) -> **Developer Tools -> API keys -> Create new secret key** to create the API key.

Set **Permissions = All** for full access, or customize permissions by selecting **Permissions = Restricted**.

The minimum required permissions for the API key are:

- Rooms: Write
- Profile: Read
- Contacts: Write

ℹ️ Ensure the API key is created by a user with the DocSpace Admin role.

In Moodle, go to **Site Administration -> Plugins -> Activity Modules -> ONLYOFFICE DocSpace**.

Here, enter the **DocSpace Service Address** (the URL of your DocSpace) and **ONLYOFFICE DocSpace API key**, then click the **Connect** button.

If the connection is successful, two buttons will appear on the settings page:

- Change: Allows you to switch the connected DocSpace. Data in the current DocSpace will remain intact.
- Disconnect: Fully disconnects the plugin. This action clears user authorizations and hooks, and removes the connection between the Moodle Users group and Moodle. When reconnecting DocSpace, a new group will be created, but the original Moodle Users group will remain in DocSpace. This option is recommended for users who need to completely reset all information within the plugin.

### Users export 👥

To start working, you need to export users from Moodle to DocSpace. To do this, click the **Export Users** button on the settings page. A page with the list of users will open. This list includes Moodle users with the roles *Teacher, Manager, Course Creator.* If a user with such credentials (email) already exists in DocSpace, synchronizing authorization will not occur.

To add a Moodle user to DocSpace, select the checkbox and click the **Invite to DocSpace** button. The selected users will be added to DocSpace.

In the **DocSpace User Status** column, you can track whether a Moodle user has been added to DocSpace or not:

- Green checkmark ✅: a Moodle user with the specified email has been added to DocSpace. Synchronization was successful.
- Empty value: there is no Moodle user with the specified email in DocSpace. You can invite them.
- Hourglass ⏳: there is a user in DocSpace with the specified email, but there was a synchronization issue. When logging into the DocSpace plugin for the first time, the user will need to provide a DocSpace login and password to complete synchronization.

To remove user data from DocSpace in Moodle, simply check the box next to the desired user and click the **Unlink DocSpace Account** button. This will delete the selected users' DocSpace data from Moodle.

## Plugin usage ⭐️

The plugin adds a new type of ONLYOFFICE DocSpace activity when creating a course in Moodle.

### Adding a new ONLYOFFICE DocSpace activity

* On the course page, enable the Edit Mode. Click *Add an activity or resource*.
* In the pop-up window, select ONLYOFFICE DocSpace.
* Specify the Activity name. In the *Connect existing DocSpace room* field, click the *Select room* button.
* In the room selector, select the needed room (for now, only public rooms can be connected).
* Click the Save button. The created activity will appear on the course page.

### Working with the created DocSpace activity

To access the room for file editing, the following conditions must be met:

* Moodle user is successfully synchronized with DocSpace.
* The user has been added to the DocSpace room with the corresponding rights.

All other users have access to the DocSpace room for viewing. This way, e.g., teachers can share the learning materials with students.

## Project info ℹ️

Official website: [www.onlyoffice.com](https://www.onlyoffice.com/)

Code repository: [github.com/ONLYOFFICE/moodle-mod_onlyofficedocspace](https://github.com/ONLYOFFICE/moodle-mod_onlyofficedocspace)

Moodle Plugins Directory: [moodle.org/plugins/mod_onlyofficedocspace](https://moodle.org/plugins/mod_onlyofficedocspace)

## Need help? Feedback & Support 💡

In case of technical problems, the best way to get help is to submit your issues [here](https://github.com/ONLYOFFICE/moodle-mod_onlyofficedocspace/issues). Alternatively, you can contact ONLYOFFICE team via [community.onlyoffice.com](https://community.onlyoffice.com) or [feedback.onlyoffice.com](https://feedback.onlyoffice.com/forums/966080-your-voice-matters).
﻿<!DOCTYPE html>
<link href="Chat_CSS.css" rel="stylesheet" type="text/css">

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Chatroom</title>
</head>
<body>
<div class="chat_main">
    <div class="top_menu">
        <h2 class="top_menu_item" href="Chat_Main.php">Chat</h2>
        <h2 class="top_menu_item" href="Chat_Files.php">Files</h2>
        <h2 class="top_menu_item">Settings</h2>
    </div>
    <div class="side_menu">
        <h2 class="users_online">Users Online</h2>
        <li>
            <ul>User 1</ul>
            <ul>User 2</ul>
            <ul>User 3</ul>
        </li>
    </div>
    <div class="chat_box">
        <div class="settings_wrapper">
            <input type="checkbox" id="dark_mode">
            <label for="dark_mode">Dark Mode</label>
        </div>
        <div class="settings_wrapper">
            <input type="checkbox" id="notif_sound">
            <label for="notif_sound">Notification Sound</label>
        </div>
        <div class="settings_wrapper">
            <button id="logout">Logout</button>
        </div>
    </div>
</div>
</body>
</html>